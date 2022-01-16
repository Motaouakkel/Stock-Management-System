
<?php 
  session_start();
  if(isset($_SESSION['usuario'])){

 ?>
	<!DOCTYPE html>
	<html>
	<head>
	
			<style>
		
input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 9px 20px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
		</style>
	
		<title>Bons de Commandes</title>
		<?php require_once "menu.php"; ?>
		


 <?php  
 $connect = mysqli_connect("localhost", "root", "", "estoque");  
 $query ="SELECT n_ref,date,fourni,id_imagem,nome,endereco  FROM bc,fornecedores where bc.fourni = fornecedores.id_fornecedor ";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title> Liste des Bons de Commandes </title>  
           <script src="js/jquery.min.js"></script>  
           <link rel="stylesheet" href="css/bootstrap.min.css" />  
		   <link rel="stylesheet" href="css/buttons.dataTables.min.css" /> 
           <script src="js/jquery.dataTables.min.js"></script>  
           <script src="js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />  
		   <script src="js/dataTables.buttons.min.js"></script>  
		   <script src="js/buttons.flash.min.js"></script>  
		   <script src="js/jszip.min.js"></script>  
		   <script src="js/pdfmake.min.js"></script>  
		   <script src="js/vfs_fonts.js"></script>  
		   <script src="js/buttons.html5.min.js"></script>  
		   <script src="js/buttons.print.min.js"></script>  
		   


		   
		   
		   
		   
		   
		   
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Listes des Bons de Commandes</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>N° Référence</td>  
									<td>Date de Commande</td>  
                                    <td>Fournisseur</td>  
									 <td>Adresse</td>  
                                    <td><center>Fiche</td>  
                                    
									
                                    
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["n_ref"].'</td>  
                                    <td>'.$row["date"].'</td>  
                                    <td>'.$row["nome"].'</td>  
                                   <td>'.$row["endereco"].'</td>  
									<td><center><a href="../classes/images/' . $row["id_imagem"] .'" />Voir</a></td>
									
                                 
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable({
"info": false,
"paging":   true,
        dom: 'Bfrtip',
        buttons: [
           // 'copy', 'csv', 'excel', 'pdf', 'print'
			 { 
			 extend: 'copy', text: 'Copier'


			 },
			 
			 { 
			 extend: 'print', text: 'Imprimer',title: 'Liste des Bon de Commandes' 


			 },
			 
			 { 
			 extend: 'excel', text: 'Excel'


			 },
		
        ],
		
     columnDefs: [
	 { "width": "100px", "targets": [0,1] },
        { "width": "200px", "targets": [2,3] },       
        { "width": "100px", "targets": [4] }
      ],
    
	   
	
    "language": {
		"print":          "imprimer",
        "sProcessing":    "Chargement...",
        "sLengthMenu":    "Page _MENU_ ",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Affiche les Enregistrements de _START_ à _END_  sur un total de _TOTAL_ Enregistrements",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Recherche : ",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Premiere",
            "sLast":    "Dérnier",
            "sNext":    "Suivant",
            "sPrevious": "Précédent"
        },
		 
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
		
    },
	 
      
	
	
});
	 
 });  
 
 </script>  
 


<?php  

}else{
  header("location:../index.php");
}
?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 