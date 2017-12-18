<?php
  require ("./id_session.php");
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


        <form action="./write_process.php" method="post">
            <p>제    목 : <input type="text" name="title"></p>
            <p>글 쓴 이 : <?=$_SESSION['id']?></p>
            내    용
            <p><textarea name="article" rows="8" cols="80"></textarea></p>
            <input type="submit" name="write" value="작성완료">
            <a href="./show_list.php">목록으로</a>
        </form>
        <!--비밀번호 입력 안됬을 때, 에러메시지만들기-->

  </body>
</html>
