<?php
   session_start();
   include './main_lib/db_connect.php'; //DB와 연동시키는 db_connect.php 파일을 사용할 것입니다.
?>

<html>
  <head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  <title>메인페이지입니다.</title>
  </head>
  <body>
    <?php


    if(isset($_SESSION['login'])){
      $connect = dbconn(); //함수불러옴
      $member = member($connect);
        echo $member['name']."(".$_SESSION['id'].");님 환영합니다.<br/>
        <a href='./member/logout.php'><strong>[로그아웃]</strong></a>
        <a href='./member/modify_pwd.php'><strong>[비번변경]</strong></a>
        <a href='./member/mypage.php'><strong>[회원정보수정]</strong></a>
        <a href='./board/board_source/id_board/show_list.php'><strong>[회원게시판]</strong></a>
        <a href='./board/board_source/free_board/show_list.php'><strong>[자유게시판]</strong></a>";
    }else{
        echo "<a href='./member/register.php'><strong>[회원가입]</strong></a>
        <a href='./member/login.php'><strong>[로그인]</strong></a>
        <a href='./board/board_source/free_board/show_list.php'><strong>[자유게시판]</strong></a>
        <a href='./member/find_id.php'><strong><strong>[ID찾기]</strong></a>
        <a href='./member/find_pwd.php'><strong>[비번찾기]</strong></a>
        ";
    }
?>
  </body>
</html>
