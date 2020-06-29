<?php  
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  $db = new Database();
  $post = new Post;

  $data = json_decode(file_get_contents('php://input'));

  if($post->delete($data))
  {
   echo json_encode('POST successfully Deleted');   
  }else{
      echo json_encode(array(
           'message' => 'post was not deleted' ));
  }


?>