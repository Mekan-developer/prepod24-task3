<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
       'message'
    ];


    public function sender(){
        return $this->HasOne(User::class,'id','sender_id');
    }

    public function getTask(){
        return $this->belongsTo(Task::class,'task_id','id');
    }
    
}
