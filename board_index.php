<?php
require_once ("sessiontest.php");
?>
<?php
	require_once("dbconfig.php");
	

	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	
	
	
	if(isset($_GET['searchColumn'])) {
		$searchColumn = $_GET['searchColumn'];
		$subString .= '&amp;searchColumn=' . $searchColumn;
	}
	if(isset($_GET['searchText'])) {
		$searchText = $_GET['searchText'];
		$subString .= '&amp;searchText=' . $searchText;
	}
	
	if(isset($searchColumn) && isset($searchText)) {
		$searchSql = ' where ' . $searchColumn . ' like "%' . $searchText . '%"';
	} else {
		$searchSql = '';
	}
	
	$sql = 'select count(*) as cnt from board_free' . $searchSql;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	
	$allPost = $row['cnt']; 
	if(empty($allPost)) {
		$emptyData = '<tr><td class="textCenter" colspan="5">글이 존재하지 않습니다.</td></tr>';
	} else {

		$onePage = 15; 
		$allPage = ceil($allPost / $onePage); 
		
		if($page < 1 && $page > $allPage) {
?>
			<script>
				alert("존재하지 않는 페이지입니다.");
				history.back();
			</script>
<?php
			exit;
		}
	
		$oneSection = 10; 	$currentSection = ceil($page / $oneSection); 
		$allSection = ceil($allPage / $oneSection); 		
		$firstPage = ($currentSection * $oneSection) - ($oneSection - 1);
		
		if($currentSection == $allSection) {
			$lastPage = $allPage; } 
			else {
			$lastPage = $currentSection * $oneSection; 
			}
		
		$prevPage = (($currentSection - 1) * $oneSection);
		$nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); 
		$paging = '<ul>'; 
		
		if($page != 1) { 
			$paging .= '<li class="page page_start"><a href="./board_index.php?page=1' . $subString . '">처음</a></li>';
		}
		if($currentSection != 1) { 
			$paging .= '<li class="page page_prev"><a href="./board_index.php?page=' . $prevPage . $subString . '">이전</a></li>';
		}
		
		for($i = $firstPage; $i <= $lastPage; $i++) {
			if($i == $page) {
				$paging .= '<li class="page current">' . $i . '</li>';
			} else {
				$paging .= '<li class="page"><a href="./board_index.php?page=' . $i . $subString . '">' . $i . '</a></li>';
			}
		}
		
		if($currentSection != $allSection) { 
			$paging .= '<li class="page page_next"><a href="./board_index.php?page=' . $nextPage . $subString . '">다음</a></li>';
		}
		
		if($page != $allPage) { 
			$paging .= '<li class="page page_end"><a href="./board_index.php?page=' . $allPage . $subString . '">끝</a></li>';
		}
		$paging .= '</ul>';
		
		
		
		$currentLimit = ($onePage * $page) - $onePage; 
		$sqlLimit = ' limit ' . $currentLimit . ', ' . $onePage; 
		$sql = 'select * from board_free' . $searchSql . ' order by b_no desc' . $sqlLimit; 
		$result = $db->query($sql);
	}
?>

<!DOCTYPE html>
<html>
<head>



 <meta http-equiv="Content-Type" content="text/html; charset=EUC-KR">
	<meta name="viewport" content="width = device-width, initial-scale = 1"/>
    <link rel="stylesheet"  href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css"/>
    <script src = "http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>







	<meta charset="utf-8" >
	<title>Discubate</title>
	<link rel="stylesheet" href="./css/normalize.css" />
	<link rel="stylesheet" href="./css/board.css" />
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  
  
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    
	
	<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Discubate</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
	  <ul class="nav navbar-nav">
        
			<li>
          <a href="write.php">New Topic :: 새로운 토론 시작하기</a>
         
        </li>
        
        
        
		
		<li>
          <a href="/board_index.php">Dibate History :: 토론 내역 보기</a>
        </li>
      
	  </ul>
	  
	  <ul class="nav navbar-nav navbar-center">
        <li><a href="#"> 

		

		</a>
		
		</li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">바로가기 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="http://www.daum.net/">Daum</a></li>
            <li><a href="http://www.naver.com">Naver</a></li>
            <li><a href="http://www.google.com">Google</a></li>
            <li class="divider"></li>
            <li><a href="/">Discubate</a></li>
          </ul>
        </li>
      </ul>
      <!--   상단 네비게이션바 높이조절 실패
	  <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>   -->
	  
	  
	  <ul class="nav navbar-nav navbar-right">
      
		
		<a href="login_form.php" class="navbar-link">
		<button type="button" class="btn btn-default navbar-btn">Login / Register
		</button>
		</a>
		
		<a href="logout_form.php" class="navbar-link">
		<button type="button" class="btn btn-default navbar-btn">Logout
		</button>
		</a>
      </ul>
	  
	  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>





	<article class="boardArticle">
	</br></br></br>
		<h3>토론</h3>
		<div id="boardList">
			<table>
				<thead>
					<tr>
						<th scope="col" class="no">번호</th>
						<th scope="col" class="title">제목</th>
						<th scope="col" class="author">작성자</th>
						<th scope="col" class="date">작성일</th>
						<th scope="col" class="hit">조회</th>
					</tr>
				</thead>
				<tbody>
						<?php
						if(isset($emptyData)) {
							echo $emptyData;
						} else {
							while($row = $result->fetch_assoc())
							{
								$datetime = explode(' ', $row['b_date']);
								$date = $datetime[0];
								$time = $datetime[1];
								if($date == Date('Y-m-d'))
									$row['b_date'] = $time;
								else
									$row['b_date'] = $date;
						?>
						<tr>
							<td class="no"><?php echo $row['b_no']?></td>
							<td class="title">
								<a href="./view.php?bno=<?php echo $row['b_no']?>"><?php echo $row['b_title']?></a>
							</td>
							<td class="author"><?php echo $row['b_id']?></td>
							<td class="date"><?php echo $row['b_date']?></td>
							<td class="hit"><?php echo $row['b_hit']?></td>
						</tr>
						<?php
							}
						}
						?>
				</tbody>
			</table>
			<div class="btnSet">
				<a href="./write.php" class="btnWrite btn">글쓰기</a>
			</div>
			<div class="paging">
				<?php echo $paging ?>
			</div>
			<!--<div class="searchBox">
				<form action="./index.php" method="get">
					<select name="searchColumn">
						<option <?php echo $searchColumn=='b_title'?'selected="selected"':null?> value="b_title">제목</option>
						<option <?php echo $searchColumn=='b_content'?'selected="selected"':null?> value="b_content">내용</option>
						<option <?php echo $searchColumn=='b_id'?'selected="selected"':null?> value="b_id">작성자</option>
					</select>
					<input type="text" name="searchText" value="<?php echo isset($searchText)?$searchText:null?>">
					<button type="submit">검색</button>
				</form>
			</div>-->
		</div>
	</article>
</body>
</html>