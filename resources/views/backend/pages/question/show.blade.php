@extends('backend.layouts.master')

@section('title', 'Show Question')

@section('content')
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h2></h2>
                </div>
                <div class="module-body">
                    <p><h3 class="heading">{{ $question->question }}</h3></p>
                    <div class="">
                        <table id="dataTable" class="table table-message">
                            @foreach ($question->answers as $answer)
                                
                            
                            <tbody>
                               <tr class="read">
                                   <td class="cell-author hidden-phone hidden-tablet">
                                    {{ $loop->index+1 }}.&emsp;{{ $answer->answer }}
                                        @if ($answer->is_correct)
                                        <span class="badge badge-success pull-right">
                                            correct
                                        </span>
                                        @endif
                                       
                                   </td>
                               </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="module-foot">
                        <a href="{{ route('question.edit',$question->id) }}" class="btn btn-success">Edit</a>

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

                         <a href="{{ route('question.index',$question->id) }}" class="btn btn-inverse pull-right">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection