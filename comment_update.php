<?php
@SESSION_START();
?>
<?php
$testno=$bNo;
?>
<?php
	require_once('dbconfig.php');
	
//	$bno = $_POST['$b_no'];
	$coNo = 'null';
	
	//2Depth & 수정 & 삭제
	if(isset($_POST['w'])) {
		$w = $_POST['w'];
		$coNo = $_POST['co_no'];
	}
	
	
	//공통 변수
	$bNo = $_POST['bno'];
	$coContent = $_POST['coContent'];
	$coid = $_SESSION['userid'];
	$co_type=$_POST['co_type'];
	$w = '';
	if($w == '') { //$w 변수가 비어있거나 w인 경우
		$msg = '작성';
		$sql = 'insert into comment_free values(null, ' .$bNo . ', ' . $coNo . ', "' . $coContent . '", "' . $coid . '", "' . $co_type . '")';
		}
?>

<?php 
	
	
	$result = $db->query($sql);
	if($result) {
?>
		<script>
			alert('댓글 <?php echo $msg?>에 실패했습니다.');
			history.back();
		</script>
<?php
	} else {
?>
		
		<script>
			alert('댓글이 정상적으로 <?php echo $msg; ?>되었습니다.');
			location.replace("./view.php?bno=<?php echo $bNo;?>");
		</script>
		
		
		
<?php
	}
	
?>
