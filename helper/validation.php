<?php
  class Validation
  {
    public function checkRequired($data) {
      if (empty($data)) {
        return "This field is required";
      }
    }

    public function checkString($data) {
      if (!(preg_match("/^([a-zA-Z]+)$/", $data))) {
        return "Only letters allowed";
      }
    }

    public function checkEmail($data) {
      if (!(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $data))) {
        return "Please check email format";
      }
    }

    public function checkPassword($data) {
      if (!(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $data))) {
        return "Password must be min 8 characters including uppercase, lowercase, special character and number";
      }
    }
  }
?>