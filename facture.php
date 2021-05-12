
<?php session_start(); ?>

<?php

if(!isset($_SESSION['password'])){

  header('location: index.php');
}

include 'include/conn.php';




$fullname = $_POST['fullname'];
$phone = $_POST['phone'];





?>



<html>
<head>
	<script src="https://kit.fontawesome.com/d281bae09b.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">
	<title></title>


	<style type="text/css">

		.clean{
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

.clean:hover{
  background:white;
  border:1px solid white;
  color:#1f49b6;
  transition: all 0.2s ease-in-out;
}

		body{
			margin:0;
			padding:0;
		}

		*{
			font-family: 'Almarai', sans-serif;
		}
		
		.ras_lfactura{
			display: inline-flex;
		}

		table {

  border-collapse: collapse;
  font-size: 20px;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  border-bottom: none;
  text-align: left;
  padding: 10px;
}


.bodyy_content{
	display: none;
	z-index: 1;
}

#bttn_print{
	z-index: 3;
	display: none;
	background:white;
	position: absolute;
	color:#003873;
	padding:13px 33px;
	font-size: 25px;
	top:300px;
	font-weight: bold;
	right: 100px;
	border:none;
	border-radius: 50px;
	outline: none;
	transition: all 0.2s ease-in-out;


}


		body{
			background:#003873;
		}


@media print{

		body{
		background:white;
	}	

	.bodyy_content{
	display: block;
		}


	#bttn_print{
		display: none;
		visibility: hidden;
		opacity: 0;
	}

	.retour{
		display: none;
	}

}
}






	</style>

</head>
<body>



<div class="bodyy_content" id='body_content'>

<div style="padding:30px" class="ras_lfactura">
	
	<br><br>
<img style="margin-left: 5px" width="170px" src="images/logo.png">
 
 <div style="text-align: right;font-family: 'Almarai', sans-serif;padding:20px;font-size: 25px;position: relative;left:300px">
 <label style='color:#005799'>	العنوان :</label> تنغير- شارع بئرانزران
 	<br>
<label style='color:#005799'>اتصل بنا :</label> 0618978119
<br>
superchraff@gmail.com <label style='color:#005799'>: البريد الالكتوني</label>
<br>
<label style='color:#005799'>ساعات العمل : </label>من الساعه 8 صباحاً حتى 11 مساءاً
<br>
<label style='color:#005799'>تاريخ الطلب   : </label><?php echo date("Y.m.d"); ?> 
 </div>

</div>


<div style="font-size: 30px;color:white;display: inline-flex;background: linear-gradient(to left,#005799 0,#48dbfc);width: 100%;padding:10px">
	
<p style="text-align: center;margin-left: 120px">اسم المشتري<br>  <?php echo $fullname ?></p>
<p style="text-align: center;position: relative;margin-left: 400px">هاتف المشتري<br> <?php echo $phone ?></p>


</div>





<center>
<div>
<table>

<tr style="background:#ddd;padding:20px;">
	<td style="font-size: 20px;font-weight: bold;border-right:1px solid darkgrey">الصورة</td>
	<td style="font-size: 20px;font-weight: bold;border-right:1px solid darkgrey">الاسم</td>
	<td style="font-size: 20px;font-weight: bold;border-right:1px solid darkgrey">الكمية</td>
  <td style="font-size: 20px;font-weight: bold;border-right:1px solid darkgrey">الثمن</td>
	<td style="font-size: 20px;font-weight: bold;">المجموع</td>

</tr>	

