<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'record';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'action',
        'description',
        'user_id'
    ];
}
