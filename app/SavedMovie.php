<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedMovie extends Model
{
    //
    public function savedBy(){
        return $this->belongsTo(Member::class);
    }

    public function movie(){
        return $this->hasOne(Movie::class);
    }
}
