<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;
use App\Quiz;
use App\Question;

class Question extends Model
{
    protected $fillable = [
        'question', 'quiz_id'
    ];

    //question have many different answer
    public function answers(){
        return $this->hasMany(Answer::class);
    }
    //every question have particular quiz
    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function storeQuestion($data){
       $data['quiz_id'] = $data['quiz'];
        return Question::create($data);
    }

    public function updateQuestion($id, $data){
        $question = Question::find($id);
        $question->question = $data['question'];
        $question->quiz_id = $data['quiz'];
        $question->save();
        return $question;
    }
    public function deleteQuestion($id){
        Question::where('id', $id)->delete();
    }
}
