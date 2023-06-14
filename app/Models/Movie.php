<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $date = ['created_at', 'updated_at'];

    protected $fillable = [
        'title',
        'description',
        'year',
        'url_image'
    ];

    public function movie_platform(){
        return $this->belongsToMany(MoviePlatform::class,'movie_id');
    }

    public function users(){
        return $this->hasMany(User::class,'user_id');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function platform(){
        return $this->belongsTo(Platform::class);
    }

}