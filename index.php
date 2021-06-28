<?php

  session_start();

  if (isset($_SESSION["sessionname"]) && isset($_SESSION["id"])) {
    header("location: home.php");
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
    <?php include "helper/loginValidation.php"; ?>
    <!--container starts here-->
    <div class="container">
      <form id="loginform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="emailId">
          <label for="emailid">E-mail:</label>
          <input type="text" id="emailid" name="emailid" value='<?php if ($_POST) { echo $_POST["emailid"]; } 
          elseif (isset($_COOKIE["emailId"])) { echo $_COOKIE["emailId"]; } else { echo ''; } ?>'>
          <span class="error"><?php echo $validate->emailError; ?></span>
        </div>
        <div class="loginpassword">
          <label for="loginpwd">Password:</label>
          <input type="password" id="loginpwd" name="loginpwd" >
          <span class="error"><?php echo $validate->pwdError; ?></span>
        </div>
        <input type="checkbox" name="remember" id="rememberme" class="rememberbox" name="remember" <?php if (isset($_COOKIE["emailId"])) { echo "checked"; } ?>>
        <label for="rememberme">Remember me</label>
        <input type="submit" name="login" value="Login">  
      </form>
      <span>Don't have an account <a href="registration.php" class="signup" title="registration">Sign up now.</a></span>
    </div>
    <!--container ends here-->
  </body>
</html>