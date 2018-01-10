@extends('layouts.admin')



@section('content')

	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif

	<h1>Categories</h1>

	<div class="col-sm-6">

		<h3>Edit category</h3>

		{!! Form::model($category, ['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $category->id]]) !!}

			<div class="form-group">

				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}

			</div>

			<div class="form-group">
				{!! Form::submit('Update Category', ['class' =>'btn btn-primary  col-sm-2']) !!}
			</div>

	{!! Form::close() !!}

	{!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}

		<div class="form-group">
			{!! Form::submit('Delete Category', ['class' =>'btn btn-danger col-sm-2', 'style' => 'margin-left:10px']) !!}
		</div>

	{!! Form::close() !!}

	</div>

	<div class="col-sm-6">

	</div>

	<div class="col-sm-12">

		@include('includes.form_error')

	</div>

@stop