@extends('layouts.admin');

@section('content')

	<h1>Users</h1>

	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col">User Id</th>
	      <th scope="col">Username</th>
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
		      <th scope="row">{{ $user->name }}</td>
		      <td>{{ $user->email }}</td>
		      <td>{{ $user->role->name }}</td>
		      <td>{{ $user->is_active == 0 ? 'Inactive' : 'Active' }}</td>
		      <td>{{ $user->created_at }}</td>
		      <td>{{ $user->updated_at->diffForHumans() }}</td>
		    </tr>
		  @endforeach
	  @endif
	  </tbody>
	</table>

@stop