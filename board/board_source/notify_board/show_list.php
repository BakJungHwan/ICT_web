<!--
파일명 : show_list.php
작성자 : 박정환
작성일 : 01-01-2017
설  명 : 게시판의 목록을 보여주는 코드. 한 페이지에 표시할 목록의 양을 정하고,
그에 맞춰서 페이지를 분할하며, 각 글과 페이지마다 링크를 연결함.


-->
<?php
    require ("../connect_db.php");  # home DB로 접속하는 파일 include
    require ("../board_library.php");
    $count_sql = "SELECT count(*) as line_count FROM notify_board";
    # DB로부터 전체 글 수를 count해서 line_count라는 이름으로 정리, 출력하는 SQl문.
    $count_all = mysqli_query($conn,$count_sql); # 위 SQL문을 실행
    $row = mysqli_fetch_assoc($count_all); # SQL문의 결과를 $row라는 변수로 갖고 옴.
    $all = $row['line_count']; # $all에 전체 글 수를 저장함.
    #$one_page = 10; #페이지당 표현할 글의 개수를 저장할 변수선언

    #페이지별 첫 글을 결정하는 수식
    if($all == 0){
        $pages = 1;
    }else{
        $pages = (int)(($all-1) / $one_page) + 1;
    }

     # GET변수로 부터 페이지를 받아 표현하는 수식. 페이지 값에 따라서 첫줄에 보이는 글이 달라진다.
    if(!isset($_GET['page'])){
        header("Location:./show_list.php?page=1");
    }else{
        $start_line = ($_GET['page']-1)*$one_page;
    }

    $sql = "SELECT id, writer, title, date, count FROM notify_board ORDER BY id DESC LIMIT ".$start_line.",".$one_page;
    # 화면에 표현할 값들과, 링크에 사용할 id값을 갖고온다. id를 기준으로 내림차순 정렬하며.
    # 정렬된 순서로 $start_line에 있는 값부터 $one_page개의 글 목록을 보여준다.
    $result = mysqli_query($conn,$sql);
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" content='type/html'>
    <title>회원 게시판</title>
  </head>


  <body>
    <p><a href="../../main.php">홈으로</a></p>

    <table border='0' width= '50%' height='50%' bgcolor='ccddd'align='center'>
        <tr>
          <td width='100%' height='10' bgcolor='aaccc' align='center'colspan='5'> 회원 게시판 </td>
        </tr>

        <tr>
          <td width='10%' height='30' align='center' >번호</td>
          <td width='20%' height='30' align='center' >제목</td>
          <td width='20%' height='30' align='center' >글쓴이</td>
          <td width='25%' height='30' align='center' >날짜</td>
          <td width='25%' height='30' align='center' >조회수</td>
        </tr>


        <?php
            $i=0;
            $page_startnum = $all-$start_line;
            while($row = mysqli_fetch_assoc($result)){
          # 위에서 부터 하나씩 글번호를 줄여나가면서 $one_page의 값만큼 목록에 나열한다.
          # 링크에는 DB에서의 글 'id'와 화면에 표현되는 '글번호'를 GET으로 전달한다.
            echo
            '<tr>
                <td height="20" align="center" bgcolor="fffff">'.($page_startnum-$i).'</td>
                <td height="20" align="center" bgcolor="fffff"> <a href="./open_article.php?article_id='.$row['id'].'&num='.($page_startnum-$i).'">'.$row['title'].'</a></td>
                <td height="20" align="center" bgcolor="fffff">'.$row['writer'].'</td>
                <td height="20" align="center" bgcolor="fffff">'.$row['date'].'</td>
                <td height="20" align="center" bgcolor="fffff">'.$row['count'].'</td>
            </tr>';
                $i++;
            }

         ?>

        <!--
        아래는 페이지에 대한 링크. 페이지가 1~5일 때에는 1부터 주어진 숫자만큼의 페이지 링크를 보여준다.
        전체 페이지를 5개 단위로 끊어서 보여준다.
        만약에 현재의 페이지가 마지막 5개의 페이지에 해당할 경우, 마지막 5개 페이지의 첫번째 페이지의 값을 얻은 다음 출력한다.
        나머지 경우에도 5개씩 끊어서 해당하는 페이지의 첫 페이지숫자부터 표현한다.
        말로 표현하니 더 헷갈리므로 그러려니 받아들이는게 좋다.
        -->

      <tr>
        <?php
        if(1 <= $pages && $pages <=5){
            $i = 0;
            echo '<td align="center" colspan="5">';
            for($i=0; $i<$pages; $i++){
              echo '<a href="./show_list.php?page='.($i+1).'"> | '.($i+1).' | </a>';
            }'</td>';
        }
        else if((int)(($pages-1)/5) == (int)(($_GET['page']-1)/5)){
            $i = 0;
            $c = (int)($pages % 5) + 1;
            '<td align="center" colspan="5">';
            for($i=0; $i<$c; $i++){
              echo '<a href="./show_list.php?page='.((int)($pages/5)*5+1+$i).'"> | '.((int)($pages/5)*5+1+$i).' | </a></td>';
          }'</td>';
        }
        else{
            $i = 0;
            '<td align="center" colspan="5">';
            for($i=0; $i<5; $i++){
              echo '<a href="show_list.php?page='.((int)($_GET['page']/5)*5+1+$i).'"> | '.((int)($_GET['page']/5)*5+1+$i).' | </a></td>';
            }'</td>';
        }
        ?>
      </tr>

      <tr>
          <td bgcolor ="afffa"align="right" colspan="5"><p><a href="./write_form.php"> [글쓰기] </a></p></td>
      </tr>
    </table>

  </body>
</html>
