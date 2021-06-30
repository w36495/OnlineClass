<?php

    # db 연결
    include_once('dbconn.php');

    $cartCheck = $_GET['chk'];
    $count = count($cartCheck);
    
    for($i = 0; $i<$count; $i++) {
        $no = $cartCheck[$i];
        
        # 삭제 sql 작성
        $sql = "delete from cart where no = '$no'";

        if($conn->query($sql)) {
        } 
        else {
            echo "<script>alert('장바구니 상품 삭제 중 오류가 발생하였습니다.');</script>";
            echo $conn->error;
            break;
        }
    }

    echo "<script>alert('선택된 상품들이 삭제되었습니다.');</script>";
    echo "<script>location.href='http://localhost:8081/OnlineClass/cartShow.php';</script>";
    ?>