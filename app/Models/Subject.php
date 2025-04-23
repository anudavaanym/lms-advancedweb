<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'subject_code',
        'credit_value',
        'user_id'
    ];
    /**
     * Get the teacher who created the subject.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
}
