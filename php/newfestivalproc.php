<?php
session_start();
include_once('dbconn.php');
$email = $_SESSION['uid'];
$fname = $_POST['fname'];
$start_date = $_POST['start_date'];
$start_time = $_POST['start_time'];
$end_date = $_POST['end_date'];
$end_time = $_POST['end_time'];
$note = $_POST['note'];

$sql = "insert into myfestival(email, fname,start,end,note) values('$email','$fname','$start_date $start_time:00',
'$end_date $end_time:00','$note')";
if($conn->query($sql)) {
    header("location:../index.php");
}
else {
    echo "페스티벌 등록이 실패하였습니다.<br>";
    echo $conn->error;
}
?>