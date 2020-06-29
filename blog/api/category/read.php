<?php 
header('Allow-Access-Control-Origin = *');
header('Content-Type: application/json');
 
include_once '../../config/Database.php';
include_once '../../models/Category.php';

$db = new Database;
$cat = new Category;

$conn = $cat->read();
$conn->execute();
$rowCount = $conn->rowCount();

if($rowCount>0)
{
    $cat_items = array();
    
    while($row = $conn->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $cat_arr = array(
        'id' => $id,
        'name' => $name,
        'created_at' => $created_at,
      );

    
    array_push($cat_items,$cat_arr);
    
}
    echo json_encode($cat_items);
}
else{
    json_encode(array(
     'message' => 'Could not Fetch Data'
    ));
}

?>