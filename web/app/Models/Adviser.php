<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adviser extends Model
{
    protected $table = 'advisors';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone_number',
        'specialty',
        'institution',
    ];
}
