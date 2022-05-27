@extends('backend.layouts.master')

@section('title', 'Create Quiz')

@section('content')
    <div class="span9">
        <div class="content">
            <form action="{{ route('quiz.store') }}" method="POST">
                @csrf
                <div class="module">
                    <div class="module-head">
                        <h2>Create Quiz</h2>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="module-body">
                        <div class="form-group">
                            <label for="name" class="">Quiz Name</label>
                            <input type="text" class="form-control span8" name="name" placeholder="Name of the Quiz" value="{{ old('name') }}">
    
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" class="">Quiz Description</label>
                            <textarea name="description" id="" class="form-control span8" placeholder="Write your quiz description">
                                {{ old('description') }}
                            </textarea>
                            
    
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="minutes" class="">Take Time</label>
                            <input type="text" class="form-control span8" name="minutes" placeholder="Minutes count" value="{{ old('minutes') }}">
    
                            @error('minutes')
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