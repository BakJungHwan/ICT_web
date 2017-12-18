<?php session_start();
  include '../lib/db_connect.php';
   $connect = dbconn(); //db 연동하기 위해 dbconn()함수호출
   $id = $_SESSION['id'];
   $user_query="select * from user where id ='$id'";  //세션에 저장된 id와 같은 user테이블에 있는 id를 찾은 후, 모든 내용을 불러와라.
   mysql_query("set names utf8"); //db 인코딩 작업
   $result = mysql_query($user_query,$connect);//쿼리수행 문 변수 $result값으로 입력
   $member = mysql_fetch_array($result); //받아온 데이터를 $member라는 변수의 배열로 저장

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>회원정보 수정페이지 입니다.</title>
  </head>
  <body>
      <p><a href="../main.php">[홈]</a></p>
      <br><br><br>


      <form  action="./mypage_post.php" method="post">
        <p><strong>[회원정보수정]</strong></p>
        <p><input type="hidden" name="id" value=<?=$member['id']?>></p>
        <!-- id값을 mypage_post에 보내기 위해 선언함 -->

        <p>이름 : <input type="text" name="name" value=<?=$member['name']?>> </p>
        <p>전화번호  : <input type="text" name= "tel" value=<?=$member['tel']?>></p>
        <input type="submit" value="완료">
      </form>
  </body>
</html>
