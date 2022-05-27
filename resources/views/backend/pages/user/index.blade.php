@extends('backend.layouts.master')

@section('title', 'Manage User')

@section('content')
    <div class="span9">
        <div class="content">
            @if(Session::has('message'))

                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>

            @endif
            <div class="module">
                <div class="module-head">
                    <h2>All User</h2>
                </div>
                <div class="module-body">
                    <div class="data-tables">
                        <table id="dataTable" class="text-center table-striped table-bordered">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>SL No</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    {{-- <th>Password</th> --}}
                                    <th>Occupation</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    {{-- <th>View Page</th> --}}
                                    <th></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @if(count($users)>0)
                                     @foreach($users as $user)
                                	<tr>
                                	    <td>{{ $loop->index+1 }}</td>
                                	    <td>{{ $user->name }}</td>
                                	    <td>{{ $user->email }}</td>
                                        {{-- <td>{{ $user->password }}</td> --}}
                                        <td>{{ $user->occupation }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->phone }}</td>
                                	    
                                       {{--  <td>
                                	    	<a href="{{ route('user.show',$user->id) }}" class="btn btn-info">View</a>
                                        </td> --}}
                                        <td>
                                            <a href="{{ route('user.edit',$user->id) }}" class="btn btn-success">Edit</a>
                                        </td>
                                        
                                	    
                                	    
                                        <td>
                                	    	<a class="btn btn-danger" href="{{ route('user.destroy', $user->id) }}"
                                	    	   onclick="if(confirm('Do you want to delete?')){
                                                   event.preventDefault();
                                	    	                 document.getElementById('delete-form-{{ $user->id }}').submit();
                                               }else{
                                                event.preventDefault();
                                               }">
                                	    	    {{ __('Delete') }}
                                	    	</a>

                                	    	<form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST">
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
                            {{-- {{ $user->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection