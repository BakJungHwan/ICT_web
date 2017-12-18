<?php
        header("content-type:text/html; charset-UTF-8"); ob_start();  session_start();
        include '../lib/db_connect.php';
        $connect = dbconn();
        $id=$_POST['id']; //mypage.php에서 받아온 id값을 변수 $id에 입력
        $name=$_POST['name']; //mypage.php에서 받아온 name값을 변수 $name에 입력
        $tel=$_POST['tel']; //mypage.php에서 받아온 tel값을 변수 $tel에 입력

        $update_query="update user set name ='$name',tel='$tel' where id ='$id'"; //id값이 같은 곳에 name과 tel변수를 업데이트 시키겠다(쿼리문)

        mysql_query("set names utf8"); //db인코딩
        $result = mysql_query($update_query, $connect); //쿼리수행 문 변수 $result값으로 입력
        mysql_close(); //mysql종료
  ?>

      <script>
        window.alert('수정이 완료되었습니다.');
        location.href='../main.php';
      </script>
