

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
      
            <ul class="records">
              <li><?php echo "Full Name : ".$result['name'] ?></li>
              <li><?php echo "EmailId : ".$result['emailid'] ?></li>
              <li><?php echo "Gender : ".$result['gender'] ?></li>
              <li>
                <a href="message.php?id=<?php echo $result['id'] ?>" title="chat" class="chatMsgBtn" name="editPage">
                <?php echo "Chat with ".$result['name']; ?>
              </a>
              </li>
            </ul>
          
    </div>
  </div>
</body>
</html>