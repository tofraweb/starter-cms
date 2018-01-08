@extends('layouts.admin')



@section('content')

	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif

	<h1>Categories</h1>

	<div class="col-sm-4">

		<h3>Add new category</h3>

		{!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}

			<div class="form-group">

				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}

			</div>

			<div class="form-group">
				{!! Form::submit('Create Category', ['class' =>'btn btn-primary']) !!}
			</div>

	{!! Form::close() !!}

	</div>

	<div class="col-sm-8">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Name</th>
		      <th scope="col">Created</th>
		      <th scope="col">Last Updated</th>
		    </tr>
		  </thead>
		  <tbody>
		  @if($categories)
			  @foreach($categories as $category)
			    <tr>
			      <td>{{ $category->id }}</th>
			      <th scope="row"><a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a></td>
			      <td>{{ $category->created_at }}</td>
			      <td>{{ $category->updated_at->diffForHumans() }}</td>
			    </tr>
			  @endforeach
		  @endif	
		  </tbody>
		</table>
	</div>

	<div class="col-sm-12">

		@include('includes.form_error')

	</div>

@stop