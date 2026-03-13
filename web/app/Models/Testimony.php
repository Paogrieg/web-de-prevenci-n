<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $table = 'testimonials';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'content',
        'anonymous',
        'user_id',
        'complaint_id'
    ];
}
