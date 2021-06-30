<?php
    # 세션 시작
    session_start();

    # DB 접속
    include_once('dbconn.php');

    # 데이터 가져오기
    $id = $_POST['id'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    # SQL 작성
    $sql = "update user set password = '$pwd', email = '$email', tel = '$tel' where id = '$id'";

    # SQL 실행
    if($conn->query($sql)) {
        // true
        $_SESSION['id'] = $id;
        echo "<script>alert('회원정보가 변경되었습니다.');</script>";
        echo "<script> if(window.location == 'http://localhost:8081/OnlineClass/signUpdateProc.php') window.location.href='http://localhost:8081/OnlineClass/index.php';</script>";
    }
    else {
        // false
        echo "회원정보 변경 중에 오류가 발생하였습니다.".$conn->error;
    }

?>