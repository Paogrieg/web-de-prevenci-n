<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeguimientoCaso extends Model
{
    protected $table = 'seguimientocasos';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'status',
        'coments',
        'complaint_id',
        'testimonial_id',
        'advisor_id'
    ];
}
