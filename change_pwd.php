
<?php session_start(); ?>

<?php

if(!isset($_SESSION['password'])){

  header('location: index.php');
}

include 'include/conn.php';



?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/d281bae09b.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
	<title></title>

<style type="text/css">
	
.put{
	padding:13px 20px;
	border:none;
	text-align: center;
	outline:none;
	background: transparent;
	border-bottom: 1px solid white;
	font-size: 35px;
	color:white;
	transition: all 0.2s ease-in-out;
}



::placeholder{
	color:white;
	text-align: center;
	font-size: 41px;

}

* {

	position: inline;
 	padding:0;
 	margin:0;
	font-family: 'Cairo', sans-serif;
}



.clean{
	margin-bottom:25px;
	outline: none;
	border:1px solid white;
	background: none;
	font-size: 20px;
	color:white;
	transition: all 0.2s ease-in-out;
	padding:12px 115px;

}

.clean:hover{
	background:white;
	border:1px solid white;
	color:#1f49b6;
	transition: all 0.2s ease-in-out;
}

.ouut{
  margin:15px;
  outline: none;
  background:black;
  font-size: 20px;
  color:white;
  padding:30px;
  width:100%; 
  border:3px solid black;
  transition: all 0.2s ease-in-out;
  padding:10px;
  bottom: -19px;
  right: -15px;

}

.ouut:hover{
  background:white;
  border:1px solid white;
  color:#1f49b6;
  transition: all 0.2s ease-in-out;
}

</style>

</head>
<body id='body' onload="document.getElementById('1pin').focus()" style='transition: all 0.4s ease;background:<?php if(isset($_SESSION['pwd_background'])){echo $_SESSION['pwd_background'];}else{echo"#003873";} ?>'>



<br>
<br>



<form onsubmit="return sbmt_form()" method="post" action="include/changepassword.php" autocomplete="false">
<center>

  <br><br><br><br>

<div style='padding:20px;padding-top: 15px'>

<p id='textintop' style="color:white;font-size: 20px">



<?php
if(isset($_SESSION['success_pwd_change'])){
  echo $_SESSION['success_pwd_change'];
}
else{
  echo"ادخل كلمة السر الجديدة";
}


?>


</p>

<br>

<div style="display: inline">
<input id='1pin' maxlength="1" style="width: 20px;margin:4px" id='note' class='put' type="number" placeholder="*"  name="pin1">
<input id='2pin' maxlength="1" style="width: 20px;margin:4px" id='note' class='put' type="number" placeholder="*"  name="pin2">
<input id='3pin' maxlength="1" style="width: 20px;margin:4px" id='note' class='put' type="number" placeholder="*"  name="pin3">
<input id='4pin' maxlength="1" style="width: 20px;margin:4px" id='note' class='put' type="number" placeholder="*"  name="pin4">
</div>
<br><br>

<button type="submit" name="change_pwd" id='clean' class='clean'>تغيير </button><br>




</div>
</center>
</form>


<script>

var pin1 = document.getElementById('1pin');
var pin2 = document.getElementById('2pin');
var pin3 = document.getElementById('3pin');
var pin4 = document.getElementById('4pin');

pin1.onkeyup = function(){

	if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
        pin2.focus();
    }



}

pin2.onkeyup = function(){

	if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
        pin3.focus();
    }


}

pin3.onkeyup = function(){

	if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
        pin4.focus();
    }



}

/*------------------------------------------------*/



function sbmt_form(){

	var textintop = document.getElementById('textintop');
	var body = document.getElementById('body');
	var clean = document.getElementById('clean');

	if(pin1.value === "" || pin2.value === "" || pin3.value === "" || pin4.value === ""){

		textintop.innerHTML="ادخل كلمة السر الجديدة";
	
		body.style.background="#f02849";
		
		body.style.transition="all 0.4s ease";

		window.setTimeout(function(){

			body.style.background="#003873";
			

		}, 1000);

		return false;


	}

}




</script>
<center><a href='dashboard.php' style="text-decoration: none;font-size: 20px;position: fixed;"  name="login" id='clean' class='ouut'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; رجوع  <i style="font-size: 19px" class='fas fa-sign-out-alt'></i></a></center>


</body>
</html>


<?php 

if(isset($_SESSION['success_pwd_change']) && isset($_SESSION['pwd_background'])){

sleep(1);

unset($_SESSION['success_pwd_change']);
unset($_SESSION['pwd_background']);

}

?>