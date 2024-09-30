<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_topic', 'work_type', 'subject', 'explanation', 'due_date', 'budget', 'file_path', 'user_id'
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
