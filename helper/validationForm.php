<?php
  include "helper/validation.php";
  include "database/database.php";

  $databaseObj = new Database();

  class ValidateForm extends Validation
  {
    public $nameError = "";
    public $emailError = "";
    public $genderError = "";
    public $pwdError = "";
    public $confirmpwdError = "";

    public function dataValidation($user,$pageCode)
    {
      $flag = true;
      
      if (empty($user->getName()) && $pageCode == 1) {
        $this->nameError = Parent::checkRequired($user->getName()); 
        $flag = false;
      } elseif (!empty(Parent::checkString($user->getName()))) {
        $this->nameError = Parent::checkString($user->getName());
        $flag = false;
      }
      if (empty($user->getEmailid()) && ($pageCode == 1 || $pageCode == 2)) {
        $this->emailError = Parent::checkRequired($user->getEmailid());
        $flag = false;
      } elseif (!empty(Parent::checkEmail($user->getEmailid()))) {
        $this->emailError = Parent::checkEmail($user->getEmailid());
        $flag = false;
      }
      
      if (empty($user->getGender()) && $pageCode == 1) {
        $this->genderError = "This field is required";
        $flag = false;
      }

      if (empty($user->getPassword()) && $pageCode == 1) {
        $this->pwdError = Parent::checkRequired($user->getPassword());
        $flag = false;
      } else if (!empty(Parent::checkPassword($user->getPassword())) && $pageCode == 1) {
        $this->pwdError = Parent::checkPassword($user->getPassword());
        $flag = false;
      }

      if (empty($user->getConfirmPassword()) && $pageCode == 1) {
        $this->confirmpwdError = Parent::checkRequired($user->getConfirmPassword());
        $flag = false;
      } elseif ($user->getPassword() != $user->getConfirmPassword() && $pageCode == 1) {
        $this->confirmpwdError = "Password does not Match";
        $flag = false;
      }
      return $flag;
    }

    public function loginValidation($user)
    {
      $flag = true;
      if (empty($user->getEmailid())) {
        $this->emailError = Parent::checkRequired($user->getEmailid());
        $flag = false;
      } elseif (!empty(Parent::checkEmail($user->getEmailid()))) {
        $this->emailError = Parent::checkEmail($user->getEmailid());
        $flag = false;
      }
      return $flag;
    }

    public function loginData($user)
    {
      
      global $databaseObj;
      if ($dataRetruned = $databaseObj->select($user->getEmailid()))
      {
        if (password_verify($user->getPassword(), $dataRetruned['password'])) {
          $_SESSION["loggedin"] = true;
          $_SESSION["sessionname"] = $dataRetruned['sessionname'];
          $_SESSION["id"] =$dataRetruned['id'];
          header("location:home.php");
        } else {
          $this->pwdError = "Please enter valid password.";
        }
      } else {
        $this->emailError = "Please enter registered emailid";
      } 
    }

  }
?>