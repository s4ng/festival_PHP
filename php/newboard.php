<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Festival!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/newboard.css">
    <style type="text/css">
        a:link { color: white; text-decoration: none;}
        a:visited { color: white; text-decoration: none;}
        a:hover { color: #74c0fc; text-decoration: none;}
    </style>
</head>
<body>
    <?php
        include_once('dbconn.php');
    ?>
    <div class="maintitle">
        <h1><a href="../index.php">Festival!</a></h1>
    </div>
    <div class="topnav">
        <a href="../index.php">Home</a>
        <a href="newfestival.php" >Festival 등록하기!</a>
        <a href="newboard.php" class="active">게시판</a>
        <div class="topnav-right">
            <?php if(!isset($_SESSION['uid'])) { ?>
            <a href="../html/signup.html">회원가입</a>
            <a href="../html/signin.html">로그인</a>
            <?php } else { ?>
            <a href="signout.php">로그아웃</a>
            <?php } ?>
        </div> 
    </div>
    <div class="board">
    <?php
        if(!isset($_SESSION['uid'])) { // 로그인을 하지 않은 경우
            header("location: ../html/signin.html");
        }
        $email = $_SESSION['uid'];
        $wdate = date('Y/m/d');
        ?>
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'newboard')" id="defaultOpen">New Board</button>
            <button class="tablinks" onclick="openTab(event, 'showboard')">List Board</button>
        </div>
        <div id="newboard" class="tabcontent">
        <h2>글 남기기</h2>

        <p>문의사항 또는 방문소감 등을 남겨주세요.</p>

        <div class="divider"></div>

        <div class="container">
          <form action="newboardproc.php" method="post">
            <div class="row">
              <div class="col-25">
                <label for="fname">이메일</label>
              </div>
              <div class="col-75">
                <input type="text" name="email" value="<?=$email?>" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">작성일</label>
              </div>
              <div class="col-75">
                <input type="text" name="wdate" value="<?=$wdate?>" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">제목</label>
              </div>
              <div class="col-75">
                <input type="text" name="title" placeholder="Title..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">메세지</label>
              </div>
              <div class="col-75">
                <textarea rows="10" name="note"></textarea>
              </div>
            </div>
            <div class="row">
              <input type="submit" value="Submit">
            </div>
          </form>
        </div>
        </div>
        
        <div id="showboard" class="tabcontent">
            <iframe src="showboard.php" style="width:100%; height:100%; border:none"></iframe>
        </div>
        
        <script>
            function openTab(evt, tabName) {
                var i, tabContent, tabLinks;
                tabContent = document.getElementsByClassName('tabcontent');
                
                for(i=0; i<tabContent.length; i++) {
                    tabContent[i].style.display = "none";
                }
                tabLinks = document.getElementsByClassName('tablinks');
                for(i=0; i<tabLinks.length; i++) {
                    tabLinks[i].className = tabLinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = 'block';
                evt.currentTarget.className = " active";
            }
            
            document.getElementById('defaultOpen').click();
        </script>
    </div>
</body>
</html>