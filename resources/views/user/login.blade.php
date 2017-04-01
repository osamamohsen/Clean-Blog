<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Log-in</title>



    <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">




</head>

<body>

@include('errors.errors')
@if(Session::has('flash_message'))
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('flash_message') }}</p>
@endif

<div class="login-card">
    <h1>Log-in</h1><br>
    {!! Form::open(array('action'=>'UserController@login')) !!}
    {!! Form::label('Email') !!}
    <div><input class="form-group form-control" type="email" name="email"/></div>
    {!! Form::label('Password') !!}
    <div><input class="form-group form-control" type="password" name="password"/></div>
    {{--{!! Form::input('email') !!}--}}
    {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
    <div class="login-help">
        {{--• <a href="#">Forgot Password</a>--}}
    </div>
    {!! Form::close()!!}
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>





</body>
</html>
