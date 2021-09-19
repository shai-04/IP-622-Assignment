<?php    
    if (!isset($_SESSION['loggedIn'])) {
        header('Location: index.php');
        die;
    }
?>