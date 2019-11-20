<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{   
    public $timestamps = true;
    //
    public function movie(){
        return $this->belongsTo(Movie::class);
    }

    public function postedBy(){
        return $this->belongsTo(Member::class, 'poster_id');
    }

}
