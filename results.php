<?php
	session_start();

	require_once('assets/php/functions/checkLoginStatus.php');
?>

<!DOCTYPE html>

<html>
	<head>
		<title>myRichfield | Results</title>

        <link rel = "shortcut icon" type="image/ico" href = "assets/media/images/default/richfield_logo.ico">
        <link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link rel="stylesheet" href="assets/css/base.css">
        <link rel="stylesheet" href="assets/css/actions.css">
	</head>

	<body>
        <div class="container">
            <?php
                require_once('assets/php/layout/header.php');

                if (isset($_GET['request'])) {
                    require_once('assets/php/functions/displayMessage.php');

                    //mail('admin@richfield.ac.za', 'Request result', 'ID: ' . $_SESSION['STID'] . '\nName: ' . $_SESSION['NAME']);

                    displayMessage('information', 'Your request has been sent to an administrator. You will shortly receive an e-mail that contains a digital copy of your progress report.');

                }
            ?>

            <h1>Student Results</h1>
            <h2>
                View your final marks for modules that you're enrolled in. If the marks displayed below are incorrect, 
                contact your campus manager.
            </h2>

            <table>
                <?php
                    $headings = ['Student ID', 'Student Name'];
                    $data = [$_SESSION['STID'], $_SESSION['NAME']];
        
                    for ($i = 0; $i < count($headings); $i++) {
                        echo('<tr>
                                <td class = "heading">' . $headings[$i] . '</td>
                                <td>' . $data[$i] . '</td>
                            </tr>');
                    }
                ?>
            </table>

            <table>
                <?php
                    require_once('assets/php/database/user.php');

                    $db = new User;
        
                    $results = $db->getMarks($_SESSION['STID']);

                    $headings = ['Module Name', 'Grade'];

                    echo('<tr>');

                    for ($i = 0; $i < count($headings); $i++) {
                        echo('<th>' . $headings[$i] . '</th>');
                    }

                    echo('</tr>');

                    foreach ($results as $r) {
                        echo('<tr>
                                <td>' . $r['MODULENAME'] . '</td>
                                <td>' . $r['FINAL_MARK'] . '</td>
                            </tr>');
                    }
                ?>
            </table>

            <div class="buttons">
                <a class = "button" href = "results.php?request=1">Request academic record</a>
                <a class = "button" href = "dashboard.php">Return</a>
            </div>

        </div>

		<?php require_once('assets/php/layout/footer.php'); ?>
	</body>

	<script src = "assets/js/footer.js"></script>
</html>