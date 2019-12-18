<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

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

    // public function getRouteKeyName()
    // {
    //     return 'email';
    // }


    public function hasMovieInSave(Movie $movie){
        return $this->movies->contains($movie) ? true : false;
    }

    public function currentUser(){
        return Auth::user();
    }

    //target pivot table
    public function movies(){
        return $this->belongsToMany(Movie::class, 'saved_movies');
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
