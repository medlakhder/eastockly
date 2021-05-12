
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
  <script src="https://kit.fontawesome.com/d281bae09b.js" crossorigin="anonymous"></script> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
  <title></title>

<style type="text/css">
  

* {

  position: inline;
  padding:0;
  margin:0;
  font-family: 'Cairo', sans-serif;
}



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


.input_search{
  padding:10px;
  width: 150px;
  font-size: 17px;
  color:white;
  outline:none;
  background:transparent;
  border:1px solid white;
  border-bottom: 1px solid white;
  text-align: center;

}

::placeholder{
  color:white;
  font-size: 17px
  }


  .quantity{
  padding:10px;
  width: 50px;
  font-size: 17px;
  color:white;
  outline:none;
  background:transparent;
  border:1px solid white;
  border-bottom: 1px solid white;
  text-align: center;

  }



.button_search{
  margin:20px;
  width: 230px;
  padding:8px;
  font-weight: bolder;
  background:transparent;
  color:#003873;
  background:white;
  border:1px solid white;
  font-size: 17px;
  outline:none;

}
.button_search:hover{
  background:white;
  color:#003873;
  border:1px solid white;
}







</style>

</head>
<body style='background:#003873'>


  <!---------------------------ALERT DE DATE------------------------------> 
  <!---------------------------ALERT DE DATE------------------------------>

  <?php
                                
                $conn = $pdo->open();

              
                $today = date("Y/m/d");

                $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM eat WHERE die_date=:today");
                $stmt->execute(['today'=>$today]);
                $urow =  $stmt->fetch();

                if($urow['numrows']>0){

                    echo "<a style='text-decoration: none;' href='die_products.php'><i style='font-size: 25px;color:#ec3d3c;padding:15px' class='fas fa-exclamation-circle'><small style='font-size: 15px'>".$urow['numrows']."</small></i></a>";
                }


                
              ?>  
  


  <!---------------------------ALERT DE DATE------------------------------> 
  <!---------------------------ALERT DE DATE------------------------------>


<br>
<center><p style="color:yellowgreen;font-size: 20px;margin:10px">
  
 <?php

        if(isset($_SESSION['success'])){

            echo $_SESSION['success'];

        }


   ?>



</p></center>


<!---------------------------------------------------------------------->
<!------------------- Search bar Here ----------------------------->
<!---------------------------------------------------------------------->

 <center>
<form action="facture.php" method="post">

  <div class="search_bar_div">
    <div> <!-------3 first inputs--------->
  <input class="input_search" type="text" placeholder="المنتج 1" name="prod1" required="required">
  <input style="width: 75px" placeholder="كمية" type="number" value="0" class="quantity" name="qty1" required="">
  <select name="unite1" style="color:darkgrey;width: 85px" class="quantity">
        <option selected="selected" value="كيلوغرام">Kg</option>
      <option value="وحدة">Unite</option>
  </select>
  <br><br>
  </div>
  <div class="search_bar_div">
    <div> <!-------3 first inputs--------->
  <input class="input_search" type="text" placeholder="المنتج 2" name="prod2" >
  <input style="width: 75px" placeholder="كمية" type="number" value="0" class="quantity" name="qty2" required="required">
  <select name="unite2" style="color:darkgrey;width: 85px"  class="quantity">
       <option selected="selected" value="كيلوغرام">Kg</option>
      <option value="وحدة">Unite</option>
  </select>
  <br><br>
  </div>
  <div class="search_bar_div">
    <div> <!-------3 first inputs--------->
  <input  class="input_search" type="text" placeholder="المنتج 3" name="prod3" >
  <input style="width: 75px" placeholder="كمية" type="number" value="0" class="quantity" name="qty3" required="required">
  <select name="unite3" style="color:darkgrey;width: 85px" class="quantity">
          <option selected="selected" value="كيلوغرام">Kg</option>
      <option value="وحدة">Unite</option>
  </select>
  <br><br>
  </div>
  <div class="search_bar_div">
    <div> <!-------3 first inputs--------->
  <input  class="input_search" type="text" placeholder="المنتج 4" name="prod4" >
  <input style="width: 75px" placeholder="كمية" type="number" value="0" class="quantity" name="qty4" required="required">
  <select name="unite4" style="color:darkgrey;width: 85px" class="quantity">
   
      <option selected="selected" value="كيلوغرام">Kg</option>
      <option value="وحدة">Unite</option>
  </select>
  <br><br>
  </div>
  <div class="search_bar_div">
    <div> <!-------3 first inputs--------->
  <input name="prod5" class="input_search" type="text" placeholder="المنتج 5" >
  <input style="width: 75px" placeholder="كمية" type="number" value="0" class="quantity" name="qty5" required="required">
  <select name="unite5" style="color:darkgrey;width: 85px" class="quantity">
        <option selected="selected" value="كيلوغرام">Kg</option>
      <option value="وحدة">Unite</option>
  </select>
  <br><br>
  </div>
  <div class="search_bar_div">
    <div> <!-------3 first inputs--------->
  <input name="prod6" class="input_search" type="text" placeholder="المنتج 6" >
  <input style="width: 75px" placeholder="كمية" type="number" value="0" class="quantity" name="qty6" required="required">
  <select name="unite6" style="color:darkgrey;width: 85px" class="quantity">
        <option selected="selected" value="كيلوغرام">Kg</option>
      <option value="وحدة">Unite</option>
  </select>
  <br><br>
  </div>
  <div class="search_bar_div">
    <div> <!-------3 first inputs--------->
  <input name="prod7" class="input_search" type="text" placeholder="المنتج 7" >
  <input style="width: 75px" placeholder="كمية" type="number" value="0" class="quantity" name="qty7" required="required">
  <select name="unite7" style="color:darkgrey;width: 85px" class="quantity">
        <option selected="selected" value="كيلوغرام">Kg</option>
      <option value="وحدة">Unite</option>
  </select>
  <br><br>
  </div>
  <div class="search_bar_div">
    <div> <!-------3 first inputs--------->
  <input name="prod8" class="input_search" type="text" placeholder="المنتج 8" >
  <input style="width: 75px" placeholder="كمية" type="number" value="0" class="quantity" name="qty8" required="required">
  <select name="unite8" style="color:darkgrey;width: 85px" class="quantity">
        <option selected="selected" value="كيلوغرام">Kg</option>
      <option value="وحدة">Unite</option>
  </select>
  <br><br>
  </div>
  <div class="search_bar_div">
    
  <div class="search_bar_div">
    
  <input style="width: 155px" placeholder="الهاتف" type="text" class="quantity" name="phone" required="required">
  <input style="color:white;width: 155px" placeholder="الاسم الكامل" type="text" class="quantity" name="fullname" required="required">
  <button name="creat" class="button_search" type="submit">

انشاء  <i style="font-size: 14px" class="fas fa-search" ></i></button>
 
  </div>
   <br>
  
  </div>
 

</form>
 </center> 


<center><a href="change_pwd.php" style="text-decoration: none;color:white;font-size: 15px;">تغيير كلمة السر</a></center>

<!---------------------------------------------------------------------->
<!------------------- Search bar Here ----------------------------->
<!---------------------------------------------------------------------->

<center><a href='dashboard.php' style="text-decoration: none;font-size: 20px;position: fixed;"  name="login" id='clean' class='clean'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; رجوع  <i style="font-size: 19px" class='fas fa-sign-out-alt'></i></a></center>
</body>
</html>
<?php

if(isset($_SESSION['success'])){

  sleep(1);
  unset($_SESSION['success']);

}


?>