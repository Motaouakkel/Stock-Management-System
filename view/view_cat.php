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
	
		<title>BC</title>
		<?php require_once "menu.php"; ?>
		


 <?php  
 $connect = mysqli_connect("localhost", "root", "", "estoque");  
 $query ="SELECT id_ref,id_cat_art,ref_art,desc_art,selec_cat,stock,image_ar,image_tmp,id_categoria,nome_categoria FROM article,categorias where article.id_cat_art = categorias.id_categoria";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title> Listes des Articles</title>  
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
                <h3 align="center">Listes des Articles</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Référence d'Article</td>  
                                    <td>Déscription</td>  
                                    <td>Catégorie</td>  
                                 
									<td>Quantité en Stock</td>
                                    <td>Image</td>
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["ref_art"].'</td>  
                                    <td>'.$row["desc_art"].'</td>  
                                    <td>'.$row["nome_categoria"].'</td>  
                                    
									<td>'.$row["stock"].'</td>
                                  <td><img src="../img/' . $row["image_tmp"] .'" width="80" height="50"/></td>
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
			 extend: 'print', text: 'Imprimer',title: 'Liste des Articles' 


			 },
			 
			 { 
			 extend: 'excel', text: 'Excel'


			 },
		
        ],
     columnDefs: [
	 { "width": "100px", "targets": [0,1] },
        { "width": "100px", "targets": [2,3] },       
        { "width": "100px", "targets": [4] }
      ],
	   
	
    "language": {
		
        "sProcessing":    "Chargement...",
        "sLengthMenu":    "Page _MENU_ ",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Affiche les Enregistrements de _START_ à _END_  sur un total de _TOTAL_ Enregistrements",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Recherche :",
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