<?php
  session_start();

  if (!isset($_SESSION["sessionname"]) && !isset($_SESSION["id"])) {
    header("location:index.php");
  }
  
  include 'Database/database.php';
  $db = new Database();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" media="screen" href="assets/css/style.css" >
</head>
<body>
  <a href="logout.php" class="logoutbtn" title="logout">Logout</a>  
  <div class="container">

    <div class="chathistory">
      
    </div>

    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="chatbox">
        <textarea name="messagebox" id="msg" cols="30" rows="10"></textarea>
      </div>
      <input type="submit" name="login" value="Send">
    </form>
    <a href="home.php" class="loginpage" title="cancel">Cancel</a>
  </div>
</body>
</html>