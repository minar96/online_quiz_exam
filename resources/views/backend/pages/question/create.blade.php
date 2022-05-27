@extends('backend.layouts.master')

@section('title', 'Create question')

@section('content')
    <div class="span9">
        <div class="content">
            <form action="{{ route('question.store') }}" method="POST">
                @csrf
                <div class="module">
                    <div class="module-head">
                        <h2>Create question</h2>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="module-body">
                        <div class="form-group">
                            <label for="question" class="">Question Name</label>
                            <input type="text" class="form-control span8" name="question" placeholder="Name of the question" value="{{ old('name') }}">
    
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
                                    <option value="{{ $quiz->id }}">{{ $quiz->name }}</option>
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
                            @for ($i=0; $i<4; $i++)
                            <input type="text" class="form-control span7" name="options[]" 
                            placeholder="Question Option-{{ $i+1 }}" required="required" 
                            value="{{ old('options.[$i]') }}">
                            
                            <input type="radio" name="correct_answer" value="{{$i}}"> <span>correct-answer</span>
                            @endfor
    
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