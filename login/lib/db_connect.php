<?php
function dbconn(){

   $connect = mysql_connect("localhost","root","111111");
   mysql_query("set names utf8",$connect);
   mysql_select_db("project",$connect);
   if(!$connect)die("연결에 실패하였습니당!".mysql_error());
   return $connect;
}

function Error($msg){
    echo "
    <script>
      window.alert('$msg');
      history.back();
    </script>
    ";exit;
}

function member($connect){

if(isset($_SESSION['id']))
{
    $id = $_SESSION['id'];
    $query = "select * from user where id ='$id'";
    $result = mysql_query($query,$connect);
    $member = mysql_fetch_array($result);
    return $member;
}
return NULL;
}


?>
