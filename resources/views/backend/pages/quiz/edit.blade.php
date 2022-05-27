@extends('backend.layouts.master')

@section('title', 'edit Quiz')

@section('content')
    <div class="span9">
        <div class="content">
            <form action="{{ route('quiz.update', $quiz->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="module">
                    <div class="module-head">
                        <h2>Edit Quiz</h2>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="module-body">
                        <div class="form-group">
                            <label for="name" class="">Quiz Name</label>
                            <input type="text" class="form-control span8" name="name" placeholder="Name of the Quiz" value="{{ $quiz->name }}">
    
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" class="">Quiz Description</label>
                            <textarea name="description" id="" cols="" rows="8" class="form-control span8" placeholder="Write your quiz description">
                                {{ $quiz->description }}
                            </textarea>
                            
    
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="minutes" class="">Take Time</label>
                            <input type="text" class="form-control span8" name="minutes" placeholder="Minutes count" value="{{ $quiz->minutes }}">
    
                            @error('minutes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Quiz</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection