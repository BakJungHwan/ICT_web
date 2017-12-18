<?php
    require ("./id_session.php");
    require ("../../board_lib/dbconn.php");
    $sql = "SELECT writer FROM id_board WHERE id=".$_GET['article_id'];
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    if($row['writer']===$_SESSION['id']){
          if($_GET['select']==1){
              #수정으로 선택했을 경우.
                header("Location:./mod_article.php?article_id=".$_GET['article_id']."&num=".$_GET['num']);
          }
          else {
                header("Location:./del_process.php?article_id=".$_GET['article_id']."&num=".$_GET['num']);
          }
    }else{
        error("수정/삭제하려면 글작성시의 ID로 로그인하세요.","./open_article.php?article_id=".$_GET['article_id']."&num=".$_GET['num']);
    }
 ?>

<!-- 쿼리 실패시 검증 함수 -->
<!--
삭제나 수정을 하기전에 글에서 사용한 '비밀번호'를 확인하는 과정
hidden으로 삭제 혹은 수정할 글의 DB id,
수정, 삭제 select값
'글번호' 값을 전달한다.
-->
