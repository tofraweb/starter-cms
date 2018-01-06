@extends('layouts.admin');

@section('content')

	<h1>Create Post</h1>

	{!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}
		<div class="form-group">

			{!! Form::label('title', 'Title') !!}
			{!! Form::text('title', null, ['class' => 'form-control']) !!}

			{!! Form::label('body', 'Content') !!}
			{!! Form::textarea('body', null, ['class' => 'form-control']) !!}

			{!! Form::label('user_id', 'User') !!}
			{!! Form::select('user_id', [''=> "Posted by"] + $users , null, ['class' => 'form-control']) !!}

{{-- 			{!! Form::label('category_id', 'Category') !!}
			{!! Form::select('category_id', [''=> "Choose category"] , null, ['class' => 'form-control']) !!} --}}

		</div>

		<div class="form-group">
			{!! Form::label('photo_id', 'Upload Photo') !!}
			{!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Create Post', ['class' =>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}

	@include('includes.form_error')

@stop