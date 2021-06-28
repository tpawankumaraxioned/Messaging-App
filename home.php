<?php
  session_start();

  if (!isset($_SESSION["sessionname"]) && !isset($_SESSION["id"])) {
    header("location:index.php");
  }
  
  include 'database/database.php';
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
    <div class="data">      
      <?php
        
        $userRecord = $db->showUser($_SESSION["sessionname"]);
        
        foreach ( $userRecord as $result ) {
          ?>
            <ul class="records">
              <li><?php echo "Full Name : ".$result['name'] ?></li>
              <li><?php echo "EmailId : ".$result['emailid'] ?></li>
              <li><?php echo "Gender : ".$result['gender'] ?></li>
              <li>
                <a href="message.php?emailid=<?php echo $result['emailid'] ?>" title="chat" class="chatMsgBtn" name="editPage">
                <?php echo "Chat with ".$result['name']; ?>
              </a>
              </li>
            </ul>
          <?php
        }
      ?>
    </div>
  </div>
</body>
</html>