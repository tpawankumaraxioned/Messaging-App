<?php

  include "helper/user.php";
  include "helper/validationForm.php";

  $user = new User();
  $validate = new ValidateForm();

  if (isset($_POST['login'])) {

    $user->setEmailid($_POST["emailid"]);
    $user->setPassword($_POST["loginpwd"]);
    
    $validate->loginValidation($user);
    if (empty($validate->emailError) && empty($validate->pwdError)) {
      
      $validate->loginData($user);
      if (isset($_POST['remember'])) {
        setcookie("emailId", $user->getEmail(), time() + 3600);
      }
    }
  }

  if (!empty($_COOKIE['emailId'])) {
    session_start();
    $_SESSION["sessionname"] = $_COOKIE['emailId'];
    header("location:home.php");
  }
?>