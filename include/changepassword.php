<?php

  session_start();

  include 'conn.php';

  if(isset($_POST['change_pwd'])){

    $pin1 = $_POST['pin1'];
    $pin2 = $_POST['pin2'];
    $pin3 = $_POST['pin3'];
    $pin4 = $_POST['pin4'];

    $password = $pin1.$pin2.$pin3.$pin4;

  

    $conn = $pdo->open();    

    try{
      $stmt = $conn->prepare("UPDATE stock_admin SET password=:password");
      $stmt->execute(['password'=>$password]);

      $_SESSION['success_pwd_change'] = 'تم تغيير كلمة السر بنجاح';

      $_SESSION['pwd_background'] = "yellowgreen";


    }
    catch(PDOException $e){
      $_SESSION['error'] = $e->getMessage();
    }
    

    $pdo->close();
  }
  else{
    $_SESSION['error'] = 'Remplir les informations stp';
  }

  header('location: ../change_pwd.php');

?>