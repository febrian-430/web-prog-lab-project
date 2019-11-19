<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = true;
    //
    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function administrator(){
        return $this->belongsTo(Administrator::class);
    }
}
