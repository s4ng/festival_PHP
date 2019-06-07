<?php
$no = $_POST['no'];
$uid = $_POST['uid'];

include_once('dbconn.php');
$sql = "delete from board where no = $no";
if($conn->query($sql)) {
    header("location:../index.php");
}
else {
    echo "글 삭제가 실패하였습니다.<br>";
    echo $conn->error;
}
?>