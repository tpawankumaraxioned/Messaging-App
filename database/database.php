<?php

class Database
{
  private $db_host = "localhost";
  private $db_username = "root";
  private $db_password = "";
  private $db_name = "chat";

  public $conn;
  public $stmt;

  public function __construct()
  {
    try {
      $this->conn = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name , $this->db_username, $this->db_password);
      
      $table = "CREATE TABLE IF NOT EXISTS `registration` ( 
        `id` INT(20) NOT NULL AUTO_INCREMENT , 
        `name` VARCHAR(50) NOT NULL , 
        `emailid` VARCHAR(40) NOT NULL , 
        `gender` ENUM('male','female','other') NOT NULL , 
        `password` VARCHAR(255) NOT NULL , 
        `sessionname` VARCHAR(30) ,
        PRIMARY KEY (`id`) ,
        UNIQUE(`emailid`))";
    
      $this->conn->exec($table);
      // echo "Table MyGuests created successfully";
        
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function insert($user, $hashPassword)
  {    
    $sql = "insert into registration (name, emailid, gender, password, sessionname) values (?,?,?,?,?)";
    $this->stmt = $this->conn->prepare($sql);
    
    $this->stmt->execute(array($user->getName(), $user->getEmailid(), $user->getGender(), $hashPassword, $user->getEmailid()));
  }


  public function select($useremail)
  {
    $query = $this->conn->prepare("select * from registration where emailid=?");
    $query->bindParam(1, $useremail);

    if ($query->execute()) {
      $result1 = $query->setFetchMode(PDO::FETCH_ASSOC);
      $res = $query->fetch();
      
      return $res;
    }
  }

  public function showUser($emailid)
  {
    $query = $this->conn->prepare("select * from registration where NOT emailid =?");
    $query->bindParam(1, $emailid);
    if ($query->execute()) {
      $result1 = $query->setFetchMode(PDO::FETCH_ASSOC);
      $res = $query->fetchAll();
      
      return $res;
    }
  }

}
