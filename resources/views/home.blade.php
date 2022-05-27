@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">Exam</div>
                @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                 @if($isExamAssigned)
                @foreach($quizzes as $quiz)
                <div class="card-body">
                   <p><h3>{{$quiz->name}}</h3></p>
                    <p>About Exam:-{{$quiz->description}}</p>
                    <p>Time allocated:-{{$quiz->minutes}} minutes</p>
                    <p>Number of questions:-{{$quiz->questions->count()}}</p>
                    @if(!in_array($quiz->id, $wasQuizCompleted))
                        <a href="user/quiz/{{ $quiz->id }}">
                                <button class="btn btn-success">Start Quiz</button>
                            
                        </a>
                    @else
                        <hr>
                        <a href="/result/user/{{ auth()->user()->id }}/quiz/{{ $quiz->id }}" class="btn btn-success">View Result</a>
                        <span class="badge badge-success float-right">Completed</span>
                    @endif
                </div>
                @endforeach
                @else
                    <p class="alert alert-success">You do not assign exam</p>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">User Profile</div>
                <div class="card-body">
                    <p>Email: {{ auth()->user()->email }}</p>
                    <p>Occupation: {{ auth()->user()->occupation }}</p>
                    <p>Address: {{ auth()->user()->address }}</p>
                    <p>Phone: {{ auth()->user()->phone }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
