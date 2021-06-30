<?php
    # 세션
    session_start();

    # db 연결
    include_once('dbconn.php');

    # 값 받아오기
    $no = $_GET['no'];

    # sql 작성
    $sql = "delete from onlineclass.order where no = '$no'";

    if($conn->query($sql)) {
        echo "<script>alert('해당 주문이 취소되었습니다.');</script>";
        echo "<script>location.href='http://localhost:8081/OnlineClass/orderShow.php';</script>";
    }
    else {
        echo "<script>alert('주문 삭제 중에 오류가 발생하였습니다.');</script>".$conn->error;
    }
?>