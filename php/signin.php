<?php
session_start();

# 1.입력데이터 가져오기
$email = $_POST['email'];
$pwd = $_POST['pwd'];

# 2.pizza 데이터베이스 접속하기
include_once("dbconn.php");

# 3.SELECt 질의문 작성하기
$sql = "SELECT * FROM user WHERE email = '$email' 
            AND password = '$pwd'";
//echo $sql;

# 4.SELECT 실행
$result = $conn->query($sql);  // select 실행 결과를 $result 저장
echo $conn->error;
if($result->num_rows > 0) {
    echo "로그인이 완료되었습니다.";
    // 세션(Session) 생성
    $row = $result->fetch_assoc();  // 검색된 레코드 하나 가져오기
    //echo $row['email']."<br>";
    //echo $row['password'];
    $_SESSION['uid'] = $row['email']; // uid 세션변수에 이메일 저장
    $_SESSION['name'] = $row['name']; //사용자이름을 세션변수에 저장
    header("location:../index.php");
}
else
    echo "아이디 또는 패스워드가 맞지 않습니다. <br>";
    echo "<a href='../html/signin.html'>로그인 페이지</a>로 이동";
?>
