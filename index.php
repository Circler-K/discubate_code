<?php
@SESSION_start();
require("./main.php");
head();
?>
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
</div>

<div align="center"> <h1>회원 상태</h1>
<?php
echo ("페이지를 이용하시려면 로그인해주세요.");
?>
</br>
현재 로그인 정보 : <?php
echo $_SESSION['usernick'];

foot();
?>
<div/>


</br></br></br>이 사이트는 토론사이트입니다.</br></br>
</br>Made by Circler</br>C!rcl3r