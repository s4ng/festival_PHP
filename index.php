<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Festival!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/index.css">
    <style type="text/css">
        a:link { color: white; text-decoration: none;}
        a:visited { color: white; text-decoration: none;}
        a:hover { color: #74c0fc; text-decoration: none;}
    </style>
</head>
<body>
    <?php
        include_once('./php/dbconn.php');
    ?>
    <div class="maintitle">
        <h1><a href="index.php">Festival!</a></h1>
    </div>
    <div class="topnav">
        <a href="#" class="active">Home</a>
        <a href="./php/newfestival.php" >Festival 등록하기!</a>
        <a href="./php/newboard.php" >게시판</a>
        <div class="topnav-right">
            <?php if(!isset($_SESSION['uid'])) { ?>
            <a href="./html/signup.html">회원가입</a>
            <a href="./html/signin.html">로그인</a>
            <?php } else { ?>
            <a href="./php/signout.php">로그아웃</a>
            <?php } ?>
        </div> 
    </div>
    <div class="contents">
    <?php
        $sql = "select * from myfestival";
        $result = $conn->query($sql);
        if(!$result) {
            die("검색된 레코드가 없습니다.");
        }
        while($row = $result->fetch_assoc()) {
        ?>
        <div class="card card-1">
            <a href="./php/showfestival.php?fno=<?=$row['fno']?>"><img src="image/festivalimg.jpg"></a>
            <div class="text">
                <h3><?=$row['fname']?></h3>
                <h4>시작: <?=$row['start']?></h4>
                <h4>종료: <?=$row['end']?></h4>
                <p class="note"><?=$row['note']?></p>
            </div>
        </div>
    <?php } ?>
    </div>
</body>
</html>    
    
    