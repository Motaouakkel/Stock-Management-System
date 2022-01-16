<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "estoque");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt update query execution

//$id_ref = $_POST['id_ref'];
//$ref = $_POST['ref'];
//$desc = $_POST['desc'];
//$select = $_POST['secl'];
//$qnut = $_POST['qnt'];
$nom = mysqli_real_escape_string($link, $_POST['nom']);
$dep = mysqli_real_escape_string($link, $_POST['dep']);
$ref_dem = mysqli_real_escape_string($link, $_POST['ref_dem']);
$qnt = mysqli_real_escape_string($link, $_POST['qnt']);
$date = mysqli_real_escape_string($link, $_POST['date']);
$reste = mysqli_real_escape_string($link, $_POST['reste']);




//$id_ref = $_POST['id_ref'];
    
$sql = "UPDATE article SET  stock='$reste' where ref_art= '$ref_dem'";






if(mysqli_query($link, $sql)){
	
	
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 echo $location1;
// Close connection
mysqli_close($link);
header("location:../view/liste_dem.php");
?>

