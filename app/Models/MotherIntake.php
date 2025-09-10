<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotherIntake extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'age',
        'pregnancy_stage',
        'due_date',
        'location',
        'previous_pregnancies',
        'concerns',
        'interests',
    ];

    protected $casts = [
        'due_date' => 'date',
        'interests' => 'array',
    ];
}
