<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenderVerification extends Model
{
    protected $table = 'gender_verifications';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'document_path',
        'document_type',
        'state',
        'notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}