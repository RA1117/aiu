<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    // Controllerのfill用
    protected $fillable = [
        'event_title',
        'event_body',
        'event_start',
        'event_end',
        'event_color',
        'event_border_color',
    ];
}
