<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password'  => 'hashed',
        'is_teacher' => 'boolean'
    ];
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
     /**
     * Get the subjects created by the teacher.
     */
    public function teacherSubjects()
    {
        return $this->hasMany(Subject::class, 'user_id');
    }

    /**
     * Get the subjects taken by the student.
     */
    public function studentSubjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    /**
     * Get the solutions submitted by the student.
     */
    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }

    /**
     * Check if the user is a teacher.
     */
    public function isTeacher()
    {
        if (!$this->role) {
            return false;
        }
        return $this->role->name === 'teacher';
    }
    
    public function isStudent()
    {
        if (!$this->role) {
            return false;
        }
        return $this->role->name === 'student';
    }
}
