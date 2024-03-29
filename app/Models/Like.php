<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;


    protected $fillable = [
        'likeable_id',
        'likeable_type',
        'user_id',
        'post_id',
        'beat_id'

    ];



    /*  public function likeable()
    {
        return $this->morphTo();
    } */


    public function posts()
    {
        return $this->morphedByMany(Post::class, 'likeable');
    }
    public function beats()
    {
        return $this->morphedByMany(Beat::class, 'likeable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

  
}