<?php
                
          if(isset($_POST['prod1'])){

                $prod1 = $_POST['prod1'];
                $qty1 = $_POST['qty1'];
          

                $conn = $pdo->open();

                try{
                  
                $stmt = $conn->prepare("SELECT * FROM eat WHERE qr_code=:prod1");
                $stmt->execute(['prod1'=>$prod1]);
                foreach ($stmt as $row) {
                  
                  $nom = $row['nom'];
                  $sell_price = $row['sell_price']; 
                  $photo = $row['photo'];
                  $total_price = $qty1*$sell_price;
 
             
                    
                    echo"

                      <tr>
  
                      <td><img width='70px' src='images/".$photo."'></td>
                      <td>".$nom."</td>
                      <td>".$qty1." ".$_POST['unite1']." </td>
                      <td>".$sell_price." درهم</td>
                      <td>".$total_price." درهم</td>

                    </tr>
                    <input type='hidden' id='totalprice1' value='".$total_price."'>
                      

                    ";
                  
                }
                
              
            }
            catch(PDOException $e){
              echo "There is some problem in connection: " . $e->getMessage();
            }

            $pdo->close();
          }
           

              ?>

<?php
                
          if(isset($_POST['prod2'])){

                $prod2 = $_POST['prod2'];
                $qty2 = $_POST['qty2'];
               

                $conn = $pdo->open();

                try{
                  
                $stmt = $conn->prepare("SELECT * FROM eat WHERE qr_code=:prod2");
                $stmt->execute(['prod2'=>$prod2]);
                foreach ($stmt as $row) {
                  
                  $nom = $row['nom'];
                  $sell_price = $row['sell_price']; 
                  $photo = $row['photo'];
                  $total_price = $qty2*$sell_price;
 
             
                    
                    echo"

                      <tr>
  
                      <td><img width='70px' src='images/".$photo."'></td>
                      <td>".$nom."</td>
                      <td>".$qty2." ".$_POST['unite2']." </td>
                      <td>".$sell_price." درهم</td>
                      <td>".$total_price." درهم</td>

                    </tr>
                    <input type='hidden' id='totalprice2' value='".$total_price."'>
                      

                    ";
                  
                }
                
              
            }
            catch(PDOException $e){
              echo "There is some problem in connection: " . $e->getMessage();
            }

            $pdo->close();
          }
           

              ?>

<?php
                
          if(isset($_POST['prod3'])){

                $prod3 = $_POST['prod3'];
                $qty3 = $_POST['qty3'];
                

                $conn = $pdo->open();

                try{
                  
                $stmt = $conn->prepare("SELECT * FROM eat WHERE qr_code=:prod3");
                $stmt->execute(['prod3'=>$prod3]);
                foreach ($stmt as $row) {
                  
                  $nom = $row['nom'];
                  $sell_price = $row['sell_price']; 
                  $photo = $row['photo'];
                  $total_price = $qty3*$sell_price;
 
             
                    
                    echo"

                      <tr>
  
                      <td><img width='70px' src='images/".$photo."'></td>
                      <td>".$nom."</td>
                      <td>".$qty3." ".$_POST['unite3']." </td>
                      <td>".$sell_price." درهم</td>
                      <td>".$total_price." درهم</td>

                    </tr>
                    <input type='hidden' id='totalprice3' value='".$total_price."'>
                      

                    ";
                  
                }
                
              
            }
            catch(PDOException $e){
              echo "There is some problem in connection: " . $e->getMessage();
            }

            $pdo->close();
          }
           

              ?>
<?php
                
          if(isset($_POST['prod4'])){

                $conn = $pdo->open();

                $prod4 = $_POST['prod4'];
                $qty4 = $_POST['qty4'];
             

                try{
                  
                $stmt = $conn->prepare("SELECT * FROM eat WHERE qr_code=:prod4");
                $stmt->execute(['prod4'=>$prod4]);
                foreach ($stmt as $row) {
                  
                  $nom = $row['nom'];
                  $sell_price = $row['sell_price']; 
                  $photo = $row['photo'];
                  $total_price = $qty4*$sell_price;
 
             
                    
                    echo"

                      <tr>
  
                      <td><img width='70px' src='images/".$photo."'></td>
                      <td>".$nom."</td>
                      <td>".$qty4." ".$_POST['unite4']." </td>
                      <td>".$sell_price." درهم</td>
                      <td>".$total_price." درهم</td>

                    </tr>
                    <input type='hidden' id='totalprice4' value='".$total_price."'>
                      

                    ";
                  
                }
                
              
            }
            catch(PDOException $e){
              echo "There is some problem in connection: " . $e->getMessage();
            }

            $pdo->close();
          }
           

              ?>
