<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      header("content-type:text/html; charset-UTF-8");

      include '../lib/db_connect.php';
      $connect = dbconn();
      $member = member();

      $id=$_POST['id']; //mypage.php에서 받아온 id값을 변수 $id에 입력
      $pwd=$_POST['pwd'];

      $pw = md5($pwd);

      if(!$pwd){
        Error("비밀번호를 입력해야 합니다.");
      }elseif($pw != $member['password']){
        Error("비밀번호가 일치하지 않습니다.");
      }

      $delete_query="delete from user where id= '$id'"; //id값이 같은 곳에 name과 tel변수를 업데이트 시키겠다(쿼리문)

      mysql_query("set names utf8"); //db인코딩
      $result = mysql_query($delete_query,$connect); //쿼리수행 문 변수 $result값으로 입력
      mysql_close(); //mysql종료

      ini_set("display_errors", "1"); //세션 종료
      session_start();
      session_destroy();


      echo "<script> alert('회원 탈퇴가 완료되었습니다.'); location.href='../main.php'; </script>";
    ?>

  </body>
</html>
