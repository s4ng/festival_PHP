<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Festival!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/showfestival.css">
    <style type="text/css">
        a:link { color: white; text-decoration: none;}
        a:visited { color: white; text-decoration: none;}
        a:hover { color: #74c0fc; text-decoration: none;}
        input[type=submit] {
            background-color: #74c0fc;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            margin-right:20px;
        }
    </style>
</head>
<body>
    <?php
        include_once('../php/dbconn.php');
    ?>
    <div class="maintitle">
        <h1><a href="../index.php">Festival!</a></h1>
    </div>
    <div class="topnav">
        <a href="#" class="active">Home</a>
        <a href="newfestival.php" >Festival 등록하기!</a>
        <a href="newboard.php" >게시판</a>
        <div class="topnav-right">
            <?php if(!isset($_SESSION['uid'])) { ?>
            <a href="../html/signup.html">회원가입</a>
            <a href="../html/signin.html">로그인</a>
            <?php } else { ?>
            <a href="signout.php">로그아웃</a>
            <?php } ?>
        </div> 
    </div>
    <?php
        $fno = $_GET['fno'];
        $sql = "select * from myfestival where fno = $fno";
        $result = $conn->query($sql);
        if(!$result) {
            die("검색된 레코드가 없습니다.");
        }
        $row = $result->fetch_assoc();
    ?>
    <div class="contents">
    <form action="deletefestival.php" method="post">
        <input type="text" name="fno" value="<?=$fno?>" hidden>
        <?php if(isset($_SESSION['uid'])){ ?>
        <input type="text" name="uid" value="<?=$_SESSION['uid']?>" hidden>
        <?php } ?>
        <div class="images">
            <img src="../image/festivalimg.jpg">
        </div>
        <div class="title">
            <h2><?= $row['fname'] ?></h2>
        </div>
        <div class="date">
            start : <?= $row['start'] ?> <br>
            ~ end : <?= $row['end'] ?>
        <div>
        <div class="note">
            <?= $row['note'] ?>
        <div>
        <?php if(isset($_SESSION['uid']) && $_SESSION['uid'] == $row['email']){ ?>
        <div>
            <input type="submit" value="삭제">
        </div>
        <?php } ?>
    </form>
    </div>
</body>
</html>    
    