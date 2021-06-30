<?php
    # DB 연결하기
    include_once('dbconn.php');

    # 데이터 가져오기
    // html에 해당되는 값 name 그대로 작성
    $id = $_POST['id'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    # SQL 작성하기
    $sql = "insert into user values('$id', '$pwd', '$email', '$tel')";

    # SQL 실행하기 ==> ($conn->query(sql문))으로 실행
    if($conn->query($sql)) {    // 정상 실행이면 true 반환
        echo "<script>alert('회원가입이 완료되었습니다.');</script>";
        echo "<script> if(window.location == 'http://localhost:8081/OnlineClass/signUp.php') window.location.href='http://localhost:8081/OnlineClass/index.php'</script>";
    } 
    else {
        echo "회원가입 중에 오류가 발생하였습니다.".$conn->error;
    }


?>