@extends('layouts.admin');

@section('content')

	<h1>{{ $post->title }}</h1>

	<h5>Posted by: {{ $post->user->name }}</h5>

	<p>{{ $post->body }}</p>

@stop