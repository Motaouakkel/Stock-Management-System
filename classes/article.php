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
 
$ref_art = mysqli_real_escape_string($conn, $_POST['ref_art']);
$desc_art = mysqli_real_escape_string($conn, $_POST['desc_art']);
$n_cat = mysqli_real_escape_string($conn, $_POST['n_cat']);
$qnut = mysqli_real_escape_string($conn, $_POST['qnut']);

$image = $_FILES['image']['name'];
  //	$image_text = mysqli_real_escape_string($conn, $_POST['image']);
  	$target = "images/".basename($image);
	$query = "SELECT ref_art FROM article WHERE ref_art = '$ref_art' ";
	$resultat =  mysqli_query( $conn, $query ) ;
	$row = mysqli_fetch_array($resultat, MYSQLI_ASSOC) ;  
	if ( mysqli_num_rows($resultat) != 0 )
	 {
     echo '<script language=javascript>
   alert(\' \la référence '.$ref_art.' existe déja  \');window.location.href = "../view/article.php";
</script> ';
//header("location:../view/article.php");
     }else{
$sql = "INSERT INTO article (ref_art, desc_art, id_cat_art, qnut, selec_cat,stock,image_ar,image_tmp) VALUES ('$ref_art', '$desc_art', '$n_cat', '$qnut', '', '','$image','$target')";
 
if($conn->query($sql) === TRUE){
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
 header("location:../view/article.php");
 
 
}else{


 echo "Error" . $sql . "<br/>" . $conn->error;
}
}
}
$conn->close();
//header("location:../view/article.php");

?>

