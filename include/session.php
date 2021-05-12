<?php
	include 'includes/conn.php';
	session_start();

	if(isset($_SESSION['admin'])){
		header('location: admin/home.php');
	}

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();

			
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		$pdo->close();
	}
?>

<?php
if(isset($_SESSION['sessionid'])){
$sess=$_SESSION['sessionid'];
} else{

$str="qwertyuiopQWERTYUIOPlkjhgfdsaASDFGHJKLMNBVCXZzxcvbnm";
$ran=rand(1,52);
$str1=$ran;

$rest = substr($str, $ran,1);
$str1.=$rest;
$ran=rand(1,9);
$str1.=rand(1,9);
$rest = substr($str, $ran,2);
$str1.=$rest;
$str1.=rand(9,99);
  $_SESSION['sessionid']=$str1;
}
?>