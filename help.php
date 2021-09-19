<?php
    session_start();
?>

<!DOCTYPE html>

<html>
	<head>
		<title>myRichfield | Help Corner</title>

        <link rel = "shortcut icon" type="image/ico" href = "assets/media/images/default/richfield_logo.ico">
        <link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link rel="stylesheet" href="assets/css/base.css">
        <link rel="stylesheet" href="assets/css/help.css">
	</head>

	<body>
		<?php require_once('assets/php/layout/header.php'); ?>

		<div class="container">
			<h1>Help corner</h1>
			<h2>
				We're here to help. If the problem that you've encountered isn't listed below, 
				contact your campus manager.
			</h2>

			<div class="item">
				<h3>How do I sign up?</h3>
				<p>
					Easy! Click the 'Create an account' button situated on the top of this page. 
					If you're using a smartphone, click the menu icon first.
				</p>
			</div>

			<div class="item">
				<h3>How do I login once I create an account?</h3>
				<p>
					Easy! Click the 'Login' button situated on the top of this page. 
					If you're using a smartphone, click the menu icon first.
				</p>
			</div>

			<div class="item">
				<h3>Why is so much information needed to create an account?</h3>
				<p>
					This is to prevent fraudulent accounts from being created. 
					The information that you enter is compared to our databases to ensure 
					that only verified students of Richfield can create an account. 
					This information is not shared or sold to any 3rd parties.
				</p>
			</div>

			<div class="item">
				<h3>Why am I not able to login?</h3>
				<p>
					When the system detects you have 3 unsuccessful login attempts, 
					the account you're trying to login to will be locked for 30 minutes.
				</p>
			</div>

			<div class="item">
				<h3>Is there any way to reset my password?</h3>
				<p>Contact the administrators at your campus</p>
			</div>

			<div class="item">
				<h3>My results, fees or attendance record is incorrect</h3>
				<p>
					This platform sources the data from Richfield's database, so 
					if the information you're viewing is incorrect, try contacting 
					the adminstrators at your campus to rectify the matter.
				</p>
			</div>

			<div class="item">
				<h3>I've requested my result sheet to be sent but haven't received any feedback</h3>
				<p>
					We receive many requests everyday from students. Your request 
					may have been denied due to finance. If this is the case, 
					contact the financial administrator of your campus
				</p>
			</div>

			<div class="item">
				<h3>Why do I need to enable cookies when using this website?</h3>
				<p>
					We require cookies to be enabled in order to keep you logged in on subsequent 
					visits (assuming you enabled the 'Remember Me' functionality. If you don't enable 
					this, you will have to sign in everytime you use this platform. We don't use 
					cookies to track you across the web.)
				</p>
			</div>
		</div>

		<?php require_once('assets/php/layout/footer.php'); ?>
	</body>

	<script src = "assets/js/footer.js"></script>
</html>