<?php
           @session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
</html>
<?php
   // 이전화면에서 이름이 입력되지 않았으면 "이름을 입력하세요"
   // 메시지 출력
   
   	$id=$_POST['id'];
	$pw1=$_POST['pw1'];
	
	
   
   if(!$id) {
     echo("
           <script>
             window.alert('아이디를 입력하세요.')
             history.go(-1)
           </script>
         ");
         exit;
   }

   if(!$pw1) {
     echo("
           <script>
             window.alert('비밀번호를 입력하세요.')
             history.go(-1)
           </script>
         ");
         exit;
   }

   include "dbconn.php";

   $sql = "select * from member_db where id='$id' AND pw1='$pw1'";
   $result = mysql_query($sql, $connect);
   $num_match = mysql_num_rows($result);
   $row = mysql_fetch_array($result);
   
 
   
   if(!$num_match) 
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디이거나 비밀번호가 일치하지 않습니다..')
             history.go(-1)
           </script>
         ");
    }
    
	else
    {
           $userid = $row[id];
		   $username = $row[name];
		   $usernick = $row[nick];
		 

           $_SESSION['userid'] = $userid;
           $_SESSION['username'] = $username;
           $_SESSION['usernick'] = $usernick;
          

           echo("
              <script>
                location.href = '/';
              </script>
	");
	}
	
	/* else
    {
        $row = mysql_fetch_array($result);

        $db_pass = $row[pw1];

        if($pw1 != $db_pass)
        {
           echo("
              <script>
                window.alert('비밀번호가 틀립니다.')
                history.go(-1)
              </script>
           ");

           exit;
        }
        else
        {
           $userid = $row[id];
		   $username = $row[name];
		   $usernick = $row[nick];
		 

           $_SESSION['userid'] = $userid;
           $_SESSION['username'] = $username;
           $_SESSION['usernick'] = $usernick;
          

           echo("
              <script>
                location.href = '../index.php';
              </script>
           ");
        }
   }*/          
?>
