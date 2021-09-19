<?php
    session_start();
?>

<!DOCTYPE html>

<html>
	<head>
		<title>myRichfield | About</title>

        <link rel = "shortcut icon" type="image/ico" href = "assets/media/images/default/richfield_logo.ico">
        <link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link rel="stylesheet" href="assets/css/base.css">
        <link rel="stylesheet" href="assets/css/about.css">
	</head>

	<body>
		<?php require_once('assets/php/layout/header.php'); ?>

		<div class="container">
			<h1>Made with <i class="fas fa-heart" style = "color: #f00;"></i> by Shaiyur Dooken</h1>

			<div class="item">
				<h2>About me</h2>
				<p>
					Hi there! I'm Shaiyur Dooken and I'm currently studying towards my BSc in IT. 
					I've come a long way since my <span>print("Hello, world!")</span> program in Python 3.
					This platform has been created for my <span>Internet Programming 622</span> assignment 
					and initially started off as just a demo for a social network that I intended to create 
					in my free time.
				</p>
			</div>

			<div class="item">
				<h2>About this platform</h2>
				<p>
					View your current balance outstanding to the institution, attendance record as well as your 
					grades for the modules that you're enrolled in, all without having to contact an adminstrator. 
					Certain exceptions may require you to contact the relevant personnel.
				</p>
			</div>
		</div>

		<?php require_once('assets/php/layout/footer.php'); ?>
	</body>

	<script src = "assets/js/footer.js"></script>
</html>