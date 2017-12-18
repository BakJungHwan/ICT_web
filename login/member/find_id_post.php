<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      header("content-type:text/html; charset=UTF-8"); ob_start(); session_start();
      include("../lib/db_connect.php");
      $connect = dbconn();
      $member = member($connect); //유저 정보 가져오기 위해 member함수호출

      $name= $_POST['name'];
      $tel= $_POST['tel'];

      $query=" select * from user where name ='$name' and tel = '$tel'"; // 입력한 id와 db에 저장된 id와 비교
      mysql_query("set names utf8"); //db 인코딩 작업
      $result= mysql_query($query, $connect); //db연동 후 쿼리문 전송
      $member= mysql_fetch_array($result); //받아온 데이터를 $member라는 변수의 배열로 저장

          //Error함수 호출해서 에러메시지 출력
      if(!$name){
          Error("이름을 입력하세요.");
      }elseif(!$tel){
          Error("휴대폰 번호를 입력해주세요");
      }
      if(!$member['name'] && !$member['tel']){
          Error("입력하신 데이터와 일치하는 정보가 없습니다.");
      }

      if($member['name'] == $name){
                echo "
                <script>
                    alert(\"회원님의 아이디는 ".$member['id']."입니다.\");
                    location.href='./login.php';
                </script>";
                exit;
      }


    ?>

  </body>
</html>
