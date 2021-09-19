<?php
	session_start();
	
	if (isset($_SESSION['loggedIn'])) {
		header('Location: dashboard.php');
		die;
	}

	require_once('assets/php/functions/checkCookieStatus.php');
?>

<!DOCTYPE html>

<html>
	<head>
		<title>myRichfield | Home</title>

		<link rel = "shortcut icon" type="image/ico" href = "assets/media/images/default/richfield_logo.ico">
		<link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link rel="stylesheet" href="assets/css/base.css">
        <link rel="stylesheet" href="assets/css/index.css">
	</head>

	<body>
		<?php require_once('assets/php/layout/header.php'); ?>

		<div class="container">
			<h1 id = "attract">Empowering students</h1>

			<div class="cards">
				<div class="card">
					<h1>Already have an account? <a href = "login.php">Log in</a></h1>
				</div>

				<div class="card">
					<h1>New around town? <a href = "signup.php">Sign up</a> for an account</h1>
				</div>
			</div>
		</div>

		<?php require_once('assets/php/layout/footer.php'); ?>
	</body>

	<script src = "assets/js/footer.js"></script>
</html>