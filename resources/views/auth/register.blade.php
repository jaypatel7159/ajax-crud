<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Javaid Bashir :: Web developer</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="login.css">
 </head>
<body>
     <!-- Session Status -->
     <!--x-auth-session-status class="mb-4" :status="session('status')" / -->
<!--  Request me for a signup form or any type of help  -->
<div class="login-form">    
    <form method="POST" action="{{ route('register') }}">
    @csrf

		<div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
    	<h4 class="modal-title">Register to Your Account</h4>
        <div class="form-group">
            <x-input-label for="f_name"/>
            <input type="text" class="form-control" placeholder="First Name" name="f_name" :value="old('f_name')" required="required">
            <x-input-error :messages="$errors->get('f_name')" class="mt-2" />
        </div>
        <div class="form-group">
            <x-input-label for="l_name"/>
            <input type="text" class="form-control" placeholder="Last Name" name="l_name" :value="old('l_name')" required="required">
            <x-input-error :messages="$errors->get('l_name')" class="mt-2" />
        </div>
        <div class="form-group">
            <x-input-label for="email"/>
            <input type="text" class="form-control" placeholder="Email" name="email" :value="old('email')" required="required">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="form-group">
        <x-input-label for="password"/>
            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="form-group">
        <x-input-label for="password_confirmation"/>
            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required="required">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
         
        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Register">              
    </form>			
    <div class="text-center small">Already registered? <a href="{{route("login")}}">Sign in</a></div>
</div>
</body>
</html>  