<?php
                
          if(isset($_POST['prod5'])){

                $prod5 = $_POST['prod5'];
                $qty5 = $_POST['qty5'];
                

                $conn = $pdo->open();

                try{
                  
                $stmt = $conn->prepare("SELECT * FROM eat WHERE qr_code=:prod5");
                $stmt->execute(['prod5'=>$prod5]);
                foreach ($stmt as $row) {
                  
                  $nom = $row['nom'];
                  $sell_price = $row['sell_price']; 
                  $photo = $row['photo'];
                  $total_price = $qty5*$sell_price;
 
             
                    
                    echo"

                      <tr>
  
                      <td><img width='70px' src='images/".$photo."'></td>
                      <td>".$nom."</td>
                      <td>".$qty5." ".$_POST['unite5']." </td>
                      <td>".$sell_price." درهم</td>
                      <td>".$total_price." درهم</td>

                    </tr>
                    <input type='hidden' id='totalprice5' value='".$total_price."'>
                      

                    ";
                  
                }
                
              
            }
            catch(PDOException $e){
              echo "There is some problem in connection: " . $e->getMessage();
            }

            $pdo->close();
          }
           

              ?>
<?php
                
          if(isset($_POST['prod6'])){

                $prod6 = $_POST['prod6'];
                $qty6 = $_POST['qty6'];
                

                $conn = $pdo->open();

                try{
                  
                $stmt = $conn->prepare("SELECT * FROM eat WHERE qr_code=:prod6");
                $stmt->execute(['prod6'=>$prod6]);
                foreach ($stmt as $row) {
                  
                  $nom = $row['nom'];
                  $sell_price = $row['sell_price']; 
                  $photo = $row['photo'];
                  $total_price = $qty6*$sell_price;
 
             
                    
                    echo"

                      <tr>
  
                      <td><img width='70px' src='images/".$photo."'></td>
                      <td>".$nom."</td>
                      <td>".$qty6." ".$_POST['unite6']." </td>
                      <td>".$sell_price." درهم</td>
                      <td>".$total_price." درهم</td>

                    </tr>
                    <input type='hidden' id='totalprice6' value='".$total_price."'>
                      

                    ";
                  
                }
                
              
            }
            catch(PDOException $e){
              echo "There is some problem in connection: " . $e->getMessage();
            }

            $pdo->close();
          }
           

              ?>
<?php
                
          if(isset($_POST['prod7'])){

                $prod7 = $_POST['prod7'];
                $qty7 = $_POST['qty7'];
                

                $conn = $pdo->open();

                try{
                  
                $stmt = $conn->prepare("SELECT * FROM eat WHERE qr_code=:prod7");
                $stmt->execute(['prod7'=>$prod7]);
                foreach ($stmt as $row) {
                  
                  $nom = $row['nom'];
                  $sell_price = $row['sell_price']; 
                  $photo = $row['photo'];
                  $total_price = $qty7*$sell_price;
 
             
                    
                    echo"

                      <tr>
  
                      <td><img width='70px' src='images/".$photo."'></td>
                      <td>".$nom."</td>
                      <td>".$qty7." ".$_POST['unite7']." </td>
                      <td>".$sell_price." درهم</td>
                      <td>".$total_price." درهم</td>

                    </tr>
                      <input type='hidden' id='totalprice7' value='".$total_price."'>

                    ";
                  
                }
                
              
            }
            catch(PDOException $e){
              echo "There is some problem in connection: " . $e->getMessage();
            }

            $pdo->close();
          }
          

              ?>
