<?php
    if ((isset($_COOKIE['myRichfield_STID'])) && (isset($_COOKIE['myRichfield_NAME'])) && !isset($_SESSION['loggedIn'])) {
        $_SESSION['STID'] = $_COOKIE['myRichfield_STID'];
        $_SESSION['NAME'] = $_COOKIE['myRichfield_NAME'];
        $_SESSION['loggedIn'] = true;
        $_SESSION['LoginAttempts'] = 0;
    
        header('Location: dashboard.php');
        die;
    }
?>