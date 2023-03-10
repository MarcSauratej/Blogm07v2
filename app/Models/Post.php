<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image_url',
        'active',
        'user_id',
    ];
    public function user(){
        return $this->hasOne(User::class);
    }
    public function tags(){
        return $this->hasMany(Tag::class);
    }
}
