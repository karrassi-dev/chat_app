<?php 

	session_start();
	if(isset($_SESSION['unique_id'])){
	header("location: home.php");
	}

?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="theme-color" content="#000000" />
        <meta name="description" content="Web site created using create-react-app" />
        <link rel="stylesheet" href="style.css">
        <title>React App</title>
    </head>
    <body>

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form autocomplete="off" autofill="off">
			<div class="errorTextOnSignUp"></div>
			<h1>Create Account</h1>
			<input type="text" name="username" placeholder="Name" />
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<input type="file" name="image" />
			<button class="sign-up" type="submit" name="signUp" class="signUp">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form autocomplete="off">
			<div class="errorTextOnSignIn"></div>
			<h1>Sign in</h1>
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button class="sign-in" type="submit" name="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost signup" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost sign-in" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<script src="javascript.js"></script>
<script src="signup.js"></script>
<script src="signin.js"></script>

</body>
</html>