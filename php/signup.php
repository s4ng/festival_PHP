<?php
# 1.입력데이터 가져오기
$email = $_POST['email'];
$name = $_POST['uname'];
$pwd = $_POST['pwd'];
$tel = $_POST['telno'];

# 2.pizza 데이터베이스 접속하기
include_once("dbconn.php");

#echo "pizza db 접속이 완료되었습니다.";
# 3.INSERT 명령어 작성
$sql = "insert into user values('$email','$name','$pwd','$tel');";
#echo $sql;
if($conn->query($sql) === TRUE) {
    echo "$name 회원의 회원가입이 성공했습니다.<br>";
    echo "<a href='../html/signin.html'>로그인</a>으로 이동";
}
else{
    echo "회원가입 처리에 오류가 발생하였습니다.<br>";
    echo "<a href='../html/signup.html'>회원가입</a>으로 이동";
}
?>
