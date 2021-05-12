
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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



</style>

</head>
<body id='body' onload="document.getElementById('1pin').focus()" style='transition: all 0.4s ease;background:<?php if(isset($_SESSION['background'])){echo $_SESSION['background'];}else{echo"#003873";} ?>'>



<br>
<br>
<center><img style="opacity: 0.8" width="290px" src="vectors/stockpic.png"></center>


<form onsubmit="return sbmt_form()" method="post" action="include/login.php" autocomplete="false">
<center>

<div style='padding:20px;padding-top: 15px'>

<p id='textintop' style="color:white;font-size: 20px">

<?php
if(isset($_SESSION['error'])){
	echo $_SESSION['error'];
}
else{
	echo"ادخل الرمز السري من فضلك  ";
}


?>

</p>

<br>

<div style="display: inline">
<input id='1pin' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="1" style="width: 20px;margin:4px" id='note' class='put' type="number" placeholder="*"  name="pin1">
<input id='2pin' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="1" style="width: 20px;margin:4px" id='note' class='put' type="number" placeholder="*"  name="pin2">
<input id='3pin' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="1" style="width: 20px;margin:4px" id='note' class='put' type="number" placeholder="*"  name="pin3">
<input id='4pin' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="1" style="width: 20px;margin:4px" id='note' class='put' type="number" placeholder="*"  name="pin4">
</div>
<br><br>

<button type="submit" name="login" id='clean' class='clean'>دخول</button><br>
<a href="guide.php" style="text-decoration: none;padding:10px 95px;color:#003873;background:white;border:1px solid white" class='clean'>الاستعمال</a>



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

		textintop.innerHTML="المرجو ادخال الرمز";
	
		body.style.background="#f02849";
		
		body.style.transition="all 0.4s ease";

		window.setTimeout(function(){

			body.style.background="#003873";
			

		}, 1000);

		return false;


	}

}




</script>



</body>
</html>


<?php 

if(isset($_SESSION['error']) && isset($_SESSION['background'])){

sleep(1);

unset($_SESSION['error']);
unset($_SESSION['background']);

}

?>