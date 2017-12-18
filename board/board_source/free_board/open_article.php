<?php
      require ("../../board_lib/dbconn.php");
      require ("../../board_lib/lib.php");

      $count_sql = "SELECT count(*) as line_count FROM free_board";
      $count_all = mysqli_query($conn,$count_sql);
      $row = mysqli_fetch_assoc($count_all);
      $all = $row['line_count'];

      $sql = 'UPDATE free_board SET count=count+1 WHERE id = '.$_GET['article_id'];
      $count = mysqli_query($conn,$sql); # 조회수 +1

      $sql = 'SELECT * FROM free_board where id='.$_GET['article_id'];
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      # 글에 해당하는 데이터를 DB로 부터 가져옴.
  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <title>id_board</title>
  </head>

  <body>
    <!-- <a href="./show_list.php?page=<?=(int)(($all-$_GET['num'])/$one_page)+1?>">목록으로</a> -->
    <a href="./show_list.php?page=<?=(int)(($all-$_GET['num'])/$one_page)+1?>">목록으로</a>

    <table border='0' width= '50%' height='50%' bgcolor='ccddd' align='center'>
          <tr>
            <td width='100%' height='30' align='center' bgcolor='aaccc' colspan='3'> 게시판 글 보기 </td>
          </tr>

          <tr>
            <td width='50%' height='15' colspan='1'> 번호 : <?= $_GET['num']?></td>
            <td width='50%' height='15' colspan='1' align ='right'> 작성일: <?= $row['date']?></td>
          </tr>

          <tr>
            <td width='50%' height='15' colspan='2' align ='left'> 제목 : <?= $row['title']?></td>
          </tr>

          <tr>
            <td width='50%' height='25' align='left' valign='middle' colspan='2'>글쓴이 :<?=$row['writer']?></td>
          </tr>

          <tr>
            <td width='20%' height='300' align='left' valign='top' bgcolor='fffff' colspan='2'>글 내 용: <?=$row['article']?></td>
          </tr>

          <tr>
            <td width='10%' height='10' align='right' valign='top' bgcolor='ccddd' colspan='2'>
              <a href="./chk_pwd.php?num=<?=$_GET['num']?>&select=1&article_id=<?=$_GET['article_id']?>">수정</a>
              <a href="./chk_pwd.php?num=<?=$_GET['num']?>&select=2&article_id=<?=$_GET['article_id']?>">삭제</a>
            </td>
          </tr>

    </table>

  </body>
  </html>
