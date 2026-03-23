<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $fillable = ['title','content','img','user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}