<?php
        require ("../../board_lib/dbconn.php");
        require ("../../board_lib/lib.php");

    # $_POST['writer'], $_POST['title'], $_POST['article'], $_POST['pwd']  로 데이터 전송
    if(empty($_POST['title'])||empty($_POST['writer'])||empty($_POST['article'])||empty($_POST['pwd'])){
        error("어느 입력란에도 공란이 있어서는 안됩니다.","./write_form.php");
        exit;
    }

    $sql = "INSERT INTO free_board(writer,title,date,article,pwd)
            VALUES('".$_POST['writer']."','".$_POST['title']."', curdate(),'".$_POST['article']."','".$_POST['pwd']."')";

    $result = mysqli_query($conn,$sql);
?>


<script>
  window.alert('게시 하였습니다.');
  location.href='./show_list.php';
</script>
