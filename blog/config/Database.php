<?php 

class Database{
   
    private $conn,$errmsg,$stmt;
    private $DB_HOST = "localhost";
    private $DB_NAME = "blog";
    private $DB_PASS = "";
    private $DB_USER = "root";
    public $id,$category_id,$category_name,$title,$body,$author,$created_at;
   
    public function connect()
    {
        
         $dsn = 'mysql:host='.$this->DB_HOST.';dbname='.$this->DB_NAME;
            $options = array(
                PDO::ATTR_PERSISTENT => 'true',
                PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION, 
            );
        
        try{
           $this->conn = new PDO($dsn,$this->DB_USER,$this->DB_PASS,$options); 
           return $this->conn;
        }catch(PDOException $e)
        {
            $this->errmsg = $e->getMessage();
            echo $this->errmsg;
        }
    }

}

?>