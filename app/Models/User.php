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

    const TYPE = [
        'admin' => 1,
        'teacher' => 2,
        'student' => 3
    ];

    const GENDER = [
        'male' => 1,
        'female' => 2,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'family_id',
        'password',
        'type',
        'gender',
        'avatar'
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
        'password' => 'hashed',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user', 'user_id', 'course_id');
    }

    public function family()
    {
        return $this->belongsTo(Family::class, 'family_id', 'id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function getUserTypeAttribute()
    {
        if($this->attributes['type'] == static::TYPE['admin']) {
            return 'Administrator';
        }

        if($this->attributes['type'] == static::TYPE['teacher']) {
            return 'Teacher';
        }

        if($this->attributes['type'] == static::TYPE['student']) {
            return 'Student';
        }
    }

    public function getGenderLabelAttribute()
    {
        if($this->attributes['gender'] == static::GENDER['male']) {
            return 'Male';
        }

        if($this->attributes['gender'] == static::GENDER['female']) {
            return 'Female';
        }

        return null;
    }
}
