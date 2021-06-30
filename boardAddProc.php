<?php
    # 세션
    session_start();

    # db 연결
    include_once('dbconn.php');

    # 값 받아오기
    $id = $_SESSION['id'];
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $rdate = date("Y/m/d");

    # sql 작성
    $sql = "insert into board(id, title, contents, rdate) values('$id', '$boardTitle', '$boardContents', '$rdate')";

    # sql 실행

    if($conn->query($sql)) {
        // 글 작성 성공
        echo "<script>alert('글이 작성되었습니다.');</script>";
        echo "<script>location.href='boardListShow.php';</script>";
    }
    else {
        echo "글 작성 중 오류가 발생하였습니다.".$conn->error;
    }

?>