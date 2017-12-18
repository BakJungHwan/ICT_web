<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    # $_POST['writer'], $_POST['title'], $_POST['article'], $_POST['pwd']  로 데이터 전송
require ("id_session.php");
require ("../connect_db.php");
if(empty($_POST['title'])||empty($_POST['article']))
{
  error("어느 입력란에도 공란이 있어서는 안됩니다.","http://localhost/board/notify_board/write_form.php");
  exit;
}

    $sql = "INSERT INTO notify_board(writer,title,date,article) VALUES('".$_SESSION['id']."','".$_POST['title']."', curdate(),'".$_POST['article']."')";
    $result = mysqli_query($conn,$sql);
    header("Location:http://localhost/board/notify_board/show_list.php");
     ?>

  </body>
</html>
