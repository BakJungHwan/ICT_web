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
  header("content-type:text/html; charset-UTF-8"); ob_start(); session_start();

  include '../lib/db_connect.php';
  $connect = dbconn();
  $member = member($connect);

  $now_pwd=$_POST['now_pwd'];
  $after_pwd1=$_POST['after_pwd1'];
  $after_pwd2=$_POST['after_pwd2'];

  $now_pws = md5($now_pwd);

  if(!$now_pwd){
    Error("현재 비밀번호를 입력해야 합니다.");
  }elseif($now_pws != $member['password']){
    Error("현재 비밀번호가 일치하지 않습니다.");
  }
  elseif(!$after_pwd1){
    Error("변경 할 비밀번호를 입력해야 합니다.");
  }elseif(!$after_pwd2){
    Error("변경 할 비밀번호 확인부탁드립니다.");
  }elseif($after_pwd1 != $after_pwd2){
    Error("비밀번호 확인이 일치하지 않습니다.");
  }elseif($now_pwd == $after_pwd1){
    Error("이전 비밀번호는 사용할 수 없습니다.");
  }

  $after = md5($after_pwd1);

  $update_query="update user set password ='$after' where id ='$member[id]'"; //id값이 같은 곳에 name과 tel변수를 업데이트 시키겠다(쿼리문)

  mysql_query("set names utf8"); //db인코딩
  $result = mysql_query($update_query, $connect); //쿼리수행 문 변수 $result값으로 입력
  mysql_close(); //mysql종료


  echo '<script> alert("변경이 완료되었습니다."); location.href="../main.php"; </script>'
?>
