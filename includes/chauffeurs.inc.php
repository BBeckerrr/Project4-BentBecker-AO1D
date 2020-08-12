<?php
if (isset($_POST['signupC-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];


    // errorhandlers voor klanten.php
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../chauffeurs.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../chauffeurs.php?error=invaliduidmail");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../chauffeurs.php?error=invaliduid&mail=".$email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../chauffeurs.php?error=invalidmail&uid=".$username);
        exit();
    }
    else if ($password !== $passwordRepeat) {
        header("Location: ../chauffeurs.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else {


        // dubbele namen error en email
        $sql = "SELECT uidUsers FROM chauffeurs WHERE uidUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../chauffeurs.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCount = mysqli_stmt_num_rows($stmt);
            mysqli_stmt_close($stmt);
            if ($resultCount > 0) {
                header("Location: ../chauffeurs.php?error=usertaken&mail=".$email);
                exit();
            }
            else {

                $sql = "INSERT INTO chauffeurs (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../chauffeurs.php?error=sqlerror");
                    exit();
                }
                else {

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../chauffeurs.php?signup=success");
                    exit();

                }
            }
        }
    }
    // sluiten van connectie
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    // als iemand van een andere manier op de paginas komt terug sturen.
    header("Location: ../chauffeurs.php");
    exit();
}
