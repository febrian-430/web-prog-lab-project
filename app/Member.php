<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
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
}
