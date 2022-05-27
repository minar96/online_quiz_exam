@extends('backend.layouts.master')

@section('title', 'Create question')

@section('content')
    <div class="span9">
        <div class="content">
            <form action="{{ route('exam.assign') }}" method="POST">
                @csrf
                <div class="module">
                    <div class="module-head">
                        <h2>Assign Exam</h2>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    {{--  @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif --}}
                    <div class="module-body">
                        <div class="form-group">
                            <label for="quiz" class="">Choose Quiz</label>
                            <select name="quiz_id" id="" class="form-control span8">
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
                            <label for="quiz" class="">Choose User</label>
                            <select name="user_id" id="" class="form-control span8">
                                <option value="">Please select User</option>
                                @foreach (App\User::where('is_admin', 0)->get() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
    
                            @error('question')
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