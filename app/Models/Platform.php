<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $table = 'platforms';

    protected $date = ['created_at', 'updated_at'];

    protected $fillable = [
        'title',
        'url',
        'image_url'
    ];

    public function users(){
        return $this->belongsToMany(User::class,'user_id','id');
    }
    public function movie(){
        return $this->hasOne(Movie::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}