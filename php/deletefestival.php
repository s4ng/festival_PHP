<?php
$uid = $_POST['uid'];
$fno = $_POST['fno'];

include_once('dbconn.php');
$sql = "delete from myfestival where fno = $fno and email = '$uid'";
if($conn->query($sql) === TRUE){
    header("location:../index.php");
} else {
    echo "삭제에 실패했습니다.";
}
?>