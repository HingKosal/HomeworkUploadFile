<?php 
define('TITLE', 'Login');
include('templates/header1.html');
print '<h2>Login Form</h2>
	<p>Users who are logged in can take advantage of certain 
	features like this, that, and the other thing.</p>';
print 'email: kosal@gmail.com password: test';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {// Check if the form has been submitted:
	// Handle the form:
	if ( (!empty($_POST['email'])) && (!empty($_POST['password'])) ) {
		if ( (strtolower($_POST['email']) == "kosal@gmail.com") 
			&& ($_POST['password'] == 'test') ) { // Correct!
			session_name('mysession');// change default PHPSESSID
			session_start();
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['loggedin'] = time();
			ob_end_clean(); // Destroy the buffer!
			header ('Location: homepage.php');
			exit();
		} else { // Incorrect!
			print '<p class="text--error">The submitted email address and password 
					do not match those on file!<br>Go back and try again.</p>';
		}
	} else { // Forgot a field.
		print '<p class="text--error">Please make sure you enter both an email 
					address and a password!<br>Go back and try again.</p>';
	}
} else { // Display the form.
	print '<form action="login1.php" method="post" class="form--inline">
	<p><label for="email">Email Address:</label> </br>
	<input id="password" type="email" name="email" size="100"></p>
	<p><label for="password">Password:</label> </br>
	<input type="password" name="password" size="100"></p>
	<p><input type="submit" name="submit" value="Log In!" class="button--pill"></p>
	</form>';
}
include('templates/footer1.html'); // Need the footer.
?>