<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $date = ['created_at', 'updated_at'];

    protected $fillable = [
        'title',
        'description'
    ];

    public function users(){
        return $this->hasMany(User::class,'user_id');
    }

    public function movie(){
        return $this->hasOne(Movie::class);
    }
}