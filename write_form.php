<HTML>
 <HEAD><TITLE>회원가입</TITLE>
 <meta charset="utf-8">
 
 
 
	<link rel="stylesheet"  href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css"/>
    <script src = "http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


 <script>
   function memReg()
    {
       <!--여기가 로그인으로 가는곳 -->
	   location.replace("login_form.php");
    }
	
	
	function sendIt(){
//아이디 입력여부 검사
if(document.register.id.value=="")
{
 alert("아이디를 입력하지 않았습니다.")
 document.register.id.focus()
 return false 
}
//아이디 유효성 검사 (영문소문자, 숫자만 허용)
for (i=0;i<document.register.id.value.length ;i++ )
{
 ch=document.register.id.value.charAt(i)
  if (!(ch>='0' && ch<='9') && !(ch>='a' && ch<='z'))
  {
  alert ("아이디는 소문자, 숫자만 입력가능합니다.")
  document.register.id.focus()
  document.register.id.select()
  return false
  }
}
//아이디에 공백 사용하지 않기
if (document.register.id.value.indexOf(" ")>=0)
{
 alert("아이디에 공백을 사용할 수 없습니다.")
 document.register.id.focus()
 document.register.id.select()
 return false
}
//아이디 길이 체크 (6~12자)
if (document.register.id.value.length<6 || document.register.id.value.length>12)
{
 alert ("아이디를 6~12자까지 입력해주세요.")
 document.register.id.focus()
 document.register.id.select()
 return false
}


for (i=0;i<document.register.name.value.length ;i++ )
{
 chb=document.register.name.value.charAt(i)
  if (!(chb>='A' && chb<='Z') && !(chb>='a' && chb<='z'))
  {
  alert ("이름은 영어로만 입력해주세요.")
  document.register.name.focus()
  document.register.name.select()
  return false
  }
}



//비밀번호 입력여부 체크
if(document.register.pw1.value=="")
{
 alert("비밀번호를 입력하지 않았습니다.")
 document.register.pw1.focus()
 return false
}
//비밀번호 길이 체크(4~20자 까지 허용)
if (document.register.pw1.value.length<4 || document.register.pw1.value.length>20)
{
 alert ("비밀번호를 4~8자까지 입력해주세요.")
 document.register.pw1.focus()
 document.register.pw1.select()
 return false
}

//비밀번호와 비밀번호 확인 일치여부 체크
if (document.register.pw1.value!=document.register.pw2.value)
{
 alert("비밀번호가 일치하지 않습니다")
 document.register.pw1.value=""
 document.register.pw2.value=""
 document.register.pw1.focus()
 return false
}
//주민번호 오류 검사
/*
str1=document.register.sn1.value
str2=document.register.sn2.value
str=str1+str2
hap=0
hap=hap+parseInt(str.charAt(0))*2
hap=hap+parseInt(str.charAt(1))*3
hap=hap+parseInt(str.charAt(2))*4
hap=hap+parseInt(str.charAt(3))*5
hap=hap+parseInt(str.charAt(4))*6
hap=hap+parseInt(str.charAt(5))*7
hap=hap+parseInt(str.charAt(6))*8
hap=hap+parseInt(str.charAt(7))*9
hap=hap+parseInt(str.charAt(8))*2
hap=hap+parseInt(str.charAt(9))*3
hap=hap+parseInt(str.charAt(10))*4
hap=hap+parseInt(str.charAt(11))*5
z=(hap%11)
z=11-z
if (z==10) {z=0}
if (z==11) {z=1}
if (z!=parseInt(str.charAt(12))) 
{
 alert ("틀린 주민등록번호입니다.")
 return false
}

ju1=document.register.sn1.value
ju2=document.register.sn2.value
jumin=ju1+ju2
key="234567892345"
sum=0
for (i=0;i<key.length ;i++ )
{
 sum+=parseInt(jumin.charAt(i))*parseInt(key.charAt(i))
}
na=(11-(sum%11))%10
if (jumin.charAt(12)!=na)
{
 alert("틀린 주민등록번호입니다.")
 document.register.sn1.value=""
 document.register.sn2.value=""
 document.register.sn1.focus()
 return false
}
*/ 

//성별 체크 유무 확인
if (document.register.se[0].checked==false && document.register.se[1].checked==false)
{
 alert("성별을 체크해 주세요")
 return false
}




if(document.register.nick.value=="")
{
 alert("닉네임를 입력하지 않았습니다.")
 document.register.nick.focus()
 return false
}
//아이디 유효성 검사 (영문소문자, 숫자만 허용)
for (i=0;i<document.register.nick.value.length ;i++ )
{
 cha=document.register.nick.value.charAt(i)
  if ( !(cha>='a' && cha<='z') && !(cha>='A' && cha<='Z'))
  {
  alert ("닉네임는 대문자,소문자만 입력가능합니다.")
  document.register.nick.focus()
  document.register.nick.select()
  return false
  }
}
//아이디에 공백 사용하지 않기
if (document.register.nick.value.indexOf(" ")>=0)
{
 alert("닉네임에 공백을 사용할 수 없습니다.")
 document.register.nick.focus()
 document.register.nick.select()
 return false
}
//아이디 길이 체크 (6~12자)
if (document.register.nick.value.length<2 || document.register.nick.value.length>12)
{
 alert ("닉네임을 6~12자까지 입력해주세요.")
 document.register.nick.focus()
 document.register.nick.select()
 return false
}


 
document.register.submit()
}

   </script>
   
 
 
 
 </HEAD>
 <BODY>
  <center>
  
  <form method="post" action="insert.php" name="register">
  
   <table border="1" cellspacing="0" width="900">
         <tr 	height="50">
             <td colspan="5" align="center" bgcolor="#7fffd4">회원가입</td>
         </tr>
    
	
	
	<tr>
     <td width=150 > 아이디</td>
  <td width=500 ><input type="text" name="id" class="box">&nbsp;&nbsp;아이디는 소문자, 숫자 혼용하여 6~12자 까지 가능</td>
 </tr>
 <tr>
     <td width=150 > 성명</td>
  <td width=500 ><input type="text" name="name" class="box"></td>
 </tr>
 <tr>
     <td width=150 > 닉네임</td>
  <td width=500 ><input type="text" name="nick" class="box">한글 닉네임은 불가,,,</td>
 </tr>
 <tr>
     <td width=150 > 비밀번호</td>
  <td width=500 ><input type="password" name="pw1" class="box"></td>
 </tr>
 <tr>
     <td width=150 >*비밀번호 확인</td>
  <td width=500 ><input type="password" name="pw2" class="box"></td>
 </tr>
 
 <tr>
     
	 <td width=100 > 성별</td>
     <td width=100 ><input type="radio" name="se" value="man">  &nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  남성 
                              <input type="radio" name="se" value="woman">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  여성
	</td>
 </tr>
 
 
 <tr>
     <td width=150 > 연락처</td>
  <td width=400 >
  <select name="hp1" class="box">
   <option value="010">010
   <option value="011">011
   <option value="016">016
   <option value="017">017
   <option value="018">018
   <option value="019">019
  </select>  <input type="text" name="hp2" maxlength=4 class="box">  <input type="text" name="hp3" maxlength=4 class="box">
  </td>
 </tr>
 
 
 <tr>
     <td width=150 >자기소개</td>
  <td width=500 ><textarea name="profile" cols=40 rows=5 class="box" placeholder="자신을 소개해보세요" maxlength=100></textarea></td>
 </tr>
 
 
 <tr>
   <td colspan=2 align=center>
    <input type="reset" value="다시입력"> 
   
   <input type=button value="가입" onclick=sendIt()></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
   </td>
 </tr>
 
 
   </table>
<table width="900">
         <tr>
             <td align="center"><input type="button" value="로그인화면으로" onclick="memReg();"></td>
         </tr>
     </table>   
   </form>
   </center>
   
 </BODY>
</HTML>
 
 
 
 

 

