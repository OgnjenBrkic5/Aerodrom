<?php

$hostName = "localhost";
$korisnik = "root";
$dbPass = "";
$dbName = "aerodrom";
$conn = mysqli_connect($hostName, $korisnik, $dbPass, $dbName);

if (!$conn) {
    die("Nešto nije u redu!" . mysqli_connect_error());
}

?>