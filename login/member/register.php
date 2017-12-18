<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>회원가입 페이지 입니다.</title>
  </head>
  <body>
      <p><a href="../main.php">[홈]</a></p>
      <br><br><br>

      <form  action="register_post.php" method="post">
        <p><strong>[회원가입창입니다]</strong></p>
        <p>아이디 : <input type="id" name="id"></p>

        <p>비밀번호 : <input type="password" name="pwd"> </p>
        <p>이름 : <input type="text" name="name"> </p>
        <p>전화번호 : <input type="text" name="tel"> </p>
        <input type="submit" value="완료">
      </form>
  </body>
</html>
