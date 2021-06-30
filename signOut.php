<?php
    session_start();
    # 세션 데이터만 지우면 로그아웃!
    session_destroy();  // 세션 지우기
    
    echo "<script>alert('로그아웃되었습니다.');</script>";
    echo "<script> if(window.location == 'http://localhost:8081/OnlineClass/signOut.php') window.location.href='http://localhost:8081/OnlineClass/index.php'</script>";
?>