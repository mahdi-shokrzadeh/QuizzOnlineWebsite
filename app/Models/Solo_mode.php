<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solo_mode extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id' ,
        'subject_id' ,
        'is_finished' ,
        'questions_id' ,
    ];
    public $timestamps = false;
}
