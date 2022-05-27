@extends('backend.layouts.master')

@section('title', 'Quiz Question')

@section('content')
    <div class="span9">
        <div class="content">
            @foreach ($quizzes as $quiz)
            <div class="module">
                <div class="module-head">
                    <h2>{{ $quiz->name }}</h2>
                </div>
                <div class="module-body">
                    
                    <div class="">
                        @foreach($quiz->questions as $ques)
                        <table id="dataTable" class="table table-message">
                           
                        <tr class="read">
                            {{ $ques->question }}
                            <td class="cell-author hidden-phone hidden-tablet">
                             {{-- {{ $loop->index+1 }}.&emsp; --}}
                             @foreach($ques->answers as $answer)
                               <p>
                                {{ $loop->index+1 }}.&emsp;{{ $answer->answer }}
                                @if($answer->is_correct)
                                <span class=" badge badge-success pull-right">
                                    correct answer
                                </span>
                                @endif
                               </p>
                               @endforeach
                            </td>
                        </tr>
                            
                            <tbody>
                               
                            </tbody>
                        </table>
                        @endforeach
                    </div>
                    {{-- @endforeach --}}
                    <div class="module-foot">
                        <a href="{{ route('quiz.index') }}" class="btn btn-inverse pull-right">Back</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection