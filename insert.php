 <meta charset="utf-8">
 
 <!-- $pw1=HASH($pw1, "sha-256"); 10번째 줄 --> 
 
<?php
    $hp1=$_POST['hp1'];
	$hp2=$_POST['hp2'];
	$hp3=$_POST['hp3'];
   $hp = $hp1."-".$hp2."-".$hp3;
   $profile= $_POST['profile'];
   $id=$_POST['id'];
	$pw1=$_POST['pw1'];
	$name=$_POST['name'];
	$nick=$_POST['nick'];
	
	/*if(!$id)
	{
		echo("
	   <script>
	   window.alert('빈칸입력!')
	   history.go(-1)
	   </script>
	   ");
	}*/
   
   require "dbconn.php";       // dconn.php 파일을 불러옴
   
   $sql="select * from member_db where id='$id'";
   $result=mysql_query($sql, $connect);   
   $exist_id = mysql_num_rows($result);
   
   if($exist_id)
   {
	   echo("
	   <script>
	   window.alert('해당 정보가 존재합니다.')
	   history.go(-1)
	   </script>
	   ");
	   mysql_close();  
	   exit;
   }
   else
   { 
   $sql = "select * from member_db where id='$id'";
   $result = mysql_query($sql, $connect);
      
	    $sql = "insert into member_db(id, pw1, name, nick, hp, profile)"; 
		$sql .="values('$id', '$pw1', '$name', '$nick', '$hp','$profile')";

		mysql_query($sql,$connect); 
		
		
	}	
mysql_close();  
		
  	
	echo("
	   <script>
	   window.alert('가입되셨습니다.');
	   location.href = '../login_form.php';
	   </script>
	   ");
                
  
?>