<?php
        require ("../../board_lib/dbconn.php");
        require ("../../board_lib/lib.php");

        if(empty($_POST['title'])||empty($_POST['writer'])||empty($_POST['article'])||empty($_POST['pwd'])){
          error("어느 입력란에도 공란이 있어서는 안됩니다.","./mod_article.php?article_id=".$_POST['article_id']."&num=".$_POST['num']);
          exit;
        }

        $sql = "SELECT pwd FROM free_board WHERE id=".$_POST['article_id'];
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        # 수정값을 적용시키기 전에 비밀번호를 다시한번 확인하고, 확인되었을 경우 SQL코드로 값을 수정한다.
        # 수정하지 않았을 경우에는 수정되지 않은 상태의 원래 글로 되돌아 간다.
        if($row['pwd'] == $_POST['pwd']){
          $sql = "UPDATE free_board SET title='".$_POST['title']."', writer='".$_POST['writer']."', article='".$_POST['article']."', date=curdate() WHERE id=".$_POST['article_id'];
          mysqli_query($conn,$sql);
        }else{
          echo
            "<script type='text/javascript'>
                alert('비밀번호가 일치하지 않습니다.');
                history.back();
            </script>";
          # header("Location:./modify_article.php?article_id=".$_POST['article_id']."&num=".$_POST['num']);
        }
          # 비밀번호 확인, 일치할시 입력, 일치 하지 않으면 수정화면으로 복귀
          # $_POST['article_id'], $POST['num'], $_POST['title'], $_POST['writer'], $_POST['article'], , $_POST['pwd']

?>

<script type='text/javascript'>
    alert('수정하였습니다.');
    location.href='./show_list.php';
</script>";
