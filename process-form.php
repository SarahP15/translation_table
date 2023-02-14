<?php

$c1 = $_POST["c1"];
$c2 = $_POST["c2"];
$c3 = $_POST["c3"];
$c4 = $_POST["c4"];
$c5 = $_POST["c5"];

$host = "localhost";
$dbname = "translation_table";
$username = "root";
$password = "";

$conn = mysqli_connect(hostname: $host, 
               username: $username, 
               password: $password, 
               database: $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO translation (cell_1, cell_2, cell_3, cell_4, cell_5)
        VALUES (?, ?, ?, ?, ?)"; //using placeholders to prevent sql injection attacks

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssss",
                       $c1,
                       $c2,
                       $c3,
                       $c4,
                       $c5);

mysqli_stmt_execute($stmt);

echo "Record saved.";

?>