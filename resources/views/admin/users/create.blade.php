@extends('layouts.admin');

@section('content')

	<h1>Create User</h1>

	{!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}
		<div class="form-group">

			{!! Form::label('name', 'Name') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}

			{!! Form::label('email', 'Email') !!}
			{!! Form::email('email', null, ['class' => 'form-control']) !!}

			{!! Form::label('role_id', 'Role') !!}
			{!! Form::select('role_id', [''=> "Choose role"] + $roles , null, ['class' => 'form-control']) !!}

			{!! Form::label('is_active', 'Status') !!}
			{!! Form::select('is_active', array('0' => 'Inactive', '1' => 'Active'), null, ['class' => 'form-control']) !!}

			{!! Form::label('password', 'Password') !!}
			{!! Form::text('password', null, ['class' => 'form-control']) !!}

		</div>

		<div class="form-group">
			{!! Form::label('file', 'Upload File') !!}
			{!! Form::file('file', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Create User', ['class' =>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}

	@include('includes.form_error')

@stop