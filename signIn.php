<?php

    # 세션 처리 시작
    session_start();       

    # DB 연결하기
    include_once('dbconn.php');

    # 데이터 가져오기
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    # SQL 작성
    $sql = "select * from user where id = '$uid' and password = '$pwd'";

    # SQL 실행
    
    $result = $conn->query($sql);   
    if($result -> num_rows > 0) {     // 검색된 레코드가 존재하는 경우

        $row = $result->fetch_assoc();

        # 세션 키 생성
        $_SESSION['id'] = $row['id'];
        
        echo "<script> location.href='http://localhost:8081/OnlineClass/index.php';</script>";
    }
    else {  // 검색된 레코드가 존재하지 않는 경우
        echo "<script>alert('아이디 또는 비밀번호가 맞지 않습니다.');</script>";
        echo "<script> location.href='http://localhost:8081/OnlineClass/index.php';</script>";
        
    }
    
?>