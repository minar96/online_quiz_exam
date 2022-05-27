@extends('backend.layouts.master')

@section('title', 'Manage Quizzes')

@section('content')
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h2>Manage Quizzes</h2>
                </div>
                <div class="module-body">
                    <div class="data-tables">
                        <table id="dataTable" class="text-center table-striped table-bordered">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>SL No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @if(count($quizzes)>0)
                                     @foreach($quizzes as $quiz)
                                	<tr>
                                	    <td>{{ $loop->index+1 }}</td>
                                	    <td>{{ $quiz->name }}</td>
                                	    <td>{{ $quiz->description }}</td>
                                	    <td>{{ $quiz->minutes }}</td>
                                        <td>
                                            <a href="{{ route('quiz.question', [$quiz->id]) }}" class="btn btn-inverse ">View Question</a>
                                        </td>
                                	    
                                	    <td>
                                	    	<a href="{{ route('quiz.edit',$quiz->id) }}" class="btn btn-success">Edit</a>
                                	    	<a class="btn btn-danger" href="{{ route('quiz.destroy', $quiz->id) }}"
                                	    	   onclick="if(confirm('Do you want to delete?')){
                                                   event.preventDefault();
                                	    	                 document.getElementById('delete-form-{{ $quiz->id }}').submit();
                                               }else{
                                                event.preventDefault();
                                               }">
                                	    	    {{ __('Delete') }}
                                	    	</a>

                                	    	<form id="delete-form-{{ $quiz->id }}" action="{{ route('quiz.destroy', $quiz->id) }}" method="POST">
                                	    		@method('DELETE')
                                	    	    @csrf
                                	    	</form>
                                	    </td>
                                	</tr>
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