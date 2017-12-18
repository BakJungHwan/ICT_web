<?php
    require ("../../board_lib/dbconn.php");
    require ("./id_session.php");
    $sql = "SELECT title,writer,article FROM id_board WHERE id=".$_GET['article_id'];
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
?>
<!--
글 수정하는 페이지.
hidden으로 글의 id와 글번호를 넘겨서 수정후에 원래 글로 돌아올 수 있도록 한다.
-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body>
    <form action="./mod_process.php" method="post">
        <input type="hidden" name="article_id" value=<?=$_GET['article_id']?>>
        <input type="hidden" name="num" value=<?=$_GET['num']?>>

        <p>제    목 : <input type="text" name="title" value=<?=$row['title']?>></p>
        <p>글 쓴 이 : <?=$row['writer']?></p>
        내    용
        <p><textarea name="article" rows="8" cols="80"><?=$row['article']?></textarea></p>
        <input type="submit" name="write" value="작성완료">
        </form>

    </form>

    <a href="./show_list.php">목록으로</a>
<!--header("Location:http://localhost/board/modify_article.php?article_id=".$_POST['article_id']."&num=".$_POST['num']); 현재 위치-->
<!--비밀번호 입력 안됬을 때, 에러메시지만들기-->

  </body>
</html>
