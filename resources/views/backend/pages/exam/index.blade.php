@extends('backend.layouts.master')

@section('title', 'Exam Assign')

@section('content')
    <div class="span9">
        <div class="content">

            <div class="module">
                <div class="module-head">
                    <h2>Exam Assign to User</h2>
                </div>
                <div class="module-body">
                      @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="data-tables">
                        <table id="dataTable" class="text-center table table-striped table-bordered">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>SL No</th>
                                    <th>Name</th>
                                    <th>Quiz</th>
                                    <th></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @if(count($quizzes)>0)
                                     @foreach($quizzes as $quiz)
                                     @foreach($quiz->users as $user)
                                	<tr>
                                	    <td>{{ $loop->index+1 }}</td>
                                	    <td>{{ $user->name }}</td>
                                        <td>{{ $quiz->name }}</td>
                                        <td>
                                            <a href="{{ route('quiz.question', [$quiz->id]) }}" class="btn btn-inverse ">View Question</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('exam.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" class="form-control" value="{{ $user->id }}">
                                                <input type="hidden" name="quiz_id" class="form-control" value="{{ $quiz->id }}">
                                                <button type="submit" class="btn btn-danger">Remove Exam</button>
                                            </form>
                                        </td>
                                	</tr>
                                @endforeach
                                @endforeach
                               @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection