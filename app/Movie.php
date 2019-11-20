<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = true;

    //
    public function members(){
        return $this->belongsToMany(Member::class);
    }

    public function postedBy(){
        return $this->hasOne(Member::class, 'poster_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function genre(){
        return $this->hasOne(Genre::class);
    }
}
