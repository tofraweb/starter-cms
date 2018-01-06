@extends('layouts.admin');

@section('content')

	<h1>Users</h1>

	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif

	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col">Username</th>
	      <th scope="col">Photo</th>
	      <th scope="col">Email</th>
	      <th scope="col">Role</th>
	      <th scope="col">Status</th>
	      <th scope="col">User Since</th>
	      <th scope="col">Profile Updated</th>
	    </tr>
	  </thead>
	  <tbody>
	  @if($users)
		  @foreach($users as $user)
		    <tr>
		      <td>{{ $user->id }}</th>
		      <th scope="row"><a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></td>
		      <td><img height="50" src="{{ $user->photo ? $user->photo->file : '/images/placeholder.png'}}"></td>
		      <td>{{ $user->email }}</td>
		      <td>{{ $user->role ? $user->role->name : 'No role set' }}</td>
		      <td>{{ $user->is_active == 0 ? 'Inactive' : 'Active' }}</td>
		      <td>{{ $user->created_at }}</td>
		      <td>{{ $user->updated_at->diffForHumans() }}</td>
		    </tr>
		  @endforeach
	  @endif	
	  </tbody>
	</table>

@stop