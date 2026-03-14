<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    protected $table = 'evidences';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'file_type',
        'complaint_id'
    ];
}
