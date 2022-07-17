<?php

$PATH = "views/assets/";

$host = "localhost";
$user = "root";
$password = "";
$db = "remont2";
$charset = "utf8";

$conn = mysqli_connect($host, $user, $password, $db);
mysqli_set_charset($conn, $charset);
