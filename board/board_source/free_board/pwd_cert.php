<!-- #$_POST['pwd'] $_POST['article']; 입력한 패스워드와 삭제하거나 수정할 글의 id
#$_POST['select'../board_lib/board_lib/ 1 - 수정, 2 - 삭제
#패스워드를 확인하고 각각의 과정으로 넘겨준다. -->
<?php
    require ("../../board_lib/dbconn.php");
    $sql = "SELECT pwd FROM free_board WHERE id=".$_POST['article_id'];
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
    </title>
  </head>

  <body>
    <?php
    if($row['pwd']==$_POST['pwd']){
        if($_POST['select']==1){
              header("Location:./mod_article.php?article_id=".$_POST['article_id']."&num=".$_POST['num']);
        }else{
              header("Location:./del_process.php?article_id=".$_POST['article_id']."&num=".$_POST['num']);
        }
    }else{
              echo "<script type='text/javascript'>
                        alert('비밀번호가 일치하지 않습니다.');
                        location.href='./open_article.php?article_id=".$_POST['article_id']."&num=".$_POST['num']."';
                    </script>";
    }
    ?>
  </body>
</html>
