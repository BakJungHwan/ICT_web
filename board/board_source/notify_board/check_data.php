<?php
require ("id_session.php");
require ("../connect_db.php");
$sql = "SELECT writer FROM notify_board WHERE id=".$_GET['article_id'];
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row['writer']===$_SESSION['id']){
  if($_GET['select']==1){
#수정으로 선택했을 경우.
  header("Location:http://localhost/board/notify_board/modify_article.php?article_id=".$_GET['article_id']."&num=".$_GET['num']);
  }
  else {
  header("Location:http://localhost/board/notify_board/delete_process.php?article_id=".$_GET['article_id']."&num=".$_GET['num']);
  }
}
else {
  board/error("수정/삭제하려면 글작성시의 ID로 로그인하세요.","http://localhost/board/notify_board/open_article.php?article_id=".$_GET['article_id']."&num=".$_GET['num']);
}

 ?>

<!-- 쿼리 실패시 검증 함수 -->
<!--
삭제나 수정을 하기전에 글에서 사용한 '비밀번호'를 확인하는 과정
hidden으로 삭제 혹은 수정할 글의 DB id,
수정, 삭제 select값
'글번호' 값을 전달한다.
-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  </body>
</html>
