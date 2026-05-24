<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'content',
        'img',
        'user_id',
        'paypal_enabled',
        'paypal_link',
    ];

    protected $casts = [
        'paypal_enabled' => 'boolean',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}