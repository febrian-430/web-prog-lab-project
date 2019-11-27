<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    use Notifiable;

    protected $table = 'members';
    protected $fillable = [
        'name', 'gender', 'email', 'password', 'birthday', 'profile_picture', 'role','address'
    ];

    protected $hidden = [
        'password', 'remember_token'
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
