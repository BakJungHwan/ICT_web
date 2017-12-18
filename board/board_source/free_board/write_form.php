<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body>
    <form action="./write_process.php" method="post">
        <p>제    목<input type="text" name="title"></p>
        <p>글 쓴 이<input type="text" name="writer"></p>
        내    용
        <p><textarea name="article" rows="8" cols="80"></textarea></p>
        <p>비밀번호<input type="password" name="pwd"></p>
        <input type="submit" name="write" value="작성완료">
    </form>

<!--비밀번호 입력 안됬을 때, 에러메시지만들기-->
  </body>

</html>
