<?php
    function displayMessage($type, $message) {
        switch ($type) {
            case 'error':
                echo('<h1 class = "error">' . $message . '</h1>');
                break;
            case 'warning':
                echo('<h1 class = "warning">' . $message . '</h1>');
                break;
            case 'information':
                echo('<h1 class = "information">' . $message . '</h1>');
                break;
        }
    }
?>