<?php
	session_start();

	require_once('assets/php/functions/checkCookieStatus.php');

	require_once('assets/php/functions/displayMessage.php');

	if (isset($_GET['logout'])) {
		session_unset();
		session_destroy();

		if ((isset($_COOKIE['myRichfield_STID'])) || (isset($_COOKIE['myRichfield_NAME']))) {
			setcookie('myRichfield_STID', '', time() - 60, "/");
			setcookie('myRichfield_NAME', '', time() - 60, "/");
		}
	}
	else if (isset($_SESSION['loggedIn'])) {
		header('Location: dashboard.php');
		die;
	}

	if (isset($_POST['login'])) {
		require_once('assets/php/database/user.php');

		$db = new User;
		
		$page = 'Location: ';

		if (!$db->unlockUser($_POST['credential'])) {
			if ($db->usernameCheck($_POST['credential'])) {
				$result;
	
				if ($result = $db->passwordCheck($_POST['credential'], $_POST['password'])) {
					$_SESSION['STID'] = $result['STID'];
					$_SESSION['NAME'] = $result['FIRSTNAME'];
					$_SESSION['loggedIn'] = true;
					$_SESSION['LoginAttempts'] = 0;

					if (isset($_POST['remember'])) {
						setcookie('myRichfield_STID', $_SESSION['STID'], time() + (86400 * 14), "/");
						setcookie('myRichfield_NAME', $_SESSION['NAME'], time() + (86400 * 14), "/");
					}
	
					$page .= 'dashboard.php';
				}
				else {
					$_SESSION['LoginAttempts'] += 1;
	
					if ($_SESSION['LoginAttempts'] > 2) {
						$db->lockOut($_POST['credential']);

						$_SESSION['LoginAttempts'] = 0;

						$page .= 'login.php?locked=1';
					}
					else {
						$page .= 'login.php?password=0';
					}
				}
			}
			else {
				$page .= 'login.php?credential=0';
			}
		}
		else {
			$page .= 'login.php?locked=1';
		}

		header($page);
		die;
	}
?>

<!DOCTYPE html>

<html>
	<head>
		<title>myRichfield | Login</title>

		<link rel = "shortcut icon" type="image/ico" href = "assets/media/images/default/richfield_logo.ico">
		<link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link rel="stylesheet" href="assets/css/base.css">
        <link rel="stylesheet" href="assets/css/form.css">
        <link rel="stylesheet" href="assets/css/login.css">
	</head>

	<body>
		<div class="container">
			
			<?php
				require_once('assets/php/layout/header.php');

				if (isset($_GET['signup'])) {
					displayMessage('information', 'Your account has been created successfully, please login to proceed');
				}
				else if (isset($_GET['lockout'])) {
					displayMessage('error', 'Your profile has been locked for 30 minutes, due to 3 unsuccessful attempts');
				}
				else if (isset($_GET['credential'])) {
					displayMessage('error', 'The username that you\'ve provided isn\'t associated with any accounts. <a href = "signup.php">Sign up</a> instead?');
				}
				else if (isset($_GET['password'])) {
					displayMessage('error', 'The password that you\'ve entered is incorrect');
				}
			?>
			
			<main>
				<h1>Login</h1>

				<form action = "login.php" method = "POST">
					<div class="credentials">
						<input type = "text" name = "credential" placeholder = "Username">
						<input type = "password" name = "password" placeholder = "Password">
					</div>

					<div class="remember">
						<input type="checkbox" name = "remember" id = "remember" value = "remember">
						<label for = "remember">Remember me</label>
					</div>

					<div class="buttons">
						<input type = "submit" value = "Log in" name = "login">
						<input type = "button" value = "Register" onclick = "window.location.href = 'signup.php'">
					</div>
				</form>
			</main>
		</div>

		<?php require_once('assets/php/layout/footer.php'); ?>
	</body>

	<script src = "assets/js/footer.js"></script>
</html>