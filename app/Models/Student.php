<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'student_number',
    ];

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class); // Assuming you have a 'marks' table for students
    }

    public function homework()
    {
        return $this->hasMany(Homework::class); // Assuming you have a 'homeworks' table
    }
}
