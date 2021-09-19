<?php
	session_start();

	require_once('assets/php/functions/checkCookieStatus.php');

	require_once('assets/php/functions/displayMessage.php');

	if (isset($_SESSION['loggedIn'])) {
		header('Location: dashboard.php');
		die;
	}

	if (isset($_POST['signup'])) {
		require_once('assets/php/database/user.php');

		$db = new User;
		
		$page = 'Location: ';

		if (!$db->emailCheck($_POST['email'])) {
			if (!$db->usernameCheck($_POST['username'])) {
				if ($_POST['pass'] == $_POST['pass_confirm']) {
					$db->createAccount($_POST['username'], $_POST['pass'],
									   $_POST['fName'], $_POST['lName'],
									   $_POST['email'], $_POST['qualification'],
									   $_POST['cell'], $_POST['gender'], $_POST['nationality']);

					$id = $db->getSTID($_POST['username'])['STID'];

					$db->addFees($id);
					$db->addAttendance($id);
					$db->addModules($id, $_POST['qualification']);

					$page .= 'login.php?signup=1';
				}
				else {
					$page .= 'signup.php?password=0';
				}
			}
			else {
				$page .= 'signup.php?username=0';
			}
		}
		else {
			$page .= 'signup.php?email=0';
		}

		header($page);
		die;
	}
	else if (isset($_GET['email'])) {
		displayMessage('error', 'The e-mail that you\'ve entered is already in use. <a href = "login.php">Log in</a> instead?');
	}
	else if (isset($_GET['username'])) {
		displayMessage('error', 'The username that you\'ve entered is already in use. <a href = "login.php">Log in</a> instead?');
	}
	else if (isset($_GET['password'])) {
		displayMessage('error', 'The passwords that you\'ve entered don\'t match');
	}
?>

<!DOCTYPE html>

<html>
	<head>
		<title>myRichfield | Signup</title>

		<link rel = "shortcut icon" type="image/ico" href = "assets/media/images/default/richfield_logo.ico">
		<link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link rel="stylesheet" href="assets/css/base.css">
        <link rel="stylesheet" href="assets/css/form.css">
        <link rel="stylesheet" href="assets/css/signup.css">
	</head>

	<body>
		<div class="container">
			<?php require_once('assets/php/layout/header.php'); ?>

			<main>
				<h1>Create an account</h1>

				<form action = "signup.php" method = "POST">
					<div class="field">
						<label for = "username">Username</label>
						<input type = "text" name = "username" id = "username" required>
					</div>

					<div class="field">
						<label for = "email">E-mail</label>
						<input type = "email" name = "email" id = "email"  required>
					</div>


					<div class="field">
						<label for = "fName">First name</label>
						<input type = "text" name = "fName" id = "fName" required>
					</div>


					<div class="field">
						<label for = "lName">Last name</label>
						<input type = "text" name = "lName" id = "lName" required>
					</div>

					<div class="field">
						<label for = "cell">Cell number</label>
						<input type = "tel" name = "cell" id = "cell" size = '10' required>
					</div>					

					<div class="field">
						<div class = "genders">
							<input type = "radio" name = "gender" value = 'Male' id = 'male' checked>
							<label for = "male">Male</label>

							<input type = "radio" name = "gender" value = 'Female' id = 'female'>
							<label for = "female">Female</label>

							<input type = "radio" name = "gender" value = 'Other' id = 'other'>
							<label for = "other">Other</label>
						</div>
					</div>					


					<div class="field">
						<label for = "Qualification">Qualification</label>
						<select name = "qualification">
							<option value = "BSc IT">Bachelor of Science in Information Technology</option>
							<option value = "DIT">Diploma in Information Technology</option>
							<option value = "HCIT">Higher Certificate in Information Technology</option>
						</select>
					</div>					

					<div class="field">
						<label for = "nationality">Nationality</label>
						<select name = "nationality">
							<option value = "South African">South African</option>
							<option value = "American">American</option>
							<option value = "Canadian">Canadian</option>
						</select>
					</div>					

					<div class="field">
						<label for = "pass">Password</label>
						<input type = "password" name = "pass" id = "pass" required>
					</div>

					<div class="field">
						<label for = "pass_confirm">Confirm password</label>
						<input type = "password" name = "pass_confirm" id = "pass_confirm" required>
					</div>

					<div>
						<input type = "button" value = "Cancel" onclick = "window.location.href = 'index.php'">
						<input type = "submit" name = "signup" value = "Create account">
					</div>
				</form>

			</main>
		</div>

		<?php require_once('assets/php/layout/footer.php'); ?>
	</body>

	<script src = "assets/js/footer.js"></script>
</html>