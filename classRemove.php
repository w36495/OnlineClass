<?php

    # db 연결
    include_once('dbconn.php');

    $classCheck = $_GET['chk'];
    $count = count($classCheck);
    
    for($i = 0; $i<$count; $i++) {
        $no = $classCheck[$i];
        
        # 삭제 sql 작성
        $sql = "delete from lecture where no = '$no'";

        if($conn->query($sql)) {
        } 
        else {
            echo "<script>alert('강의 삭제 중 오류가 발생하였습니다.');</script>";
            echo $conn->error;
            break;
        }
    }

    echo "<script>alert('선택된 강의가 삭제되었습니다.');</script>";
    echo "<script>location.href='http://localhost:8081/OnlineClass/classShow.php';</script>";
    ?>