<?php
    # $_POST['writer'], $_POST['title'], $_POST['article'], $_POST['pwd']  로 데이터 전송
    require ("./id_session.php");
    require ("../../board_lib/dbconn.php");
    if(empty($_POST['title'])||empty($_POST['article']))
    {
      error("어느 입력란에도 공란이 있어서는 안됩니다.","./write_form.php");
      exit;
    }

    $sql = "INSERT INTO id_board(writer,title,date,article) VALUES('".$_SESSION['id']."','".$_POST['title']."', curdate(),'".$_POST['article']."')";
    $result = mysqli_query($conn,$sql);
?>

<script>
  alert('게시 하였습니다.');
  location.href='./show_list.php';
</script>
