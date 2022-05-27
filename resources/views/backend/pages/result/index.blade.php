@extends('backend.layouts.master')

@section('title', 'user result')

@section('content')
    <div class="span9">
        <div class="content">

            <div class="module">
                <div class="module-head">
                    <h2>User Result</h2>
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
                                            <a href="result/{{ $user->id }}/{{ $quiz->id }}" class="btn btn-success">View Result</a>
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