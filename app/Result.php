<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\Answer;

class Result extends Model
{
    protected $fillable = [
        'user_id', 'question_id', 'quiz_id', 'answer_id'
    ];

    //particular question have a result
    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function answer(){
        return $this->belongsTo(Answer::class);
    }
}
