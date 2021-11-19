<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'Image',
        'status',
        'link',
        'location',
        'starting_time',
        'ending_time',
        'upcoming_events',
        
    ];
}
