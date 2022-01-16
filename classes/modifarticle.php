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

$ref1= mysqli_real_escape_string($link, $_POST['ref1']);
$ref = mysqli_real_escape_string($link, $_POST['ref']);
$description = mysqli_real_escape_string($link, $_POST['description']);
$select = mysqli_real_escape_string($link, $_POST['secl']);
$qnut = mysqli_real_escape_string($link, $_POST['qnt']);
$stock = mysqli_real_escape_string($link, $_POST['stock']);

$total = $qnut + $stock;

//$imagep = $_FILES['image']['name'];
move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);			
$location1=$_FILES["image"]["name"];
//$id_ref = $_POST['id_ref'];
$sql = "UPDATE article SET ref_art='$ref',desc_art='$description',selec_cat='$select',qnut='$qnut',stock='$total',image_ar='$location1' where id_ref= '$ref1'";
if(mysqli_query($link, $sql)){
	
	
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 echo $location1;
// Close connection
mysqli_close($link);
header("location:../view/article.php");
?>

