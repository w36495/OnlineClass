<?php

    # db 연결
    include_once('dbconn.php');

    # 값 받아오기
    $className = $_POST['className'];
    $classSubject = $_POST['classSubject'];
    $classPrice = $_POST['classPrice'];
    $classTeacher = $_POST['classTeacher'];

    if($classSubject == '국어') $lectureImg = 'th_ko.png';
    else if($classSubject == '수학') $lectureImg = 'th_ma.png';
    else if($classSubject == '영어') $lectureImg = 'th_en.png';
    else if($classSubject == '사회') $lectureImg = 'th_so.png';
    else if($classSubject == '과학') $lectureImg = 'th_sc.png';
    else if($classSubject == '제2외국어') $lectureImg = 'th_sl.png';

    # sql 작성
    $sql = "insert into lecture(lectureName, subject, teacherName, lectureImg, price)
    values ('$className', '$classSubject', '$classTeacher', '$lectureImg', $classPrice)";

    # sql 실행

    if($conn->query($sql)) {
        // 글 작성 성공
        echo "<script>alert('강의가 등록되었습니다.');</script>";
        echo "<script>location.href='classShow.php';</script>";
    }
    else {
        echo "강의 등록 중 오류가 발생하였습니다.".$conn->error;
    }

?>