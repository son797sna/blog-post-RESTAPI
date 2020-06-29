<?php
 include_once '../config/Database.php';
class Category{
   
   public $name,$created_at;
   private $stmt,$db,$conn,$id;
    
   public function __construct()
   {
      
         $db = new Database;
         $this->conn = $db->connect();
       
   }
    
   public function read()
    {
        $sql = 'SELECT * FROM categories';
        return $this->stmt = $this->conn->prepare($sql);   
    }
    
    public function create($data)
    {
        
         
        $this->name = $data->name;
      
       
        $sql = 'INSERT INTO `categories`(`name`) VALUES (:name)';
        
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindValue(':name',$this->name);
       

        $this->stmt->execute();
        return true;
    }
    
      public function update($data)
    {
    
         $this->name = $data->name;
         $this->id = $data->id;
      
       
        $sql = 'UPDATE categories SET name=:name WHERE id=:id';
        
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindValue(':name',$this->name);
        $this->stmt->bindValue(':id',$this->id);
       

        $this->stmt->execute();
        return true;
    }
    
     public function delete($data)
    {
         $this->id = $data->id;   
     
         $sql = 'DELETE FROM categories WHERE id=:id';
        
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindValue(':id',$this->id);
        $this->stmt->execute();
        return true;
    }
 
    
}