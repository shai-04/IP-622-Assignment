<?php
	session_start();

    require_once('assets/php/functions/checkLoginStatus.php');

	require_once('assets/php/database/user.php');
	require_once('assets/php/functions/displayMessage.php');
    require_once('assets/php/functions/greeting.php');
?>

<!DOCTYPE html>

<html>
	<head>
		<title>myRichfield | Dashboard</title>

		<link rel = "shortcut icon" type="image/ico" href = "assets/media/images/default/richfield_logo.ico">
		<link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link rel="stylesheet" href="assets/css/base.css">
		<link rel="stylesheet" href="assets/css/dashboard.css">
	</head>

	<body>
		<div class="container">
			<?php require_once('assets/php/layout/header.php'); ?>

			<?php echo('<h1>' . greeting() . '</h1>'); ?>
			
			<div class="cards">
				<div class="card" onclick = "window.location.href = 'fees.php'">
					<i class="fas fa-money-check-alt"></i>
					<p>Outstanding fees</p>
				</div>

				<div class="card" onclick = "window.location.href = 'attendance.php'">
					<i class="fas fa-school"></i>
					<p>Attendance record</p>
				</div>

				<div class="card" onclick = "window.location.href = 'results.php'">
					<i class="fas fa-percentage"></i>
					<p>View results</p>
				</div>
			</div>
		</div>

		<?php require_once('assets/php/layout/footer.php'); ?>
	</body>

	<script src = "assets/js/footer.js"></script>
</html>