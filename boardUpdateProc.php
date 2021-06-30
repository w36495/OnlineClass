<?php
    # 세션 시작
    session_start();

    # DB 접속
    include_once('dbconn.php');

    # 데이터 가져오기
    $no = $_POST['no'];
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];


    # SQL 작성
    $sql = "update board set title = '$boardTitle', contents = '$boardContents' where no = '$no'";

    # SQL 실행
    if($conn->query($sql)) {
        echo "<script>alert('변경되었습니다.');</script>";
        echo "<script>location.href='boardListShow.php';</script>";
    }
    else {
        // false
        echo "해당 글 수정 중에 오류가 발생하였습니다.".$conn->error;
    }

?>