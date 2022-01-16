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
 
$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$dep = mysqli_real_escape_string($conn, $_POST['dep']);
$ref_dem = mysqli_real_escape_string($conn, $_POST['ref_dem']);
$qnt = mysqli_real_escape_string($conn, $_POST['qnt']);
$date = mysqli_real_escape_string($conn, $_POST['date']);

$sql = "INSERT INTO demandeur (nom, dep, ref_art_dem, qnut_dem, date) VALUES ('$nom', '$dep', '$ref_dem', '$qnt', '$date')";
 
if($conn->query($sql) === TRUE){
	
 echo "Record Added Sucessfully : ";
 
 
}else{


 echo "Error" . $sql . "<br/>" . $conn->error;

}
$query ="SELECT ref_art,stock from  article where '$ref_dem' = article.ref_art ";  
$result = mysqli_query($conn, $query) or die( mysqli_error($conn));
// $result = mysqli_query($conn, $query);  

while($row = mysqli_fetch_row($result))
    
                          {  
                               
                               
                                    $row[1];
                             
                                $test= $row[1];
								$total = $test - $qnt;
                          }  
						  
						 
echo '

<form name="article" method="post" action="../classes/confirm_dem.php" enctype="multipart/form-data">
				<table><tr>	<td>
					<label>Nom du Demandeur: <i class="fa fa-tag"></i></label>
					</td>
					
						
					<td>
						
						<label>Département </label>
						</td>
						<td>
						
						<label>Référence dArticle </label>
						</td>
						<td>
						
						<label>quantité </label>
						</td>
						
						<td>
						
						<label>Stock</label>
						</td>
						<td>
						
						<label>Reste</label>
						</td>
					<td>
						<label>Date  </label>
						</td>
						
					



</tr>
<tr><td>
<input type="text" class="form-control input-sm" id="nom" name="nom" value="'.$nom.'"></td>
<td>
<input type="text" class="form-control input-sm" id="dep" name="dep" value="'.$dep.'"></td>
<td><input type="text" class="form-control input-sm" id="ref_dem" name="ref_dem" value="'.$ref_dem.'"></td>
<td><input type="text" class="form-control input-sm" id="qnt" name="qnt" value="'.$qnt.'"></td>
<td><input type="hidden" class="form-control input-sm" id="test" name="test" value="'.$test.'" > </td>
<td><input type="hidden" class="form-control input-sm" id="reste" name="reste" value="'.$total.'" > </td>
<td><input type="text" class="form-control input-sm" id="date" name="date" value="'.$date.'"></td>
</tr>


</table><input type="submit" value="confirmer"></form>'

?>