<?php
                
          if(isset($_POST['prod8'])){

                $prod8 = $_POST['prod8'];
                $qty8 = $_POST['qty8'];
               

                $conn = $pdo->open();

                try{
                  
                $stmt = $conn->prepare("SELECT * FROM eat WHERE qr_code=:prod8");
                $stmt->execute(['prod8'=>$prod8]);
                foreach ($stmt as $row) {
                  
                  $nom = $row['nom'];
                  $sell_price = $row['sell_price']; 
                  $photo = $row['photo'];
                  $total_price = $qty8*$sell_price;
 
             
                    
                    echo"

                      <tr>
  
                      <td><img width='80px' src='images/".$photo."'></td>
                      <td>".$nom."</td>
                      <td>".$qty8." ".$_POST['unite8']." </td>
                      <td>".$sell_price." درهم</td>
                      <td>".$total_price." درهم</td>

                    </tr>
                      
                      <input type='hidden' id='totalprice8' value='".$total_price."'>

                    ";
                  
                }
                
              
            }
            catch(PDOException $e){
              echo "There is some problem in connection: " . $e->getMessage();
            }

            $pdo->close();
          }
           

              ?>




<tr style="background: linear-gradient(to left,#005799 0,#48dbfc);">
	<td style="border:none;text-align: center;font-size: 25px;color:white;font-weight: bolder;padding:15px" colspan=2>المبلغ الاجمالي</td>
	<td style="border:none;text-align: center;font-size: 25px;color:white;font-weight: bolder;padding:15px" colspan=3><span id='total'></span> درهم</td>
</tr>
              <input type="hidden" id='totalprice1' value="0">
              <input type="hidden" id='totalprice2' value="0">
              <input type="hidden" id='totalprice3' value="0">
              <input type="hidden" id='totalprice4' value="0">
              <input type="hidden" id='totalprice5' value="0">
              <input type="hidden" id='totalprice6' value="0">
              <input type="hidden" id='totalprice7' value="0">
              <input type="hidden" id='totalprice8' value="0">

<script type="text/javascript">
    
    var total = document.getElementById('total');

    var totalprice1 = document.getElementById('totalprice1');
    var totalprice2 = document.getElementById('totalprice2');
    var totalprice3 = document.getElementById('totalprice3');
    var totalprice4 = document.getElementById('totalprice4');
    var totalprice5 = document.getElementById('totalprice5');
    var totalprice6 = document.getElementById('totalprice6');
    var totalprice7 = document.getElementById('totalprice7');
    var totalprice8 = document.getElementById('totalprice8');

    total.innerHTML = Number(totalprice1.value)+Number(totalprice2.value)+Number(totalprice3.value)+Number(totalprice4.value)+Number(totalprice5.value)+Number(totalprice6.value)+Number(totalprice7.value)+Number(totalprice8.value);


</script>


</table>
</div>
</center>


<center><div>
	
<p style="left:350px;text-align: center;font-size: 25px;position: fixed;bottom:10px">مرحبا بكم في متجر شرفاء بئرنزران</p>


</div></center>

</div>

<!---------------------------Print button----------------------------->
<!---------------------------Print button----------------------------->

<div>

	<style type="text/css">
		.loader {
  border: 7px solid #f3f3f3;
  position: absolute;
  z-index: 3;
  border-radius: 50%;
  border-top: 7px solid #003873;
  width: 70px;
  height: 70px;
  top:270px;
  left:170px;
  display: block;
  -webkit-animation: spin 1s linear infinite; /* Safari */
  animation: spin 1s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
	</style>
	

	<div id='loading' class="loader"></div>
	<center><button id='bttn_print' onclick="window.print()">تحميل الفاتورة</button></center>

</div>

<script type="text/javascript">
	
	window.setTimeout(function(){

			document.getElementById('bttn_print').style.display="block";
			document.getElementById('loading').style.display="none";
			

		}, 1000);



</script>


<!---------------------------Print button----------------------------->
<!---------------------------Print button----------------------------->

<div class='retour'>
	
<center><a href='creat_facture.php' style="text-decoration: none;font-size: 20px;position: fixed;"  name="login" id='clean' class='clean'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; رجوع  <i style="font-size: 19px" class='fas fa-sign-out-alt'></i></a></center>

</div>




</body>
</html>