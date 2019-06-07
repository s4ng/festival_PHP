<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "festival";
$conn = new mysqli($server, $user, $pass, $dbname);
if($conn->connect_error) {
    die("festival db 접속이 실패하였습니다.");
}
?>
