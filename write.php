﻿<?php
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
	/*require_once("dbconfig.php");

	//$_GET['bno']이 있을 때만
	if(isset($_GET['bno'])) {
		$bNo = $_GET['bno'];
	}
		 
	if(isset($bNo)) {
		$sql = 'select b_title, b_content, b_id from board_free where b_no = ' . $bNo;
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
	}*/
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





	<meta charset="utf-8" />
	<title>토론게시판</title>
	<link rel="stylesheet" href="./css/normalize.css" />
	<link rel="stylesheet" href="./css/board.css" />
</head>
<body>
	<div align="center">
	<article class="boardArticle">
		<h3>토론게시판 글쓰기</h3>
		<div id="boardWrite">
			<form action="./write_update.php" method="post">
				<?php
				if(isset($bNo)) {
					echo '<input type="hidden" name="bno" value="'.$bNo.'">';
				}
				?>
				<table id="boardWrite">
					<caption class="readHide">토론게시판 글쓰기</caption>
					<tbody>
						<tr>
							
	
						</tr>
					
						<tr>
							<th scope="row"><label for="bTitle">제목</label></th>
							<td class="title"><input type="text" name="bTitle" id="bTitle" value="<?php echo isset($row['b_title'])?$row['b_title']:null?>"></td>
						</tr>
						<tr>
							<th scope="row"><label for="bContent">내용</label></th>
							<td class="content"><textarea name="bContent" id="bContent"><?php echo isset($row['b_content'])?$row['b_content']:null?></textarea></td>
						</tr>
					</tbody>
				</table>
				<div class="btnSet">
					<button type="submit" class="btnSubmit btn">
						<?php echo isset($bNo)?'수정':'작성'?>
					</button>
					<a href="./board_index.php" class="btnList btn">목록</a>
				</div>
			</form>
		</div>
	</article>
	</div>
</body>
</html>