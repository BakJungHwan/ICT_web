<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>비밀번호 변경페이지</title>
  </head>
  <body>
      <p><a href="../main.php">[홈]</a></p>
      <br><br><br>

      <form action="./modify_pwd_post.php" method="post">
        <p><strong>[비밀번호 변경]</strong></p>
        <p>현재 비밀번호 : <input type="password" name="now_pwd"</p>
        <p>변경 할 비밀번호: <input type="password" name="after_pwd1"</p>
        <p>변경 할 비밀번호 확인 : <input type="password" name= "after_pwd2"</p>
        <br><br>
        <input type="submit" value="완료">
      </form>


  </body>
</html>
