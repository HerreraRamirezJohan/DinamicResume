<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'employer',
        'start_date',
        'end_date',
        'description'
    ];

    protected $hidden = [
        'pivot'
    ];

    public function resume() : BelongsToMany {
        return $this->belongsToMany(Resume::class, 'resume_workexperience');
    }
}
