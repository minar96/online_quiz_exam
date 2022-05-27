<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;

class QuizControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::all();
        return view('backend.pages.quiz.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        	'name'            => 'required|string|max:50',
        	'description'      => 'required|min:10|max:500',
        	'minutes'      => 'required|integer',

        ]);

        $quiz = new Quiz;
    	$quiz->name        = $request->name;
    	$quiz->description  = $request->description;
    	$quiz->minutes        = $request->minutes;
    	$quiz->save();
        return redirect()->back()->with('message', 'Quiz create successfully!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::find($id);
        return view('backend.pages.quiz.edit', compact('quiz'));
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
        $quiz =  Quiz::find($id);
        //validatio data
        $request->validate([
        	'name'            => 'required|string|max:50',
        	'description'      => 'required|min:10|max:500',
        	'minutes'      => 'required|integer',

        ]);

       

    	$quiz->name        = $request->name;
    	$quiz->description  = $request->description;
    	$quiz->minutes        = $request->minutes;
    	
    	$quiz->save();

        return redirect()->route('quiz.index')->with('message', 'Quiz update successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id);
        if (!is_null($quiz)) {
            $quiz->delete();
        }
        return redirect()->back()->with('mes
        .sage', 'Quiz delete successfully!!');
    }

    //quizzes have how many question
    public function question($id){
        $quizzes = Quiz::with('questions')->where('id', $id)->get();
        return view('backend.pages.quiz.question', compact('quizzes'));
    }
}
