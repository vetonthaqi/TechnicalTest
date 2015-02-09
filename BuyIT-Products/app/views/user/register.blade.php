@extends('layouts.master')

@section('head')
	@parent
	<title>Register</title>
@stop

@section('content')
	<div class="container">
		<h1>Register</h1>

		<form role="form" method="post" action="{{URL::route('postCreate')}}">
			<div class="form-group{{$errors->has('client_name') ? 'has-error' : ''}}">
				<label for="client_name">Client name:</label>
				<input id="client_name" name="client_name" type="text" class="form-control">
				@if($errors->has('client_name'))
					{{$errors->first('client_name')}}
				@endif
			</div>
			<div class="form-group{{$errors->has('username') ? 'has-error' : ''}}">
				<label for="username">Username:</label>
				<input id="username" name="username" type="text" class="form-control">
				@if($errors->has('username'))
					{{$errors->first('username')}}
				@endif
			</div>
			<div class="form-group{{$errors->has('pass1') ? 'has-error' : ''}}">
				<label for="pass1">Password:</label>
				<input id="pass1" name="pass1" type="password" class="form-control">
				@if($errors->has('pass1'))
					{{$errors->first('pass1')}}
				@endif
			</div>
			<div class="form-group{{$errors->has('pass2') ? 'has-error' : ''}}">
				<label for="pass2">Confirm password:</label>
				<input id="pass2" name="pass2" type="password" class="form-control">
				@if($errors->has('pass2'))
					{{$errors->first('pass2')}}
				@endif
			</div>		
			<div class="form-group{{$errors->has('address') ? 'has-error' : ''}}">
				<label for="address">Address:</label>
				<input id="address" name="address" type="text" class="form-control">
				@if($errors->has('address'))
					{{$errors->first('address')}}
				@endif
			</div>
			<div class="form-group{{$errors->has('email') ? 'has-error' : ''}}">
				<label for="email">Email:</label>
				<input id="email" name="email" type="text" class="form-control">
				@if($errors->has('email'))
					{{$errors->first('email')}}
				@endif
			</div>
			{{Form::token()}}
			<div class="form-group">
				<input type="submit" value="Register" class="btn btn-default">
			</div>
		</form>
	</div>
@stop