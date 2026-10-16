<?php
$flag1 = '';
include('ConnectDB.php');
session_start();
 if(isset($_POST['LOGIN'])){

    
    $email = $_POST['Email'];
    $pass = $_POST['password'];
    
   
 
    $select = mysqli_query($con, "SELECT * FROM `admin` WHERE email = '$email' AND password = '$pass'") or die('query failed');


   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['admin_id'] = $row['id_a'];
      header('location:dash.php');
   }else{
    $flag1 = '0';
      
   }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <!-- partial:index.partial.html -->
<div class="page">
  <div class="container">
    <div class="left">
      <div class="login">ADMIN</div>
      <div class="eula">Hello To Your Administration Board</div>
    </div>
    <div class="right">
      
      <form class="form" action="" method="post">
        <label for="email">Username</label>
        <input type="email" placeholder="Enter Email" id="email" required name="Email">
        <label for="password" >Password</label>
        <input type="password" placeholder="Enter Password" id="password" required name="password">
        <input type="submit" id="submit" value="Submit" name="LOGIN">
        <?php
                if($flag1 == '0'){
                    echo"<li style='text-center;color:red;margin: 15px;padding:20px;'>Email or password error</li>";
                    }
                ?>
      </form>
    </div>
  </div>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js'></script><script  src="scriptAdmin.js"></script>






</body>
</html>