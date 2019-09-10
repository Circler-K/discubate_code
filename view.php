<?php
@SESSION_start();
?>
<?php
$sessionid=$_SESSION['userid'];
?>
<?php
		
		if(!$sessionid)
		{
			echo("
	   <script>
	   window.alert('권한이 없습니다.')
	   location.href = '../login_form.php';
	   </script>
	   ");
			
		}
	

		
	
?>
<?php
	require_once("dbconfig.php");
	$bNo = $_GET['bno'];

	if(!empty($bNo) && empty($_COOKIE['board_free_' . $bNo])) {
		$sql = 'update board_free set b_hit = b_hit + 1 where b_no = ' . $bNo;
		$result = $db->query($sql); 
		if(empty($result)) {
			?>
			<script>
				alert('권한이 없습니다.');
				history.back();
			</script>
			<?php 
		} else {
			@setcookie('board_free' . $bNo, TRUE, time() + (60 * 60 * 24), '/');
		}
	}
	
	$sql = 'select b_title, b_content, b_date, b_hit, b_id from board_free where b_no = ' . $bNo;
	$result = $db->query($sql);
	
?>

<!-- board index에서 따옴 -->





<?php
?>

<html>
<head>
<? 
require("./main.php");
head();
?>
   
	<meta name="viewport" content="width = device-width, initial-scale = 1"/>
    <link rel="stylesheet"  href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css"/>
    <script src = "http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<title>Discubate</title>
	<link rel="stylesheet" href="./css/normalize.css" />
	<link rel="stylesheet" href="./css/board.css" />
</head>

<body>
<!--  <nav class="navbar navbar-default navbar-fixed-top">
  
  
  <div class="container-fluid">
-->
    <!-- Brand and toggle get grouped for better mobile display -->
    
	
	<!--   <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Discubate</a>
    </div>    -->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <!--
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
      </ul>    -->
      <!--   상단 네비게이션바 높이조절 실패
	  <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>   -->
	  <!--

	  <ul class="nav navbar-nav navbar-right">
      
		
		<a href="login_form.php" class="navbar-link">
		<button type="button" class="btn btn-default navbar-btn">Login / Register
		</button>
		</a>
		
		<a href="logout_form.php" class="navbar-link">
		<button type="button" class="btn btn-default navbar-btn">Logout
		</button>
		</a>
      </ul>   -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
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
						<?php
						$b_no = $row['b_no'];
						$b_title = $row['b_title'];
						$b_id = $row['b_id'];
						$b_date = $row['b_date'];
						$b_hit = $row['b_hit'];
						$b_content = $row['b_content'];
						?>
						
						</br>
					
							
						<?php
							}
						}
						?>
				</tbody>
				</br></br></br></br>
	<div align="center">
	<article>
		<h1><?php echo $b_title;?></h1>
		<div id="boardView">
			<h3 id="boardTitle"><?php echo $row['b_title']?></h3>
			<div id="boardInfo">
				<span id="boardID">작성자 : </span><?php echo $b_id;?>
	</br>			<span id="boardDate">시간 : <?php echo $b_date;?></span>
		</br>		<span id="boardHit">방문수: <?php echo $b_hit;?></span>
		</br><span id="boardID"> 번호: </span><?php echo $bNo;?>
			</div>
			<div id="boardContent"><h3><?php echo $b_content;?></h3></div>
			<div class="btnSet">
				<!--   <a href="./write.php?bno=<?php /*  echo $bNo */?>">수정</a>
				<a href="./delete.php?bno=<?php /* echo $bNo */ ?>">삭제</a>   -->
				<a href="./board_index.php">
		<button type="button" class="btn btn-default navbar-btn">목록
		</button>
		</a>
			</div>
		<div id="boardComment">
			
			
			<?php require_once('comment.php')?>
		</div>
		</div>
	</article>
	</div>
</body>
</html>