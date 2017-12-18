<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>

<?php
header("content-type:text/html; charset=UTF-8");
session_start();
   include("../lib/db_connect.php");
  $connect= dbconn();

  $id= $_POST['id']; //login.php에서 받아온 id값을 변수 $id값에다가 저장
  $pws= $_POST['pwd']; //login.php에서 받아온 pwd값을 변수 $pwd값에다가 저장

  $pw = md5($pws); //md5해시함수를 통해 비밀번호 암호화한 후 $pw변수에 저장

  $query=" select * from user where id ='".$id."'"; //세션에 저장된 id와 같은 user테이블에 있는 id를 찾은 후, 모든 내용을 불러와라.
  mysql_query("set names utf8"); //db 인코딩 작업
  $result= mysql_query($query, $connect); //db연동 후 쿼리문 전송
if($result){
  $member= mysql_fetch_array($result); //받아온 데이터를 $member라는 변수의 배열로 저장
  if(!empty($id) && !empty($pw)){ //id와 pw가 null값이 아닐 때 if문 수행
      if($member['password'] == $pw){ //db에 있는 id값과 password값이 $pw변수와 같으면 수행
          $_SESSION['login'] = true; //전역변수로 선언
          $_SESSION['id'] = $member['id'];
          $_SESSION['name'] = $member['name'];
          $_SESSION['tel'] = $member['tel'];

          echo "
          <script>
              alert(\"".$member['id']."님이 로그인 하였습니다.\");
              location.href='../main.php';
          </script>";
          exit;
        }
      }
  }


 //Error함수 호출해서 에러메시지 출력
     if(!$id){
       Error("아이디를 입력하세요.");
     }elseif(!$member['id']){
       Error("존재하지 않는 회원 아이디 입니다.");
     }
     if(!$pws){
        Error("비밀번호를 입력하세요.");
     }elseif($member['password']!=$pw){
        Error("비밀번호가 같지 않습니다.");
     }
?>
