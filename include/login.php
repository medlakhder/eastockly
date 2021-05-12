<?php



include 'conn.php';

session_start();
session_regenerate_id();



  $conn = $pdo->open();

  
// call the login() function if register_btn is clicked
if (isset($_POST['login'])) {

$pin1 = $_POST['pin1'];
$pin2 = $_POST['pin2'];
$pin3 = $_POST['pin3'];
$pin4 = $_POST['pin4'];

$password =  $pin1.$pin2.$pin3.$pin4;


try{

      $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM stock_admin WHERE password = :password");
      $stmt->execute(['password'=>$password]);
      $row = $stmt->fetch();
      if($row['numrows'] > 0){ 

		    $_SESSION['password'] = $row['password'];



       header('location: ../dashboard.php');
     }
     else{    

			  $_SESSION['error'] = "الرمز الذي ادخلته غير صحيح  " ;
        $_SESSION['background'] = "#f02849";
              header('location: ../index.php');    
    
           }

   }
   
   catch(PDOException $e){
      echo "There is some problem in connection: " . $e->getMessage();
    }


$pdo->close();



}

else{
    header("location: ../index.php");
  }

 



?>