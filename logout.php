<?
  session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<body>
<?php
  unset($_SESSION['userid']);
  unset($_SESSION['username']);
  unset($_SESSION['usernick']);
           
	
	echo("
	   <script>
	   window.alert('로그아웃되셨습니다.');
	   location.href = '/';
	   </script>
	   ");
	
?></body>
</html>
  
