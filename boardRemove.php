<?php
    # 세션
    session_start();

    # db 연결
    include_once('dbconn.php');

    # 값 받아오기
    $no = $_GET['no'];

    # sql 작성
    $sql = "delete from board where no = '$no'";

    if($conn->query($sql)) {
        echo "<script>alert('해당 게시물이 삭제되었습니다.');</script>";
        echo "<script>location.href='http://localhost:8081/OnlineClass/boardListShow.php';</script>";
    }
    else {
        echo "<script>alert('게시물 삭제 중에 오류가 발생하였습니다.');</script>".$conn->error;
    }
?>