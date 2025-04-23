<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'subject_id',
        'points',
    ];
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function solutions() 
    {
        return $this->hasMany(Solution::class);
    }
}
