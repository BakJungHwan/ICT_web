<?php
require_once ("../board_library.php");

session_start();
if(!isset($_SESSION['id'])){
error("로그인 후 사용하실 수 있습니다.","http://localhost/board/free_board/show_list.php");
}

?>
