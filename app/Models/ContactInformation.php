<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email_contact',
        'linkedin_url',
        'github_url',
        'phone',
        'country',
        'city',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'user_id',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fill([
            'user_id' => $attributes['user_id'] ?? null,
            'email_contact' => $attributes['email_contact'] ?? null,
            'linkedin_url' => $attributes['linkedin_url'] ?? null,
            'github_url' => $attributes['github_url'] ?? null,
            'phone' => $attributes['phone'] ?? null,
            'country' => $attributes['country'] ?? null,
            'city' => $attributes['city'] ?? null,
        ]);
    }
}
