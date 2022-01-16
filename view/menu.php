<!DOCTYPE html>
<html>
<head>
  <?php require_once "dependencias.php";




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
 $tt = $_SESSION['usuario'] ;


//$sql = "INSERT INTO demandeur (nom, dep, ref_art_dem, qnut_dem, date) VALUES ('$nom', '$dep', '$ref_dem', '$qnt', '$date')";
 

$query ="SELECT * from usuarios where user = '$tt' ";  
$result = mysqli_query($conn, $query) or die( mysqli_error($conn));
// $result = mysqli_query($conn, $query);  

while($row = mysqli_fetch_array($result))
    
                          {  
                               
                               
                                 $nomep = $row['nome'];
								 $userp = $row['user'];
								 $emailp = $row['email'];
								 //$userp = $row['user'];
                             
                               
                          }  






  ?>
  

</head>
<body>

  <!-- Begin Navbar -->
  <div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100" >
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="inicio.php"><img class="img-responsive logo img-thumbnail" src="../img/logo.jpg" alt="" width="200px" height="150px"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right">

            

            <!-- Inicio do Menu -->

            <li class="active"><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Accueil</a>
            </li>

            
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Gestion de Stock <span class="caret"></span></a>
            <ul class="dropdown-menu">
              
              
			
              <li><a href="bc.php">Bon de Commande </i></a></li>
			    <li><a href="fornecedores.php">Fournisseur  </i></a></li>
				<li><a href="categorias.php">Catégorie </i></a></li>
				<li><a href="article.php">Article </i></a></li>
            </ul>
          </li>
 <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Etat <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="view_cat.php">Liste Article</i></a></li>
              <li><a href="view_bc.php">Liste de BC </i></a></li>
		
			  
            </ul>
          </li>

       
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Fiche de Stock <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="article_dem.php">Demande Article</i></a></li>
			    <li><a href="liste_dem.php">Liste des Demandeurs</i></a></li>
             
            </ul>
          </li>



 <!--/
         
          <li><a href="vendas.php"><span class="glyphicon glyphicon-usd"></span> Vendas</a>
          </li>
            -->
          <li class="dropdown" >
            <a href="#" style="color: red"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo $nomep ; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">


              
            <li> <a href="usuarios.php"><span class="glyphicon glyphicon-user"></span> Gestion d'Utilisateur</a></li>
          

              <li> <a style="color: red" href="../procedimentos/sair.php"><span class="glyphicon glyphicon-off"></span> Déconnection</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.contatiner -->
  </div>
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->





<!-- /container -->        


</body>
</html>

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').width(100);
      $('.logo').height(60);

    }
    else {
      $('.logo').height(100);
      $('.logo').width(150);
    }
  }
  );
</script>
