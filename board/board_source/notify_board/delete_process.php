<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    # pwd_certification.php로 부터 $_GET['article'], $_GET['num']  로 데이터 전송
    # SQL문으로 해당하는 글의 데이터를 삭제한 후, show_list의 첫페이지로 이동한다.
require ("id_session.php");
require ("../connect_db.php");
    $sql = "DELETE FROM notify_board WHERE id=".$_GET['article_id'];
    $result = mysqli_query($conn,$sql);
    header("Location:http://localhost/board/notify_board/show_list.php");
     ?>



  </body>
</html>
