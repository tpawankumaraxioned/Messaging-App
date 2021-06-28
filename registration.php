<?php

  session_start();

  error_reporting(E_ERROR | E_PARSE);

  if (isset($_SESSION["sessionname"]) && isset($_SESSION["id"])) {
    header("location:home.php");
  }

?>
<!doctype html>
<!-- If multi-language site, reconsider usage of html lang declaration here. -->
<html lang="en"> 
  <head>
    <meta charset="utf-8">
    <title>Registration Page</title>
    <!-- 120 word description for SEO purposes goes here. Note: Usage of lang tag. -->
    <meta name="description" lang="en" content="">
    <!-- Keywords to help with SEO go here. Note: Usage of lang tag.  -->
    <meta name="keywords" lang="en" content="">
    <!-- View-port Basics: http://mzl.la/VYREaP -->
    <!-- This meta tag is used for mobile device to display the page without any zooming,
        so how much the device is able to fit on the screen is what's shown initially. 
        Remove comments from this tag, when you want to apply media queries to the website. -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- To adhear no-cache for Chrome -->
    <!-- <meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate" />
    <meta http-equiv="Pragma" content="no-store, no-cache" />
    <meta http-equiv="Expires" content="0" /> -->
    <!-- Place favicon.ico in the root directory: mathiasbynens.be/notes/touch-icons -->
    <link rel="shortcut icon" href="favicon.ico" />
    <!--font-awesome link for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Default style-sheet is for 'media' type screen (color computer display).  -->
    <link rel="stylesheet" media="screen" href="assets/css/style.css" >
  </head>
  <body>
    <?php include "helper/registrationValidation.php"; ?>
    <!--container starts here-->
    <div class="container">
      <form id="registrationForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "post">
        <div class="userName"> 
          <label for="username">Name:</label>
          <input type="text" id="username" name="username" value='<?php if (isset($_POST["username"]) ) { echo $_POST["username"]; } else { echo ''; }?>'>
          <span class="error"><?php echo $validate->nameError; ?></span>
        </div>
        <div class="emailId">
          <label for="emailid">E-mail:</label>
          <input type="text" id="emailid" name="email" value='<?php if (isset($_POST["email"])) { echo $_POST["email"]; } else { echo ''; }?>'>
          <span class="error"><?php echo $validate->emailError; ?></span>
        </div>
        <div class="gen">
          <label>Gender:</label>
          <input type="radio" name="gender" id="male" value="male" <?php if (isset($_POST["gender"]) && $_POST["gender"] == 'male' ) { echo "checked"; } else { echo ''; }?>>
          <label for="male">Male</label>
          <input type="radio" name="gender" id="female" value="female" <?php if (isset($_POST["gender"]) && $_POST["gender"] == 'female' ) { echo "checked"; } else { echo ''; }?>>
          <label for="female">Female</label>
          <input type="radio" name="gender" id="other" value="other" <?php if (isset($_POST["gender"]) && $_POST["gender"] == 'other' ) { echo "checked"; } else { echo ''; }?>>
          <label for="other">Other</label>
          <span class="error"><?php echo $validate->genderError; ?></span>
        </div>
        <div class="password">
          <label for="pwd">Password:</label>
          <input type="password" id="pwd" name="pwd" >
          <span class="error"><?php echo $validate->pwdError; ?></span>
        </div>
        <div class="confirmPassword">
          <label for="repwd">Retype Password:</label>
          <input type="password" id="repwd" name="confirmpwd" >
          <span class="error"><?php echo $validate->confirmpwdError; ?></span>
        </div>
        <input type="submit" name="submit" value="Submit">
      </form>
      <a href="index.php" class="loginpage" title="login">Login</a>
    </div>
    <!--container ends here-->
  </body>
</html>
