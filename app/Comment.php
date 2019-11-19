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

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function administrator(){
        return $this->belongsTo(Administrator::class);
    }
}
