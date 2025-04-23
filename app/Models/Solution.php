<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'points',
        'evaluation',
        'task_id',
        'user_id',
    ];

    public function task() 
    {
        return $this->belongsTo(Task::class);
    }
    public function student() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
