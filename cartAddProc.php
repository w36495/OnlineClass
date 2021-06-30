<?php

    # 세션
    session_start();

    # db 연결
    include_once('dbconn.php');


    $lectureName = $_GET['lectureName'];
    $teacherName = $_GET['teacherName'];
    $price = $_GET['price'];
    $count = 1;

    if(!isset($_SESSION['id'])) {
        echo "<script>alert('로그인이 되어 있지 않습니다.');</script>";

        echo "<script>location.href='http://localhost:8081/OnlineClass/signIn.html'</script>";
        
    }
    else {
        
    $id = $_SESSION['id'];
        # sql 작성
    $sql = "insert into cart(id, lectureName, teacherName, count, price) values('$id', '$lectureName', '$teacherName', $count, $price)";
    
    # sql 실행
    if($conn->query($sql)) {
        echo "<script>alert('선택한 강의가 장바구니에 담겼습니다.');</script>";

        echo "<script>location.href='http://localhost:8081/OnlineClass/cartShow.php'</script>";
    }
    else {
        echo "<script>alert('장바구니에 담기는 중에 오류가 발생하였습니다.');</script>";
        echo $conn->error();
    }

    }

    

?>