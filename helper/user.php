<?php

  class User
  {
    private $id;
    private $name;
    private $emailid;
    private $gender;
    private $password;
    private $confirmPassword;

    public function setId($id) 
    { 
      $this->id = $id; 
    }
    
    public function getId() 
    { 
      return $this->id; 
    }
    
    public function setName($name) 
    { 
      $this->name = $name; 
    }
    
    public function getName() 
    { 
      return $this->name; 
    }
    
    public function setEmailid($emailid) 
    { 
      $this->emailid = $emailid; 
    }
    
    public function getEmailid() 
    { 
      return $this->emailid; 
    }
    
    public function setGender($gender) 
    { 
      $this->gender = $gender; 
    }
    
    public function getGender() 
    { 
      return $this->gender; 
    }
    
    public function setPassword($password) 
    { 
      $this->password = $password; 
    }
    
    public function getPassword() 
    { 
      return $this->password; 
    }
    
    public function setConfirmPassword($confirmPassword) 
    { 
      $this->confirmPassword = $confirmPassword; 
    }
    
    public function getConfirmPassword() 
    { 
      return $this->confirmPassword; 
    }
  }

?>