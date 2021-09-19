<?php
    require_once('assets/php/functions/phpqrcode.php');

    session_start();

    if (!isset($_GET['error'])) {
        header('Location: dashboard.php');
        die;
    }
?>

<!DOCTYPE html>

<html lang = "en-za">
    <head>
        <meta charset = "UTF-8">

        <link rel = "shortcut icon" type="image/ico" href = "assets/media/images/default/richfield_logo.ico">
        
        <title>myRichfield | Error</title>

        <link rel = "stylesheet" href="assets/css/error.css">
    </head>

    <body>
        <div class = "container">
            <p id = 'face'>:(</p>
            <h1>
                We encountered a problem and stopped any changes being made to your 
                profile. We also collected some information about the error, so you 
                can go back to <a href = 'dashboard.php'>safety</a>
            </h1>

            <?php
                echo('<h3>If you are from IT Support or an IT Technician, scan the QR code below or search for this error online: <a href = "http://www.google.co.za/search?q=' . $_GET['error'] . '" class = "error" target = "_blank">' . $_GET['error'] . '</a></h3>');  
            
                QRcode::png("http://www.google.co.za/search?q=" . urlencode($_GET['error']), 'assets/media/images/default/code.png');
            ?>

            <img src = 'assets/media/images/default/code.png' class = "qr">

            <h4>We apologize for any inconvenience caused</h4>
        </div>
    </body>
</html>