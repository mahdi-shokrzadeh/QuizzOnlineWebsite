<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solo_mode_question extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'game_id',
        'is_true',
        'question_number',
        'expire_time' ,
        'question_id' ,
    ];

    public $timestamps = false;

}
