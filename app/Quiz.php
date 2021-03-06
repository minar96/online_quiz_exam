<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\Quiz;
use App\User;
use App\Result;

class Quiz extends Model
{
    protected $fillable = [
        'name', 'description', 'minutes',
    ];

    //quiz have many question
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function users(){
        return $this->belongsToMany(User::class, 'quiz_user');
    }

    public function assignExam($data){
        $quizId = $data['quiz_id'];
        $quiz = Quiz::find($quizId);
        $userId = $data['user_id'];
        return $quiz->users()->syncWithoutDetaching($userId);
    }

    public function hasQuizAttempted(){
        $attemptQuiz  =[];
        $authUser = auth()->user()->id;
        $user = Result::where('user_id',$authUser)->get();
        foreach($user as $u){
            array_push($attemptQuiz,$u->quiz_id);
        }
        return $attemptQuiz;
    }

}
