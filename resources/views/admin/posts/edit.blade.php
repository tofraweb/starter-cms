@extends('layouts.admin');

@section('content')

	<div class="col-sm-4">

		<img src="{{ $post->photo ? $post->photo->file : '/images/placeholder.png' }}" alt="" class="img-responsive img-rounded">

	</div>

	<div class="col-sm-8">

		<h1>Edit Post</h1>

		{!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => true]) !!}
			<div class="form-group">

				{!! Form::label('title', 'Title') !!}
				{!! Form::text('title', null, ['class' => 'form-control']) !!}

				{!! Form::label('body', 'Content') !!}
				{!! Form::textarea('body', null, ['class' => 'form-control']) !!}

				{!! Form::label('category_id', 'Category') !!}
				{!! Form::select('category_id', [''=> "Choose category"]  + $categories, null, ['class' => 'form-control']) !!}

			</div>

			<div class="form-group">
				{!! Form::label('photo_id', 'Change Photo') !!}
				{!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Update Post', ['class' =>'btn btn-primary col-sm-1']) !!}
			</div>
		{!! Form::close() !!}


		{!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}

			<div class="form-group">
				{!! Form::submit('Delete Post', ['class' =>'btn btn-danger col-sm-1', 'style' => 'margin-left:10px']) !!}
			</div>

		{!! Form::close() !!}

	{{-- 	@include('includes.form_error') --}}

	</div>

	<div class="col-sm-12">

		@include('includes.form_error')

	</div>

@stop