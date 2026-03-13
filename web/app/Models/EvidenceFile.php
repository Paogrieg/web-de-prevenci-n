<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvidenceFile extends Model
{
    protected $table = 'evidenceFiles';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'rute',
        'description',
        'evidence_id'
    ];
}
