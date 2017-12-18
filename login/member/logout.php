<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      ini_set("display_errors", "1"); //세션 종료
      session_start();
      session_destroy();
    ?>
    <script>
      window.alert("로그아웃 되었습니다.");
      location.href='../main.php';
    </script>

  </body>
</html>
