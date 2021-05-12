<?php

  session_start();
  include 'conn.php';


  if(isset($_POST['edit'])){



    $id = $_POST['id'];


    $conn = $pdo->open();
    $stmt = $conn->prepare("SELECT * FROM eat WHERE id=:id");
    $stmt->execute(['id'=>$id]);
    $row = $stmt->fetch();


                  $qr_code = $_POST['qr_code'];
                  $nom = $_POST['nom'];
                  $buy_date = $_POST['buy_date']; 
                  $buy_price = $_POST['buy_price']; 
                  $sell_price = $_POST['sell_price']; 
                  $filename = $_FILES['photo']['name'];
                  $die_date = $_POST['die_date']; 
                  $supplier_name = $_POST['supplier_name']; 
                  $supplier_phone = $_POST['supplier_phone']; 

                  move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);

    

    try{
      $stmt = $conn->prepare("UPDATE eat SET qr_code=:qr_code,nom=:nom,buy_date=:buy_date,buy_price=:buy_price,sell_price=:sell_price,photo=:filename,die_date=:die_date,supplier_name=:supplier_name,supplier_phone=:supplier_phone WHERE id=:id");
      $stmt->execute(['qr_code'=>$qr_code,'nom'=>$nom,'buy_date'=>$buy_date,'buy_price'=>$buy_price,'sell_price'=>$sell_price,'filename'=>$filename,'die_date'=>$die_date,'supplier_name'=>$supplier_name,'supplier_phone'=>$supplier_phone,'id'=>$id]);

      $_SESSION['success'] = 'تمت العملية بنجاح';
      header('location: ../dashboard.php');

    }
    catch(PDOException $e){
      $_SESSION['error'] = $e->getMessage();
    }
    

    $pdo->close();
  }



  //--------------------- DELETE -----------------------//


  if(isset($_POST['delete'])){



    $id = $_POST['id'];

    
    $conn = $pdo->open();

    try{
      $stmt = $conn->prepare("DELETE FROM eat WHERE id=:id");
      $stmt->execute(['id'=>$id]);

      $_SESSION['success'] = 'تمت العملية بنجاح';
      header('location: ../dashboard.php');
    }
    catch(PDOException $e){
      $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
  }


  else{
    $_SESSION['error'] = 'هناك مشكلة في النظام';
    header('location: ../dashboard.php');
  }

?>