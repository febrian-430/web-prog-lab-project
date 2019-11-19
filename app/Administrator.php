<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    //
    public function movies(){
        return $this->hasMany(Movie::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
