<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beat extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'user_id',
        'image',

        'premium_file',
        'free_file',
        'active',
    ];


    public function setPremiumFileAttribute($value)
    {
        $path = $value->storeAs('secure_files', $value->getClientOriginalName(), 'secure_disk');
        $this->attributes['premium_file'] = $path;
    }



    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}