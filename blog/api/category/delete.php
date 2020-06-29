<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';

  // Instantiate DB & connect
  $database = new Database;
  $cat = new Category;

  $data = json_decode(file_get_contents('php://input'));
 
  if($cat->delete($data)){
      echo json_encode(array(
       'message' => 'category deleted'
    ));
  }else{
    echo json_encode(array(
       'message' => 'category was not deleted'
    ));
  }



?>