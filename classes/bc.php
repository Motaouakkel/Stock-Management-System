<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "estoque";
 
//Creating connection for mysqli
 
$conn = new mysqli($server, $user, $pass, $dbname);
 
//Checking connection
 
if($conn->connect_error){
 die("Connection failed:" . $conn->connect_error);
}
 
$name = mysqli_real_escape_string($conn, $_POST['reef']);
$lname = mysqli_real_escape_string($conn, $_POST['date']);
$age = mysqli_real_escape_string($conn, $_POST['fourniSelect']);
//$age1 = mysqli_real_escape_string($conn, $_POST['qnut']);

$image = $_FILES['image']['name'];
  //	$image_text = mysqli_real_escape_string($conn, $_POST['image']);
  	$target = "images/".basename($image);
$sql = "INSERT INTO bc (n_ref, date, fourni, id_imagem, image_text) VALUES ('$name', '$lname', '$age','$image','')";
 
if($conn->query($sql) === TRUE){
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
 echo "Record Added Sucessfully : ";
 
 
}else{


 echo "Error" . $sql . "<br/>" . $conn->error;
}
}
$conn->close();
header("location:../view/bc.php");

?>

