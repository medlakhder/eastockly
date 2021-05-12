<?php

  session_start();

  include 'conn.php';

  if(isset($_POST['add_stock'])){
    $id = $_POST['id'];
    $db = $_POST['categorie'];
    $stock = $_POST['stock'];

  

    $conn = $pdo->open();
    $stmt = $conn->prepare("SELECT * FROM $db WHERE id=:id");
    $stmt->execute(['id'=>$id]);
    $row = $stmt->fetch();

    

    try{
      $stmt = $conn->prepare("UPDATE $db SET stock=:stock WHERE id=:id");
      $stmt->execute(['stock'=>$stock,'id'=>$id]);

      $_SESSION['success'] = 'تمت اعادة شحن المنتج';

    }
    catch(PDOException $e){
      $_SESSION['error'] = $e->getMessage();
    }
    

    $pdo->close();
  }
  else{
    $_SESSION['error'] = 'Remplir les informations stp';
  }

  header('location: ../dashboard.php');

?>