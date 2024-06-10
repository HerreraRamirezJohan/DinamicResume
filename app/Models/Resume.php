<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    protected $hidden = [
        'pivot',
        'user_id'
    ];

    public function workExperience() : BelongsToMany{
        return $this->belongsToMany(WorkExperience::class, 'resume_workexperience');
    }
    public function education() : BelongsToMany{
        return $this->belongsToMany(Education::class, 'resume_education');
    }
    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
}
