<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject_id' ,
        'correct_answers' ,
        'answered_questions' ,
    ];
    public $timestamps = false;
}
