<?php
session_start();
include 'includes/autoloader.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

	$auth = new Authentication();
	$login_attempt = json_decode($auth->login($username, $password));

	if ($login_attempt->auth) {
		session_regenerate_id();
		$_SESSION['username'] = $login_attempt->username;
	}
}
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
	<input type="text" name="username" placeholder="username" /> 
	<input type="password" name="password" placeholder="password" /> 
	<button type="submit">Login</button>
</form>