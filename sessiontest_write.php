<?
<?php
SESSION_start();
?>

<?php
$sessionid=$_SESSION['usernick'];
?>
<?php
echo $_SESSION['usernick'];
		
		if(!$sessionid)
		{
			echo $_SESSION['usernick'];
		}
		else
		{
	
			echo("
	   <script>
	   window.alert('권한이 없습니다.')
	   location.href = '../login_form.php';
	   </script>
	   ");
		
		}
	
?>
?>