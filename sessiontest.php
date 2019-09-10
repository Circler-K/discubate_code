<?php
@SESSION_start();

$sessionid=$_SESSION['userid'];
		
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