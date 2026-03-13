<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    protected $table = 'collaborations';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'type',
        'description',
        'user_id',
        'company_id'
    ];
}
