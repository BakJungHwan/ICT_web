
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
require ("../connect_db.php");
require ("id_session.php");
if(empty($_POST['title'])||empty($_POST['article']))
{
  error("어느 입력란에도 공란이 있어서는 안됩니다.","http://localhost/board/notify_board/modifiy_article.php?article_id=".$_POST['article_id']."&num=".$_POST['num']);
  exit;
}



  $sql = "UPDATE notify_board SET title='".$_POST['title']."', article='".$_POST['article']."', date=curdate() WHERE id=".$_POST['article_id'];
  mysqli_query($conn,$sql);
  header("Location:http://localhost/board/notify_board/open_article.php?article_id=".$_POST['article_id']."&num=".$_POST['num']);

# 비밀번호 확인, 일치할시 입력, 일치 하지 않으면 수정화면으로 복귀
# $_POST['article_id'], $POST['num'], $_POST['title'], $_POST['writer'], $_POST['article'], , $_POST['pwd']
  ?>

  </body>
</html>
