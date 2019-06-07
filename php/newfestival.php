<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Festival!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/showfestival.css">
    <style type="text/css">
          
      .contents{
        display:block;
        border-radius: 5%;
        background: #f2f2f2;
        margin-top:10px;
        width : 80%;
        height : 800px;
        padding-top : 30px;
      }
      label {
        padding: 12px 12px 12px 0;
        display: inline-block;
        }
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
        input[type=text], input[type=number], 
        input[type=date], input[type=time],
        select, textarea {
          width: 80%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          resize: vertical;
        }
        .col-25{
          float:left;
          width:25%;
          margin-top:6px;
        }
        .col-75{
          float:left;
          width:75%;
          margin-top:6px;
        }
        .col-37{
          float:left;
          width:30%;
          margin-top:6px;
          margin-left:30px;
        }
        .row:after {
          content: "";
          display: table;
          clear: both;
        }
        a:link { color: white; text-decoration: none;}
        a:visited { color: white; text-decoration: none;}
        a:hover { color: #74c0fc; text-decoration: none;}
    </style>
</head>
<body>
    <?php
      if(!isset($_SESSION['uid'])) { // 로그인을 하지 않은 경우
        header("location: ../html/signin.html");
      }
        include_once('../php/dbconn.php');
    ?>
    <div class="maintitle">
        <h1><a href="../index.php">Festival!</a></h1>
    </div>
    <div class="topnav">
        <a href="../index.php">Home</a>
        <a href="newfestival.php" class="active">Festival 등록하기!</a>
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
    <div class="contents">
    <form action="newfestivalproc.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="lname">페스티벌 제목</label>
      </div>
      <div class="col-75">
        <input type="text" name="fname">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">시작일</label>
      </div>
      <div class="col-37">
        <input type="date" name="start_date">
      </div>
      <div class="col-37">
        <input type="time" name="start_time">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">종료일</label>
      </div>
      <div class="col-37">
        <input type="date" name="end_date">
      </div>
      <div class="col-37">
        <input type="time" name="end_time">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">내용</label>
      </div>
      <div class="col-75">
        <textarea rows="10" name="note"></textarea>
      </div>
    </div>
    <?php if(isset($_SESSION['uid'])) { ?>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
    <?php } ?>
  </form>
    </div>
</body>
</html>    