
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
  padding:10px 30px;
  font-size: 17px;
  color:white;
  outline:none;
  background:transparent;
  border:none;
  border-bottom: 1px solid white;
  text-align: center;

}

::placeholder{
  color:white;
  font-size: 17px
  }



.button_search{
  margin:20px;
  width: 230px;
  padding:8px;
  font-weight: bolder;
  background:transparent;
  color:white;
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
        if(isset($_SESSION['deja'])){
          echo "<label style='color:red'>".$_SESSION['deja']."</label>";
        }


   ?>



</p></center>

<center><img style="opacity: 0.4" width="250px" src="vectors/searchbar.png"></center>





<!---------------------------------------------------------------------->
<!------------------- Search bar Here ----------------------------->
<!---------------------------------------------------------------------->

 <center>
<form action="prod_details.php" method="post">

  <div class="search_bar_div">
  <input name="qr_code" class="input_search" type="text" placeholder="تعريف المنتج" name="" required="required">
  <br>
  <button name="search_button_clicked" class="button_search" type="submit">

بحث  <i style="font-size: 14px" class="fas fa-search" ></i></button>
  <br>
  <a class="button_search" href="creat_facture.php" style="font-weight: bolder;background:;border:1px solid white;padding:8px 92px;color:white;text-decoration: none;">

فاتورة  </a>
<br><br>
<a class="button_search" href="add.php" style="font-weight: bolder;background:white;border:1px solid white;padding:8px 78px;color:#003873;text-decoration: none;">

اضف منتج  </a>
  </div>
   <br>
  
  </div>
 

</form>
 </center> 


<center><a href="change_pwd.php" style="text-decoration: none;color:white;font-size: 15px;">تغيير كلمة السر</a></center>

<!---------------------------------------------------------------------->
<!------------------- Search bar Here ----------------------------->
<!---------------------------------------------------------------------->

<center><a href='include/logout.php' style="text-decoration: none;font-size: 20px;position: fixed;"  name="login" id='clean' class='clean'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; خروج  <i style="font-size: 19px" class='fas fa-sign-out-alt'></i></a></center>
</body>
</html>
<?php

if(isset($_SESSION['success'])){

  sleep(1);
  unset($_SESSION['success']);

}

if(isset($_SESSION['deja'])){

  sleep(1);
  unset($_SESSION['deja']);

}

?>