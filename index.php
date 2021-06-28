<!doctype html>
<!-- If multi-language site, reconsider usage of html lang declaration here. -->
<html lang="en"> 
  <head>
    <meta charset="utf-8">
    <title>Client</title>
  
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
    <!--container starts here-->
    <div class="container">
      <form id="registrationForm" action="#FIXME" method= "post">
        <div class="userName"> 
          <label for="uname">Name:</label>
          <input type="text" id="username" name="name" >
          <span class="error"></span>
        </div>
        <div class="emailId">
          <label for="emailid">E-mail:</label>
          <input type="text" id="emailid" name="email" >
          <span class="error"></span>
        </div>
        <div class="gen">
          <label>Gender:</label>
          <input type="radio" name="gender" id="male" value="male" ><label for="male">Male</label>
          <input type="radio" name="gender" id="female" value="female" ><label for="female">Female</label>
          <input type="radio" name="gender" id="other" value="other" ><label for="other">Other</label>
          <span class="error"></span>
        </div>
        <div class="password">
          <label for="pwd">Password:</label>
          <input type="password" id="pwd" name="pwd" >
          <span class="error"></span>
        </div>
        <div class="confirmPassword">
          <label for="repwd">Retype Password:</label>
          <input type="password" id="repwd" name="confirmpwd" >
          <span class="error"></span>
        </div>
        <input type="submit" name="submit" value="Submit">
      </form>
      <a href="login.php" class="loginpage" title="login">Login</a>
    </div>
    <!--container ends here-->
  </body>
</html>
