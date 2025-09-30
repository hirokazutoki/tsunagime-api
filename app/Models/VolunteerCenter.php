<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerCenter extends Model
{
    /** @use HasFactory<\Database\Factories\VolunteerCenterFactory> */
    use HasFactory;

    protected $table = 'volunteer_center';
}
