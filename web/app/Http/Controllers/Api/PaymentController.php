<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pay;
use PaypalServerSdkLib\PaypalServerSdkClientBuilder;
use PaypalServerSdkLib\Authentication\ClientCredentialsAuthCredentialsBuilder;
use PaypalServerSdkLib\Environment;
use PaypalServerSdkLib\Models\Builders\OrderRequestBuilder;
use PaypalServerSdkLib\Models\Builders\PurchaseUnitRequestBuilder;
use PaypalServerSdkLib\Models\Builders\AmountWithBreakdownBuilder;
use PaypalServerSdkLib\Models\CheckoutPaymentIntent;
 
class PaymentController extends Controller
{
    private function getPaypalClient()
    {
        $env = config('paypal.mode') === 'live'
            ? Environment::PRODUCTION
            : Environment::SANDBOX;
 
        return PaypalServerSdkClientBuilder::init()
            ->clientCredentialsAuthCredentials(
                ClientCredentialsAuthCredentialsBuilder::init(
                    config('paypal.client_id'),
                    config('paypal.client_secret')
                )
            )
            ->environment($env)
            ->build();
    }
 
    // Crear orden en PayPal
    public function createOrder(Request $request)
    {
        $request->validate([
            'amount'          => 'required|numeric|min:1',
            'verification_id' => 'required|exists:verification,id',
        ]);
 
        $client = $this->getPaypalClient();
 
        $orderBody = OrderRequestBuilder::init(
            CheckoutPaymentIntent::CAPTURE,
            [
                PurchaseUnitRequestBuilder::init(
                    AmountWithBreakdownBuilder::init('MXN', number_format($request->amount, 2, '.', ''))
                        ->build()
                )->build()
            ]
        )->build();
 
        $response = $client->getOrdersController()->ordersCreate([
            'body' => $orderBody,
        ]);
 
        return response()->json([
            'order_id' => $response->getResult()->getId(),
            'status'   => 'success',
        ]);
    }
 
    // Capturar el pago (después de que el usuario aprobó)
    public function captureOrder(Request $request)
    {
        $request->validate([
            'order_id'        => 'required|string',
            'verification_id' => 'required|exists:verification,id',
        ]);
 
        $client   = $this->getPaypalClient();
        $response = $client->getOrdersController()->ordersCapture([
            'id' => $request->order_id,
        ]);
 
        $result = $response->getResult();
 
        if ($result->getStatus() === 'COMPLETED') {
            $capture = $result->getPurchaseUnits()[0]->getPayments()->getCaptures()[0];
 
            $payment = Pay::create([
                'cost'               => $capture->getAmount()->getValue(),
                'payment_method'     => 'PayPal',
                'payment_reference'  => $capture->getId(),
                'status'             => 'completed',
                'payment_date'       => now()->toDateString(),
                'verification_id'    => $request->verification_id,
            ]);
 
            return response()->json([
                'data'   => $payment,
                'status' => 'success',
            ]);
        }
 
        return response()->json(['message' => 'Pago no completado', 'status' => 'error'], 400);
    }
 
    // Los métodos anteriores (index, show, etc.) se quedan igual
    public function index()
    {
        return response()->json(['data' => Pay::all(), 'status' => 'success']);
    }
 
    public function show(string $id)
    {
        $payment = Pay::find($id);
        if (!$payment) {
            return response()->json(['message' => 'Pago no encontrado', 'status' => 'error'], 404);
        }
        return response()->json(['data' => $payment, 'status' => 'success']);
    }
 
    public function destroy(string $id)
    {
        $payment = Pay::find($id);
        if (!$payment) {
            return response()->json(['error' => 'Pago no encontrado', 'status' => 'error'], 404);
        }
        $payment->delete();
        return response()->json(['status' => 'success', 'message' => 'Registro eliminado correctamente']);
    }
}