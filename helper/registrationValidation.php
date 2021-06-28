<?php

  include "helper/user.php";
  include "helper/validationForm.php";

  $validate = new ValidateForm();

  if (isset($_POST['submit'])) {
    $user = new User();

    $user->setName($_POST["username"]);

    $dataPresent = $databaseObj->select($_POST["email"]);
  
    if ($_POST["email"] == $dataPresent['emailid']) {
      $validate->emailError = "Please Enter Different EmailId";
    } else {
      $user->setEmailid($_POST["email"]);
    }

    if (isset($_POST["gender"])) {
      $user->setGender($_POST["gender"]);
    }

    $user->setPassword($_POST["pwd"]);
    $user->setConfirmPassword($_POST["confirmpwd"]);
    
    $hashPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);

    if ($validate->dataValidation($user,1))
    {
      $databaseObj->insert($user, $hashPassword);
      echo "Record Inserted Successfully";
      $_POST["username"] = "";
      $_POST["email"] = "";
      $_POST["gender"] = "";
    }
  }

?>