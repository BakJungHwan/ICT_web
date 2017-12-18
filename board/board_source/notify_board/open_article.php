<?php
require ("id_session.php");
require ("../connect_db.php");
$count_sql = "SELECT count(*) as line_count FROM notify_board";
$count_all = mysqli_query($conn,$count_sql);
$row = mysqli_fetch_assoc($count_all);
$all = $row['line_count'];
# 여기까지 show_list.php와 동일

$sql = 'UPDATE notify_board SET count=count+1 WHERE id='.$_GET['article_id'];
mysqli_query($conn,$sql); # 조회수 +1
$sql = 'SELECT * FROM notify_board where id='.$_GET['article_id'];
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
# 글에 해당하는 데이터를 DB로 부터 가져옴.
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>notify_board</title>
  </head>
  <body>
    <?php
#해당하는 데이터 출력
echo '<p>번호 : '.$_GET['num'].'</p>';
echo '<p>제목 : '.$row['title'].'</p>';
echo '<p>글쓴이 : '.$row['writer'].'</p>';
echo '<p>내용 : '.$row['article'].'</p>';
#목록 링크, 수정버튼, 삭제버튼
#수정, 삭제로 글번호 넘기는 방식 설정.
#링크를 통해서 해당글의 DB id와 '글번호'를 넘긴다.
 ?>
 <footer>
<a href="http://localhost/board/notify_board/show_list.php?page=<?=(int)(($all-$_GET['num'])/$one_page)+1?>">목록으로</a>

<a href="http://localhost/board/notify_board/check_data.php?num=<?=$_GET['num']?>&select=1&article_id=<?=$_GET['article_id']?>">수정</a>

<a href="http://localhost/board/notify_board/check_data.php?num=<?=$_GET['num']?>&select=2&article_id=<?=$_GET['article_id']?>">삭제</a>
</footer>
  </body>
</html>
