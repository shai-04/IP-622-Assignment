<header>
    <a href = "dashboard.php" id = "logo">myRichfield</a>

    <a class = "menu fa fa-bars" href = "#"></a>

    <nav>
        <?php
            if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
                echo('<a href = "fees.php">Fees</a>');
                echo('<a href = "results.php">Results</a>');
                echo('<a href = "attendance.php">Attendance</a>');
                echo('<a href = "login.php?logout=1">Log out</a>');
            }
            else {
                echo('<a href = "login.php">Log in</a>');
                echo('<a href = "signup.php">Create an account</a>');
            }
        ?>
    </nav>
</header>