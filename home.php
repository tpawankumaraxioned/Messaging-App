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
  <h1>Inside Home Page</h1>
    <!-- <div class="data">      
      <?php

        $array = $db->show();
        
        foreach ( $array as $result ) {
          ?>
            <ul class="records">
              <li><?php echo "Id : ".$result['id'] ?></li>
              <li><?php echo "Full Name : ".$result['name'] ?></li>
              <li><?php echo "EmailId : ".$result['email'] ?></li>
              <li><?php echo "Mobile no : ".$result['mobile'] ?></li>
              <li><?php echo "City : ".$result['city'] ?></li>
              <li><?php echo "Degree : ".$result['degree'] ?></li>
              <li><?php echo "Gender : ".$result['gender'] ?></li>
              <?php 
                if ($result['sessionname'] == $_SESSION["sessionname"]) {
              ?>
              <li>
                <a href="update.php?id=<?php echo $result['id'] ?>" title="edit" class="edit" name="editPage">Edit</a> 
              </li>
              <?php 
                }
              ?>
            </ul>
          <?php
        }
      ?>
    </div> -->
  </div>
</body>
</html>