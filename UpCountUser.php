<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Login & Signup Form</title>
    <link rel="stylesheet" href="upCount.css" />
  </head>
  <body>
  <?php
    include('ConnectDB.php');
    
    $ID=$_GET['id'];
    $up = mysqli_query($con, "select * from consommateur where id_c = $ID");
    $data = mysqli_fetch_array($up);

?>

    <section class="wrapper">
      <div class="form signup">
        <header>My Information</header>
        <form action="up2.php" method="post">
          <input type="hidden" placeholder="enter id" name="id1" value='<?php echo $data['id_c']?>' />
          <input type="text" placeholder="enter name" name="name" required  value='<?php echo $data['username']?>' />
          <input type="text" placeholder="enter prenom" name="prename"  value='<?php echo $data['prenom']?>' />
          <input type="email" placeholder="Email Address" name="email" required  value='<?php echo $data['email']?>' />
          <input type="text" placeholder="Password" name="password" required  value='<?php echo $data['PASSWORD']?>' />
          <input type="text" placeholder="enter Adresse" name="Adresse" required value='<?php echo $data['adress']?>' />

          
          <input type="submit" value="Modifier" name="update" style="background: green;color:white;" />
        </form>
      </div>

     
      
    </section>
  </body>
</html>