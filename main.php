<?php
function head()
{
?>
<!doctype html>
<html lang="ko">



<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width = device-width, initial-scale = 1"/>
    <!--<link rel="stylesheet"  href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css"/>
     <script src = "http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>  -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<title>The Debate</title>

</head>
<script>/*
function logoutpopup(){
	var popUrl = "logout_form.php";	//팝업창에 출력될 페이지 URL
	var popOption = "width=400, height=400, resizable=no, scrollbars=no, status=no;";    //팝업창 옵션(optoin)
		window.open(popUrl,"",popOption);
	}*/ //불가
	
			function loginlink()
    {
       <!--여기가 로그인으로 가는곳 -->
	   location.replace("login_form.php");
    }
		function writelink()
    {
       <!--여기가 글쓰는 곳으로 가는곳 -->
	   location.replace("write.php");
    }

	
</script>

<body>
<div >
<!--style="position:absolute; top:65px; left:555px;"-->
</div>

<!--

<div style="position: relative; z-index: 1;">

<img
 src="logo\space.gif"
 style="margin-left: auto; margin-right: auto; display: block;"
 align="center"
 title="The Debate"
 width="100%"
 height="500px"
/>
</div>


<div style="position: relative; left -500px; top: -50px; z-index: 3;">
<a href="/"> 
<img
 src="logo\banner.gif"
 style="margin-left: auto; margin-right: auto; display: block;"
 align="center"
 title="The Debate"
 height="400px"
 width="500px"
/>
</a>
</div>  -->

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
          <a href="write.php">New Topic :: 새로운 토론 시작하기 pingendo</a>
         
        </li>
        
        
        
		
		<li>
          <a href="/board_index.php">Dibate History :: 토론 내역 보기</a>
        </li>
      
	  </ul>
	  
	  
	  <div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>
      <!--   상단 네비게이션바 높이조절 실패
	  <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>   -->
	  
	  
	  <ul class="nav navbar-nav navbar-right">
      
		
		<a href="login_form.php" class="navbar-link">
		<button type="button" class="btn btn-default navbar-btn" onclick="loginlink;">로그인/회원가입</button>
		</a>
			
		
		<a href="logout_form.php" class="navbar-link">
		<button type="button" class="btn btn-default navbar-btn">Logout
		</button>
		</a>
      </ul>
	  
	  
    </div>
  </div>
</nav>
<?php	
}
function foot()
{
	?>
	
</body>
</html>

	<?php
}
?>