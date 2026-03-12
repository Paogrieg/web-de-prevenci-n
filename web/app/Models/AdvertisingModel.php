<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertisingModel extends Model
{
    protected $table = 'advertising';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'name',
        'img',
    ];
}
