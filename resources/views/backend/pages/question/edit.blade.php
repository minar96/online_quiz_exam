@extends('backend.layouts.master')

@section('title', 'edit question')

@section('content')
    <div class="span9">
        <div class="content">
            <form action="{{ route('question.update', $question->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="module">
                    <div class="module-head">
                        <h2>Edit question</h2>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="module-body">
                        <div class="form-group">
                            <label for="question" class="">Question Name</label>
                            <input type="text" class="form-control span8" name="question" placeholder="Name of the question" value="{{ $question->question }}">
    
                            @error('question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="quiz" class="">Choose Quiz</label>
                            <select name="quiz" id="" class="form-control span8">
                                <option value="">Please select quiz</option>
                                @foreach (App\Quiz::all() as $quiz)
                                    <option value="{{ $quiz->id }}" {{ $quiz->id == $question->quiz_id ? 'selected' : '' }}>
                                        {{ $quiz->name }}
                                    </option>
                                @endforeach
                            </select>
    
                            @error('question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="options" class="">Question Options</label>
                            @foreach ($question->answers as $answer)
                            <input type="text" class="form-control span7" name="options[]" 
                            value="{{ $answer->answer }}" required="required">
                            
                            <input type="radio" name="correct_answer" value="{{ $answer }}" {{ $answer->is_correct ? 'checked' : '' }}> 
                            <span>correct-answer</span>
                            @endforeach
    
                            @error('options')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection