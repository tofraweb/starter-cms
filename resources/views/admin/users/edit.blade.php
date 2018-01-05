@extends('layouts.admin');

@section('content')

	<div class="col-sm-1">

		<img src="{{ $user->photo ? $user->photo->file : '/images/placeholder.png' }}" alt="" class="img-responsive img-rounded">

	</div>

	<div class="col-sm-11">

		<h1>Edit User</h1>

		{!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}
			<div class="form-group">

				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}

				{!! Form::label('email', 'Email') !!}
				{!! Form::email('email', null, ['class' => 'form-control']) !!}

				{!! Form::label('role_id', 'Role') !!}
				{!! Form::select('role_id', [''=> "Choose role"] + $roles , null, ['class' => 'form-control']) !!}

				{!! Form::label('is_active', 'Status') !!}
				{!! Form::select('is_active', array('0' => 'Inactive', '1' => 'Active'), null, ['class' => 'form-control']) !!}

			</div>

			<div class="form-group">
				{!! Form::label('photo_id', 'Change Photo') !!}
				{!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Update User', ['class' =>'btn btn-primary col-sm-1']) !!}
			</div>
		{!! Form::close() !!}


		{!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}

			<div class="form-group">
				{!! Form::submit('Delete User', ['class' =>'btn btn-danger col-sm-1', 'style' => 'margin-left:10px']) !!}
			</div>

		{!! Form::close() !!}

		@include('includes.form_error')

	</div>

@stop