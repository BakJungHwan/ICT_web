<!--
삭제나 수정을 하기전에 글에서 사용한 '비밀번호'를 확인하는 과정
hidden으로 삭제 혹은 수정할 글의 DB id,
수정, 삭제 select값
'글번호' 값을 전달한다.
-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body>
    <p>글 작성시 설정한 비밀번호를 입력해주세요.</p>

    <form action="./pwd_cert.php" method="post">
        <input type="password" name="pwd">
        <input type="hidden" name="article_id" value=<?=$_GET['article_id']?>>
        <input type="hidden" name="select" value=<?=$_GET['select']?>>
        <input type="hidden" name="num" value=<?=$_GET['num']?>>
        <input type="submit" value="확인">
    </form>
  </body>
</html>
