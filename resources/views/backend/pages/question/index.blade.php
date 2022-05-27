@extends('backend.layouts.master')

@section('title', 'Manage Question')

@section('content')
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h2>All Questions</h2>
                </div>
                <div class="module-body">
                    <div class="data-tables">
                        <table id="dataTable" class="text-center table-striped table-bordered">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>SL No</th>
                                    <th>Question</th>
                                    <th>Quiz</th>
                                    <th>Created</th>
                                    <th>View Question</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @if(count($questions)>0)
                                     @foreach($questions as $question)
                                	<tr>
                                	    <td>{{ $loop->index+1 }}</td>
                                	    <td>{{ $question->question }}</td>
                                	    <td>{{ $question->quiz->name }}</td>
                                	    <td>{{ date('F d,Y',strtotime($question->created_at)) }}</td>
                                        <td>
                                	    	<a href="{{ route('question.show',$question->id) }}" class="btn btn-info">View</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('question.edit',$question->id) }}" class="btn btn-success">Edit</a>
                                        </td>
                                        
                                	    
                                	    
                                        <td>
                                	    	<a class="btn btn-danger" href="{{ route('question.destroy', $question->id) }}"
                                	    	   onclick="if(confirm('Do you want to delete?')){
                                                   event.preventDefault();
                                	    	                 document.getElementById('delete-form-{{ $question->id }}').submit();
                                               }else{
                                                event.preventDefault();
                                               }">
                                	    	    {{ __('Delete') }}
                                	    	</a>

                                	    	<form id="delete-form-{{ $question->id }}" action="{{ route('question.destroy', $question->id) }}" method="POST">
                                	    		@method('DELETE')
                                	    	    @csrf
                                	    	</form>
                                	    </td>
                                	</tr>
                                @endforeach
                               @endif
                            </tbody>
                        </table>
                        <div class="pagination pagination-centered">
                            {{ $questions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection