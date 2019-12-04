<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'message', 'sender_id', 'receiver_id'
    ];

    public function receiver(){
        return $this->belongsTo(Member::class, 'receiver_id');
    }

    public function sender(){
        return $this->belongsTo(Member::class, 'sender_id');
    }

}
