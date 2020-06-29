<?php
 include_once '../config/Database.php';
class Post{
   
  
    
   public $id,$category_id,$category_name,$title,$body,$author,$created_at;
   private $stmt;

    public function read()
    {
        
        $db = new Database;
        $conn = $db->connect();
        $sql = 'Select c.name as category_name,
                      p.id,
                      p.title,
                      p.body,
                      p.author,
                      p.created_at
                FROM  posts p 
                LEFT JOIN categories c
                ON p.category_id = c.id
                ORDER BY p.category_id DESC'
               
            ;
       
          return $this->stmt = $conn->prepare($sql);
    
    }
    
    public function create($data)
    {
        
         $db = new Database;
         $conn = $db->connect();
    
        $this->title = $data->title;
        $this->body = $data->body;
        $this->author = $data->author;
        $this->id = $data->id;
       
        $sql = 'INSERT INTO `posts`(`category_id`, `title`, `body`, `author`) 
        VALUES (:category_id,:title,:body,:author)';
        
        $this->stmt = $conn->prepare($sql);
        $this->stmt->bindValue(':category_id',$this->category_id);
        $this->stmt->bindValue(':title',$this->title);
        $this->stmt->bindValue(':body',$this->body);
        $this->stmt->bindValue(':author',$this->author);

        $this->stmt->execute();
        return true;
    }
    
    
    public function update($data)
    {
         $db = new Database;
         $conn = $db->connect();
    
        $this->category_id = $data->category_id;
        $this->title = $data->title;
        $this->body = $data->body;
        $this->author = $data->author;
        $this->id = $data->id;
        
        $sql = 'UPDATE `posts` SET `category_id`=:category_id,`title`=:title,`body`=:body,`author`=:author WHERE id =:id';
        
        $this->stmt = $conn->prepare($sql);
        $this->stmt->bindValue(':category_id',$this->category_id);
        $this->stmt->bindValue(':title',$this->title);
        $this->stmt->bindValue(':body',$this->body);
        $this->stmt->bindValue(':author',$this->author);
        $this->stmt->bindValue(':id',$this->id);
        $this->stmt->execute();
        return true;
    }
    
    public function delete($data)
    {
         $db = new Database;
         $conn = $db->connect();
         $id = $data->id;
        
         $sql = 'Delete FROM posts WHERE id=:id';
         $this->stmt = $conn->prepare($sql);
         $this->stmt->bindValue(':id',$id);
         $this->stmt->execute();
         return true;
    }
} 

?>