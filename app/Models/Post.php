<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'category', 'content'];
    protected $table = 'posts';
  
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
