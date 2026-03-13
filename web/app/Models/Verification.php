<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $table = 'verification';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'state',
        'date_verification',
        'new_id'
    ];
}
