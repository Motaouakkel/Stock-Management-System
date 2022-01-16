<?php
include_once("connection.php");
$requestData= $_REQUEST;


$columns = array(
    0 =>'ref_art',
    1 => 'desc_art',
    2=> 'selec_cat'
);

$sql = "SELECT ref_art, desc_art, selec_cat FROM article";
$query=mysqli_query($conn, $sql);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

$searchKeyWord = htmlspecialchars($requestData['search']['value']);
if( !empty($searchKeyWord) ) {
    $sql.=" WHERE ref_art LIKE '".$searchKeyWord."%' ";
    $sql.=" OR desc_art LIKE '".$searchKeyWord."%' ";
    $sql.=" OR selec_cat LIKE '".$searchKeyWord."%' ";
    $query=mysqli_query($conn, $sql);
    $totalFiltered = mysqli_num_rows($query);

}
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$query=mysqli_query($conn, $sql);


$data = array();
while( $row=mysqli_fetch_array($query) ) {
    $data[] = ['id_ref'=>$row['id_ref'],'ref_art'=>$row['ref_art'],'desc_art'=>$row['desc_art'],'selec_cat'=>$row['selec_cat']];
}



$json_data = array(
    "draw"            => intval( $requestData['draw'] ),
    "recordsTotal"    => intval( $totalData ),
    "recordsFiltered" => intval( $totalFiltered ),
    "data"            => $data
);

echo json_encode($json_data);