<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $table = 'advertising';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'title',
        'image',
        'link',
        'start_date',
        'end_date',
        'active',
        'company_id'
    ];
}
