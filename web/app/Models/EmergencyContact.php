<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    protected $table = 'emergencyContacts';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'name',
        'lastname',
        'phone_number',
        'relation',
        'users',
    ];
}
