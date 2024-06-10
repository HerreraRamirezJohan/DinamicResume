<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution',
        'title',
        'activities',
        'document',
        'start_date',
        'end_date'
    ];
    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
        'user_id'
    ];

    public function resume() : BelongsToMany {
        return $this->belongsToMany(Resume::class, 'resume_education');
    }
}
