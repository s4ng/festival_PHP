<?php
include_once('dbconn.php');
$email = $_POST['email'];
$wdate = $_POST['wdate'];
$title = $_POST['title'];
$note = $_POST['note'];

$sql = "insert into board(email,wdate,title,note) values('$email','$wdate','$title','$note')";
if($conn->query($sql)) {
    header("location:newboard.php");
}
else {
    echo "게시판에 글쓰기가 실패하였습니다.<br>";
    echo $conn->error;
}

?>