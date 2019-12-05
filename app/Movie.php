<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = true;

    protected $fillable =
    [
        'title', 'genre_id', 'description', 'rating', 'movie_image', 'member_id'
    ];
    //
    // public function members(){
    //     return $this->belongsTo(Member::class);
    // }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function addedBy(){
        return $this->belongsTo(Member::class, 'poster_id');
    }
    //target pivot table
    public function members(){
        return $this->belongsToMany(Member::class, 'saved_movies');
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
