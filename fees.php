<?php
	session_start();

	require_once('assets/php/functions/checkLoginStatus.php');
?>

<!DOCTYPE html>

<html>
	<head>
		<title>myRichfield | Fees</title>

		<link rel = "shortcut icon" type="image/ico" href = "assets/media/images/default/richfield_logo.ico">
		<link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link rel="stylesheet" href="assets/css/base.css">
        <link rel="stylesheet" href="assets/css/actions.css">
	</head>

	<body>
		<div class="container">
			<?php require_once('assets/php/layout/header.php'); ?>

			<h1>Student Fees</h1>
			<h2>
				This is a summarized balance of your outstanding fees. If the figure shown below 
				doesn't reflect your latest payment, please contact the financial administrator
				at your campus.
			</h2>

			<table>
				<?php
					require_once('assets/php/database/user.php');

					$db = new User;
		
					$fees = $db->getFees($_SESSION['STID']);

					$headings = ['Student ID', 'Student Name', "Balance Outstanding", 'Due Date'];
					$data = [$_SESSION['STID'], $_SESSION['NAME'], 'R' . $fees['BALANCE'], $fees['DUEDATE']];

					for ($i = 0; $i < count($headings); $i++) {
						echo('<tr>
								<td class = "heading">' . $headings[$i] . '</td>
								<td>' . $data[$i] . '</td>
								</tr>');
					}
				?>
			</table>

			<div class="buttons">
				<a href = "dashboard.php" class = "button">Return</a>
			</div>
		</div>

		<?php require_once('assets/php/layout/footer.php'); ?>
	</body>

	<script src = "assets/js/footer.js"></script>
</html>