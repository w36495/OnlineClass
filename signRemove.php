<?php
    /**
     * 회원탈퇴
     */

    # 세션 시작
    session_start();

    # DB 연결
    include_once('dbconn.php');

    # 데이터 가져오기
    $id = $_SESSION['id'];

    # sql 작성
    $sql = "delete from user where id = '$id'";

    # sql 실행
    if($conn->query($sql)) {
        // true
        echo "<script>alert('탈퇴되었습니다.');</script>";
        echo "<script> if(window.location == 'http://localhost:8081/OnlineClass/signRemove.php') window.location.href='http://localhost:8081/OnlineClass/index.php'</script>";
        session_destroy();  // 세션 정보도 삭제한다. ===> 로그아웃 시키기!
    }
    else {
        // false
        echo "회원정보 삭제 중에 오류가 발생하였습니다.".$conn->error;
    }
?>