@extends('layouts.admin');

@section('content')

	<h1>Posts</h1>

	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif

	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col">Title</th>
	      <th scope="col">Image</th>
	      <th scope="col">Posted By</th>
	      <th scope="col">Category</th>
	      <th scope="col">Created</th>
	      <th scope="col">Last Updated</th>
	    </tr>
	  </thead>
	  <tbody>
	  @if($posts)
		  @foreach($posts as $post)
		    <tr>
		      <td>{{ $post->id }}</th>
		      <th scope="row"><a href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a></td>
		      <td><img height="50" src="{{ $post->photo ? $post->photo->file : '/images/placeholder.png'}}"></td>
		      <td>{{ $post->user ? $post->user->name : 'N/A'}}</td>
		      <td>{{-- {{ $post->category ? $post->category->name : 'N/A'}} --}}</td>
		      <td>{{ $post->created_at }}</td>
		      <td>{{ $post->updated_at->diffForHumans() }}</td>
		    </tr>
		  @endforeach
	  @endif	
	  </tbody>
	</table>

@stop