<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'year', 'description', 'category_id', 'actor_id'];


   public function categories()
{
    return $this->morphedByMany(Category::class, 'filmable');
}
public function actors()
{
    return $this->morphedByMany(Actor::class, 'filmable');
} 
}
