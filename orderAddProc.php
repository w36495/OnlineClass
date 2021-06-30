<?php
    
    # 세션
    session_start();

    $id = $_SESSION['id'];

    # db 연결
    include_once('dbconn.php');

    $cartCheck = $_GET['chk'];
    $cartCheckCount = count($cartCheck);
    // $ordno_num = 1;
    // $ordno = date("Y").date("m").date("d")."-".$ordno_num;

    
    
    for($i = 0; $i<$cartCheckCount; $i++) {
        $no = $cartCheck[$i];
        
        # 장바구니에서 정보 꺼내오기 sql 작성
        $sql = "select * from cart where no = '$no'";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $ordno = date("Y/m/d");
        $lectureName = $row['lectureName'];
        $lectureCount = $row['count'];
        $price = $row['price'];

        # order 테이블에 넣기
        $sql = "insert into onlineclass.order(orddate, id, lectureName, lectureCount, price) values('$ordno', '$id', '$lectureName', $lectureCount, $price)";


        if($conn->query($sql)) {
            echo "<script>alert('주문이 완료되었습니다.');</script>";
            echo "<script>location.href='orderShow.php';</script>";
        }
        else {
            echo "<script>alert('주문하는 도중 오류가 발생하였습니다.');</script>".$conn->error;
        }

        # 장바구니에서 삭제
        $sql = "delete from cart where no='$no'";
        if($conn->query($sql)) {
            
        }
        else {
            echo "<script>alert('주문 후 장바구니 삭제에서 발생하였습니다.');</script>".$conn->error;
        }
    }

    ?>