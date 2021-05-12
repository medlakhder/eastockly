<?php

  session_start();



  if(isset($_POST['add_prod'])){

                include 'conn.php';
                

                $conn = $pdo->open();

                $qr_code = $_POST['qr_code'];

                $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM eat WHERE qr_code=:qr_code");
                $stmt->execute(['qr_code'=>$qr_code]);
                $urow =  $stmt->fetch();

                if($urow['numrows']>0){

                  
                    $_SESSION['deja'] = "تم استعمال الرمز مسبقا المرجو تغييره";
                    header('location: ../dashboard.php');
                }


                else{

                  

                  
                  $nom = $_POST['nom'];
                  $buy_date = $_POST['buy_date']; 
                  $buy_price = $_POST['buy_price']; 
                  $sell_price = $_POST['sell_price']; 
                  $filename = $_FILES['photo']['name'];
                  $die_date = $_POST['die_date']; 
                  $supplier_name = $_POST['supplier_name']; 
                  $supplier_phone = $_POST['supplier_phone']; 

                  move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);

  

    $conn = $pdo->open();


      try{
        $stmt = $conn->prepare("INSERT INTO eat (qr_code, nom,buy_date, buy_price, sell_price, photo, die_date, supplier_name, supplier_phone) VALUES (:qr_code,:nom, :buy_date, :buy_price, :sell_price, :filename, :die_date, :supplier_name, :supplier_name)");
        $stmt->execute(['qr_code'=>$qr_code, 'nom'=>$nom,'buy_date'=>$buy_date, 'buy_price'=>$buy_price, 'sell_price'=>$sell_price, 'filename'=>$filename, 'die_date'=>$die_date, 'supplier_name'=>$supplier_name, 'supplier_phone'=>$supplier_phone,]);

        $_SESSION['success'] = 'تمت العملية بنجاح';
        header('location: ../dashboard.php');

        

      }
      catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
      }
    

    $pdo->close();

  } 
  }
  else{
    $_SESSION['error'] = 'هناك مشكلة في النظام';
    header('location: ../index.php');
  }

  

?>