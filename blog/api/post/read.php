<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require '../../config/Database.php';
$db = new Database;

require'../../models/Post.php';
$post = new Post;

$conn = $post->read();
$conn->execute();
$rowCount = $conn->rowCount();
 

if($rowCount > 0) {
    $posts_arr = array();

    while($row = $conn->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
        'title' => $title,
        'body' => html_entity_decode($body),
        'author' => $author,
        'category_name' => $category_name,
        'created_at' => $created_at,
      );

      array_push($posts_arr, $post_item);
    }

 // encoding data to json format
    echo json_encode($posts_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }

?>