<?php
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "test";

// Connectie
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

// error
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
