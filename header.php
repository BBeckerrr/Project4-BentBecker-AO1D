<?php
session_start();
require "includes/dbh.inc.php";
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Itaxi</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
    <body class="subpage">
    <!-- Header -->
        <header id="header">
            <nav class="left">
                <div class="header-login">
                    <?php
                    if (!isset($_SESSION['id'])) {
                        echo '<form action="includes/login.inc.php" class="left" method="post">
            <input class="left" type="text" name="mailuid" placeholder="E-mail/Username">
            <input class="left" type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
          </form>';
                    }
                    else if (isset($_SESSION['id'])) {
                        echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="login-submit">Logout</button>
          </form>';
                    }
                    ?>
                </div>
            </nav>
            <a href="index.php" class="logo">Itaxi</a>
            <nav class="right">
                <a href="index.php" class="button alt">Home</a>
                <a href="chauffeurs.php" class="button alt">Chauffeurs</a>
                <a href="klanten.php" class="button alt">Klanten</a>
                <a href="signup.php" class="button alt">Contact</a>
            </nav>
        </header>
    </body>
</html>
