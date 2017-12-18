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

      $id=$_POST['id']; //retister.php에서 받아온 id값을 변수 $id에 입력
      $pws=$_POST['pwd'];
      $name=$_POST['name'];
      $tel=$_POST['tel'];

      $pw = md5($pws);  //md5해시함수를 통해 비밀번호 암호화한 후 $pw변수에 저장

      $user_id_query="select id from user where id ='".$id."'"; //id값이 같은 db변수를 찾아 id값을 출력한다

      mysql_query("set names utf8"); //db인코딩
      $result = mysql_query($user_id_query,$connect); //쿼리수행 문 변수 $result값으로 입력
      if($result){
      $member = mysql_fetch_assoc($result); //받아온 데이터를 $member라는 변수의 배열로 저장
      if($member['id'] === $id) {
        Error("이미 있는 아이디 입니다.");
      }

      }

    //에러함수를 통해 에러메시지 출력
      if(!$id){
        Error("아이디를 입력해주세요.");
      } elseif(substr($id,"12")){
        Error("회원아이디는 12자 까지만 허용됩니다.");
      } elseif(preg_match("/[^a-z 0-9]/",$id)){
        Error("아이디는 영문소문자와 숫자만 가능합니다.");
      } elseif(!$pws) {
        Error("패스워드를 입력해주세요");
      } elseif(!$name) {
        Error("혹시 이름이 없으세요?");
      } elseif(strlen($name)<6 or strlen($name)>15){
        Error("이름은 2자에서 5섯자 까지 허용합니다."); //한글은 1자당 3byte
      } elseif(!$tel) {
        Error("전화번호 입력해주세요.");
      } elseif(strlen($tel)<8 or strlen($tel)>15){
        Error("연락처는 최소8자리 부터 15자리 까지 입니다.");
      }

      
      $query="insert into user(id, password, name, tel) values('$id','$pw','$name','$tel')"; // 받아온 데이터를 db에 삽입
      mysql_query("set names utf8",$connect); //db인코딩
      mysql_query($query,$connect); //쿼리문 실행
      mysql_close();//mysql종료

    ?>

    <script>
      alert('회원가입을 진심으로 축하드립니다!');
      location.href='../main.php';
    </script>

  </body>
</html>
