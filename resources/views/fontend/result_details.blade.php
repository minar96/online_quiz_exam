@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<div class="card">
        		<div class="card-header">
        			<h4 class="text-center">Your Result</h4>
        		</div>
        		
	        		<div class="card-body">
	        			<table class="table table-striped table-bordered">
	        				<thead>
	        					<tr>
	        						<th>Sl No</th>
	        						<th class="text-center">Question</th>
	        					</tr>
	        				</thead>
	        				<tbody>
	        					@foreach($results as $result)
	        						<tr>
	        							<td>{{ $loop->index+1 }}</td>
	        							<td>
	        								{{ $result->question->question }} <br>
	        								@php
	        									$i=1;
	        									$answers = DB::table('answers')
	        									->where('question_id', $result->question_id)->get();
	        									foreach ($answers as $ans) {
	        										echo $i++. '.  '.$ans->answer.'<br>';
	        									}
	        								@endphp

	        								<p>
	        									Your answer that is provided by you:
	        									<span class="badge badge-success">
	        										{{ $result->answer->answer }}
	        									</span>
	        								</p>
	        								@php
	        									$correctAnswer = DB::table('answers')->where('question_id', $result->question_id)->where('is_correct', 1)->get();
	        									foreach ($correctAnswer as $corrAns) {
	        											echo "Correct Answer:" .'<p class="badge badge-success">'.$corrAns->answer.'</p>';
	        										}
	        								@endphp

	        								@if($result->answer->is_correct)
	        									<p>
	        										<span class="badge badge-success">Result is Correct</span>
	        									</p>
	        								@else
	        									<p>
	        										<span class="badge badge-danger">Result is not Correct</span>
	        									</p>
	        								@endif

	        							</td>
	        						</tr>
	        					@endforeach
	        				</tbody>
	        			</table>
	        		</div>
        		
        	</div>

        </div>
    </div>
</div>   
@endsection