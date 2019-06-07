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
    <?php
        $no = $_GET['no'];
        $sql = "select * from board where no = $no";
        $result = $conn->query($sql);
        if(!$result) {
            die("검색된 레코드가 없습니다.");
        }
        $row = $result->fetch_assoc();
    ?>
    <div class="contents">
    <form action="deleteboard.php" method="post">
        <input type="text" name="no" value="<?=$no?>" hidden>
        <?php if(isset($_SESSION['uid'])){ ?>
        <input type="text" name="uid" value="<?=$_SESSION['uid']?>" hidden>
        <?php } ?>
        <div class="images">
            <img src="../image/festival2.jpg">
        </div>
        <div class="title">
            <h2><?= $row['title'] ?></h2>
        </div>
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
    