<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'work_type', 'subject', 'description', 'deadline', 'price','status',
        'start_date','comment_id','progress', 'file_path','performer_id', 'client_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'due_date' => 'date',      // Casting due_date as a date
        'budget' => 'decimal:2',   // Casting budget as a decimal with 2 decimal points
    ];


     /**
     * Get the user that owns the order.
     */
    public function getClient()
    {
        return $this->belongsTo(User::class,'client_id','id');
    }

    public function getPerformer()
    {
        return $this->belongsTo(User::class,'performer_id','id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class,'task_id','id');
    }

}
