<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name', 'gender', 'email', 'password', 'birthday', 'profile_picture', 'role','address'
    ];
    //
    public function savedMovies(){
        return $this->hasMany(SavedMovie::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function postedMovies(){
        return $this->hasMany(Movie::class);
    }
}
