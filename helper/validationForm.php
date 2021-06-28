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
      // echo "1->".$flag."</br>";
      if (empty($user->getName()) && $pageCode == 1) {
        // echo "1.1->".$flag."</br>";
        // echo "--un1";
        $this->nameError = Parent::checkRequired($user->getName()); 
        $flag = false;
      } elseif (!empty(Parent::checkString($user->getName()))) {
        // echo "--un2";
        $this->nameError = Parent::checkString($user->getName());
        $flag = false;
      }
      // echo "2->".$flag; 
      if (empty($user->getEmailid()) && ($pageCode == 1 || $pageCode ==2)) {
        // echo "2.2->".$flag; 
        // echo "--un3";
        $this->emailError = Parent::checkRequired($user->getEmailid());
        $flag = false;
      } elseif (!empty(Parent::checkEmail($user->getEmailid()))) {
        // echo "--un4";
        $this->emailError = Parent::checkEmail($user->getEmailid());
        $flag = false;
      }
      
      if (empty($user->getGender()) && $pageCode == 1) {
        // echo "--un11";
        $this->genderError = "This field is required";
        $flag = false;
      }

      if (empty($user->getPassword()) && $pageCode == 1) {
        // echo "--un12";
        $this->pwdError = Parent::checkRequired($user->getPassword());
        $flag = false;
      } else if (!empty(Parent::checkPassword($user->getPassword())) && $pageCode == 1) {
        // echo "--un13";
        $this->pwdError = Parent::checkPassword($user->getPassword());
        $flag = false;
      }

      if (empty($user->getConfirmPassword()) && $pageCode == 1) {
        // echo "--un14";
        $this->confirmpwdError = Parent::checkRequired($user->getConfirmPassword());
        $flag = false;
      } elseif ($user->getPassword() != $user->getConfirmPassword() && $pageCode == 1) {
        // echo "--un15";
        $this->confirmpwdError = "Password does not Match";
        $flag = false;
      }
      // echo "exit";
      // echo $flag;
      return $flag;
    }
  }
?>