<!DOCTYPE html>
<html>
    <head>
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
                    <li id="position_left">
                        <a href="classShow.php">강의관리</a>
                    </li>

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
                <li>
                    <a href="orderShow.php">주문</a>
                </li>

                <?php } ?>
            </ul>
        </nav>
        <div class="header-logo" onclick="location.href='index.php'">
            <span>Online Class</span>
        </div>
    </header>
        <div class="container board_add_box">
        <p class="board_title">게시물 수정</p>
            <form action="boardUpdateProc.php" method="post">
                <div class="form-group">
                <label for="boardTitle">제목</label>
                <?php 

                    $no = $_GET['no'];

                    # sql 작성
                    $sql = "select * from board where no = '$no'";

                    $result = $conn->query($sql);
                    $row = $result -> fetch_assoc();
                    
                    $title = $row['title'];
                    $contents = $row['contents'];

                    ?>
                <input type="text" class="form-control" id="boardTitle" name="boardTitle" value="<?=$title?>"></input>
                        </div>

                        <div class="form-group">
                            <label for="boardContents">내용</label>
                            <textarea name="boardContents" class="form-control" rows="10"><?=$contents?></textarea>
                        </div>
                        <input type="text" name="no" value="<?=$no?>" hidden>
                        <div class="btn_signUpdate">
                        <button type="submit" class="btn btn-default " >수정</button>
                            </div>
                        </form>
                            </div>

                        <footer>
    <div class="footer">
      <ul>
        <li>웹프로그래밍 기말프로젝트</li>
        <li>20182375 | 황지영</li>
        <li>2021.06.20</li>
      </ul>
    </div>
  </footer>
                        </body>
                        </html>