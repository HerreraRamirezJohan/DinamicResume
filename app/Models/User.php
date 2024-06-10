<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get a relashionship with ContactInformation
     */
    public function contactInformation(){
        return $this->hasOne(ContactInformation::class);
    }
    /**
     * Get a relashionship with WorkExperience
     */
    public function workExperience(){
        return $this->hasMany(WorkExperience::class);
    }
    /**
     * Get a relashionship with Education
     */
    public function education(){
        return $this->hasMany(Education::class);
    }

    /**
     * Get a relashionship with Resume
     */
    public function resumes() : HasMany{
        return $this->hasMany(Resume::class);
    }
}
