<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Festival!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/showboard.css">
    <style type="text/css">
        a:link { color: #339af0; text-decoration: none;}
        a:visited { color: #339af0; text-decoration: none;}
        a:hover { color: #1864ab; text-decoration: none;}
    </style>
</head>
<body>
    <?php
        include_once('dbconn.php');
    ?>
    <!--
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
            -->
    <div class="board">
    <h2>게시글 목록</h2>
        <p>등록된 게시글 목록입니다.</p>
        <div class="divider"></div>
        
        <div class="">
            <div>
                <form action="<?= $_SERVER['PHP_SELF']?>" method="get">
                <input type="text" name ="page" value="1" hidden>
                    <input type="text" placeholder="Search..." name="search">
                    <button type="submit" class="btn">SEARCH</button>
                </form>
            </div>
            
        </div>
        <?php
        $email = $_SESSION['uid'];
        if(isset($_GET['search']) && strpos($_GET['search'], '%') === false) {
            $search = $_GET['search'];
            $search = "%".$search."%";
        } else if (!isset($_GET['search'])) $search = '%';
        else $search = $_GET['search'];
        include_once('dbconn.php');
        // 페이징을 위한 변수 선언
        $list_size = 6; // 한 페이지에 표시할 레코드 개수
        $more_page = 3; // 이전 또는 다음으로 넘길때 표시할 페이지수
        $page = isset($_GET['page'])? intval($_GET['page']) : 1;
        $sql = "select count(*) cnt from board where title like '$search'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $allrows = $row['cnt']; // 검색할 레코드 총 개수
        $page_count = (int)($allrows / $list_size); // 페이지 수
        if($allrows % $list_size > 0) $page_count++;
        $start_page = max($page - $more_page, 1);
        $end_page = min($page + $more_page, $page_count);
        $offset = ($page - 1) * $list_size; // 건너띌 레코드 수
        $sql = "select board.*, name from board, user where board.email = user.email 
        and title like '$search' order by no desc limit $offset, $list_size";
        $result = $conn->query($sql);
        if(!$result) echo $conn->error;
        if($result->num_rows == 0) {
            die("검색된 레코드가 없습니다.");
        }
        ?>
        
        <table id='pizza'>
            <tr>
                <th>번호</th>
                <th>작성자</th>
                <th>작성일자</th>
                <th>제목</th>
            </tr>
        <?php
        while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?=$row['no']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['wdate']?></td>
                <td><a href="showboarditem.php?no=<?=$row['no']?>"><?=$row['title']?></a></td>
            </tr>
        <?php } ?>
        </table>
        <div class="paging_area">
        <!-- 이전 페이지 버튼 -->
            <?php if($page > 1){?>
            <a href="showboard.php?page=<?=($page-1)?>&search=<?=$search?>">PREV</a>
            <?php } else { ?>
            <span>PREV</span>
            <?php } ?>
        <!-- 페이지 리스트 번호 -->
        <?php
        for($p = $start_page; $p <= $end_page; $p++){
            if($page == $p){
                echo "<a href='#' class='active'>$p</a>";
            }
            else {
        ?>
            <a href="showboard.php?page=<?=$p?>&search=<?=$search?>"><?=$p?></a>
            <?php }   }   ?>
        <!-- 다음 버튼 -->
        <?php if($page < $end_page) { ?>
        <a href="showboard.php?page=<?= ($page+1) ?>&search=<?=$search?>">NEXT</a>
        <?php } else { ?>
            <span>NEXT</span>
        <?php } ?>
        </div>
    </div>
</body>
</html>