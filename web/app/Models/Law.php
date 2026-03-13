<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    protected $table = 'laws';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'title',
        'description',
        'state',
        'url'
    ];
}
