
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


.divv{
  -webkit-box-shadow: 8px 13px 52px -23px rgba(8,1,8,1);
-moz-box-shadow: 8px 13px 52px -23px rgba(8,1,8,1);
box-shadow: 8px 13px 52px -23px rgba(8,1,8,1);
}

</style>

</head>
<body style='background:#003873'>



<br>

<p style="color:white;font-size: 20px;text-align: center;">منتجات انتهت صلاحيتها</p>
<center><hr color="white" style="opacity: 0.5;margin:7px;" width="70%"></hr></center>

<p style="color:green;font-size: 23px;text-align: center"><?php echo date("Y/m/d"); ?></p>
<br>



<!---------------------------------------------------------------------->
<!------------------- Display Product Here ----------------------------->
<!---------------------------------------------------------------------->

<?php
                
                $conn = $pdo->open();
                $today = date("Y/m/d");
               
                try{
                  
                $stmt = $conn->prepare("SELECT * FROM eat WHERE die_date=:today");
                $stmt->execute(['today'=>$today]);
                foreach ($stmt as $row) {
                  
                  $id = $row['id'];
                  $photo = $row['photo'];
                  $nom = $row['nom'];
                  $red_text = "انتهت صلاحية هذا المنتج";
                    
                    echo"

                      <center>


                <div style='border:1px solid #ddd;display: flex;margin:30px;'>

                <img src='images/$photo' width='90px' height='90px' style='float:left;padding:15px'>

                <div style='position: relative;top:15px;font-size: 20px'>
                <p style='font-size: 20px;color:white;'>$nom</p>
                <p style='font-size: 17px;color:red;'>$red_text</p>


                </div>

                </div>
               
                </center>


                    ";
                  
                }

              
            }
            catch(PDOException $e){
              echo "There is some problem in connection: " . $e->getMessage();
            }

            $pdo->close();

              ?> 
              <br><br>
<!---------------------------------------------------------------------->
<!------------------- Display Product Here ----------------------------->
<!---------------------------------------------------------------------->

<center><a href='dashboard.php' style="text-decoration: none;font-size: 20px;position: fixed;"  name="login" id='clean' class='clean'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  رجوع <i style="font-size: 15px" class='fas fa-arrow-right'></i></a></center>
</body>
</html>
<?php

if(isset($_SESSION['success'])){

  sleep(1);
  unset($_SESSION['success']);

}


?>