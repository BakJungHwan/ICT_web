<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      header("content-type:text/html; charset=UTF-8");
      include("../lib/db_connect.php");
      $connect = dbconn();
      $member = member($connect); //유저 정보 가져오기 위해 member함수호출

      $id= $_POST['id'];
      $name= $_POST['name'];
      $tel= $_POST['tel'];

      $query=" select * from user where id ='$id' and name = '$name' and tel = '$tel'"; // 입력한 id와 db에 저장된 id와 비교
      mysql_query("set names utf8"); //db 인코딩 작업
      $result= mysql_query($query, $connect); //db연동 후 쿼리문 전송
      $member= mysql_fetch_array($result); //받아온 데이터를 $member라는 변수의 배열로 저장

      //Error함수 호출해서 에러메시지 출력
      if(!$id){
          Error("아이디을 입력하세요.");
      }elseif(!$name){
          Error("이름을 입력해주세요");
      }elseif(!$tel){
          Error("전화번호를 입력해주세요");
      }
      if(!$member['id'] && !$member['name'] && !$member['tel']){
          Error("입력하신 데이터와 일치하는 정보가 없습니다.");
      }


      $newpw = rand();
      $hash_pw = md5($newpw);

      $update_query="update user set password ='$hash_pw' where id = '$id'";
      mysql_query("set names utf8"); //db인코딩
      $result = mysql_query($update_query,$connect); //쿼리수행 문 변수 $result값으로 입력
      mysql_close(); //mysql종료

      if($member['name'] == $name){
                echo "
                <script>
                    alert(\"회원님의 임시 비밀번호는 ".$newpw."입니다. 비밀번호변경해주세요.\");
                    location.href='./login.php';
                </script>";
                exit;
      }


    ?>

  </body>
</html>
