<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    
    protected $table = "quizzes";
    
    protected $fillable = [
        'question',
        'answer',
        'user_id',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
