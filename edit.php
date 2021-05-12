
<?php session_start(); ?>

<?php

if(!isset($_SESSION['password']) || !isset($_POST['id'])){

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
  width: 235px;
  padding:8px;
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


.parent-div {
  display: inline-block;
  z-index: 1;
  position: relative;
  overflow: hidden;

}
.parent-div input[type=file] {
  z-index: 1;
  left: 0;
  top: 0;
  opacity: 0;
  position: absolute;
  font-size: 90px;
  cursor: pointer;
}
.btn-upload {
  z-index: 1;
  margin-top: 20px;
  background-color: #3578bf;
  color: white;
  border:none;
  outline:none;
  width: 240px;
  padding:8px;
  font-size: 17px;
  cursor: pointer;
  
}







</style>

</head>
<body style='background:#003873'>

<center><p style="font-weight: bold;color:yellowgreen;margin:10px;font-size:25px">اضف منتوج جديد</p></center>
<center><hr style='opacity:0.2' color="#ddd" width="70%"></center>

<br>



<!---------------------------------------------------------------------->
<!------------------- Search bar Here ----------------------------->
<!---------------------------------------------------------------------->

 <center>
<form action="include/del_or_edit.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">

  <div class="search_bar_div">
  <input name="qr_code" class="input_search" type="text" placeholder="تعريف المنتج"  required="required">
  <br>
  <input name="nom" class="input_search" type="text" placeholder="اسم المنتج"  required="required">
  <br>
  <input name="buy_date" class="input_search" type="text" placeholder="تاريخ شراء المنتج"  required="required">
  <br>
  <input name="buy_price" class="input_search" type="text" placeholder="ثمن شراء المنتج"  required="required">
  <br>
  <input name="sell_price" class="input_search" type="text" placeholder="ثمن بيع المنتج" required="required">
  <br>
  <input name="die_date" class="input_search" type="text" placeholder="تاريخ انتهاء صلاحية المنتج"  required="required">
  <br>
  <input name="supplier_name" class="input_search" type="text" placeholder="المورد"  required="required">
  <br>
  <input name="supplier_phone" class="input_search" type="text" placeholder="هاتف المورد"  required="required">
  <br>
  <div class="parent-div">

  
  <button id="chooseTEXT" class="btn-upload">صورة المنتج</button>
  <input type="file" id='file' name="photo" accept=".png,.jpg,.jpeg,.gif" required="required" />
    </div>
  
  <br>
  <button style="font-weight: bolder;background:white;border:1px solid white;color:#003873" name="edit" class="button_search" type="submit">

تغيير  <i style="font-size: 14px" class="far fa-edit" ></i></button>

  </div>
 

</form>
 </center> 

<script>



document.getElementById("file").onchange = function () {
    document.getElementById("chooseTEXT").style.background="#22bb33";
    document.getElementById("chooseTEXT").innerHTML = `<i class="fas fa-check"></i>

 تم اختيار الصورة`;


 };



</script>


 <br><br><br>

<!---------------------------------------------------------------------->
<!------------------- Search bar Here ----------------------------->
<!---------------------------------------------------------------------->

<center><a href='dashboard.php' style="z-index: 5;text-decoration: none;font-size: 20px;position: fixed;"  name="login" id='clean' class='clean'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; رجوع<i style="font-size: 19px" class='fas fa-sign-out-alt'></i></a></center>
</body>
</html>
<?php

if(isset($_SESSION['success'])){

  sleep(1);
  unset($_SESSION['success']);

}


?>