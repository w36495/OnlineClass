<!DOCTYPE html>
<html>
    <head lang="ko">
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="reset.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <!-- 합쳐지고 최소화된 최신 CSS -->
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <!-- 부가적인 테마 -->
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

        <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    </head>
    <body>
    <header>
    <nav class="header-gnb">
                <ul>
                <li id="position_left">
                        <a href="boardListShow.php">자유게시판</a>
                    </li>
                    <?php
                        # 세션 시작
                        session_start();
                        
                        # db 연결
                        include_once('dbconn.php');

                        if(!isset($_SESSION['id'])) {
                        
                        ?>
                    <li>
                        <a href="signUp.html">회원가입</a>
                    </li>
                    <li class="login">
                        <a href="signIn.html">로그인</a>
                    </li>
                    
                <?php } 
                        else { 
                            $id = $_SESSION['id'];
                            
                            $sql = "select count(*) as countCart from cart where id='$id'";
                            $result = $conn->query($sql);
                            if($result -> num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $count = $row['countCart'];
                            }

                            if($id == "admin") {
                            ?>
                            <li id="position_left"><a href="classShow.php">강의관리</a></li>
                            
                            </li>
                            <?php }?>

                    <li>
                        <a href="signOut.php">로그아웃</a>
                    </li>
                    <li>
                        <a href="signUpdate.php">회원정보수정</a>
                    </li>
                    <li>
                        <a href="cartShow.php">장바구니(<?=$count?>)</a>
                    </li>

                    <?php } ?>
                </ul>
            </nav>
            <div class="header-logo" onclick="location.href='index.php'">
                <span>Online Class</span>
            </div>
        </header>

        <!-- 장바구니 목록 -->
        <div class="container">

            <p class="cart_title">주문 목록</p>
            <form action="cartRemove.php" mothod="get">

                <table class="table table-hover">
                    <tr class="table_th">
                        <th></th>
                        <th>#</th>
                        <th>강의명</th>
                        <th>수량</th>
                        <th>가격</th>

                    </tr>

                    <?php
                    # sql 작성
                    $sql = "select * from cart where id = '$id'";

                    # sql 실행
                    $result = $conn->query($sql);

                    $totalPrice = 0;
                    $totalCount = 0;

                    if($result -> num_rows > 0) {
                        $no = 1;
                        while($row = $result -> fetch_assoc()) {
                            ?>
                    <tr class="table_th">
                        <td><input type="checkbox" name="chk[]" value="<?=$row['no']?>"></td>
                        <td><?=$no?></td>
                        <td><?=$row['lectureName']?></td>
                        <td><?=$row['count']?></td>
                        <td><?=$row['price']?></td>

                        <?php 
                        $totalPrice += $row['price'];
                        $totalCount += $row['count']; 
                        $no++;
                    ?>

                    </tr>
                <?php }
                    } 
                        else {
                            echo "<script>alert('장바구니에 담긴 상품이 없습니다.');</script>";
                            echo "<script>location.href='http://localhost:8081/OnlineClass/index.php;</script>";
                        
                        }
                            ?>

                    <!-- <tr> <td colspan="3"></td> <td><?=$totalCount?></td>
                    <td><?=$totalPrice?></td> </tr> -->

                </table>
                        <div class="btn_class_add">
                <button type="submit" class="btn btn-default">삭제</button>
                    </div>
            </form>
        </div>

    </body>
</html>