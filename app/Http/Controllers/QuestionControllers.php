<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use App\Quiz;

class QuestionControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->
        with('quiz')->paginate(3);
        return view('backend.pages.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = $request->all();
        $question = (new Question)->storeQuestion($data);
        $answer = (new Answer)->storeAnswer($data,$question);
        return redirect()->route('question.index')->with('message','Question created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view('backend.pages.question.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        //$roles = Role::all();
        return view('backend.pages.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validateForm($request);

        $question = (new Question)->updateQuestion($id, $request);
        $answer = (new Answer)->updateAnswer($request,$question);
        return redirect()->route('question.show', $id)->with('message', 'Question update successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new Answer)->deleteAnswer($id);
        (new Question)->deleteQuestion($id);
        return redirect()->back()->with('mes
        .sage', 'Quiz delete successfully!!');
    }

    
    //question create validation
    public function validateForm($request){
        return $this->validate($request, [
            'question'            => 'required|min:3',
        	'quiz'      => 'required',
        	'options'      => 'bail|required|array|min:3',
        	'options.*'      => 'bail|required|string|distinct',
        	'correct_ans'      => 'required'
        ]);
    }
}
