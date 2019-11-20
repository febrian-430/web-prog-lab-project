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

    public function sender(){
        return $this->hasOne(Member::class, 'sender_id');
    }
}
