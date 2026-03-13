<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'cost',
        'payment_method',
        'payment_reference',
        'status',
        'payment_date',
        'verification_id'
    ];
}
