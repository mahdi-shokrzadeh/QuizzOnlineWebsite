<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions_statistic extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id',
        'first_option' ,
        'second_option' ,
        'third_option' ,
        'forth_option' ,
    ];
    
    public $timestamps = false;

}
