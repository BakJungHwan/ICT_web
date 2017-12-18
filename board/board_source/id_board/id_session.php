<?php
  require_once ("../../board_lib/dbconn.php");
  require_once ("../../board_lib/lib.php");
  session_start();

  if(!isset($_SESSION['id'])){
  error("로그인 후 사용하실 수 있습니다.","../../../main.php");
}

?>
