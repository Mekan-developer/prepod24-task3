<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// предложения
class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id', 'performer_id', 'message', 'bid_amount', 'status', 'showed_client'
    ];
    protected $casts = [
        'showed_client' => 'boolean',
        'status' => 'string'
    ];


    public function getPerformer()
    {
        return $this->belongsTo(User::class, 'performer_id', 'id');
    }

    public function getTask(){
        return $this->belongsTo(Task::class,'task_id','id');
    }



    
    
}
