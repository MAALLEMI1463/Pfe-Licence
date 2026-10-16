<?php

include('ConnectDB.php');

if(isset($_POST['update'])){
    $ID = $_POST['id'];
    $NAME = $_POST['name'];
    $prename = $_POST['prename'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Adresse = $_POST['Adresse'];
    
    $update = "UPDATE admin SET username='$NAME' , password='$password' , prenome='$prename' , email='$email' , adress='$Adresse' WHERE id_a=$ID";
    mysqli_query($con, $update);
    header('location: dash.php');
    
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custome css  -->
    <link rel="stylesheet" href="upCount.css">
    <title>Registration</title>
</head>

<body>
    <?php
    include('ConnectDB.php');
    
    $ID=$_GET['id'];
    $up = mysqli_query($con, "select * from admin where id_a = $ID");
    $data = mysqli_fetch_array($up);

?>
    <section class="wrapper">
      <div class="form signup">
        <header>My Information</header>
        <form action="" method="post">
          <input type="hidden" type="hidden" name="id"  value='<?php echo $data['id_a']?>' />
          <input type="text" placeholder="enter name" required name="name" value='<?php echo $data['username']?>' />
          <input type="text" placeholder="enter prenom" required name="prename"  value='<?php echo $data['prenome']?>' />
          <input type="email" placeholder="Email Address" required name="email" value='<?php echo $data['email']?>' />
          <input type="text" placeholder="Password" required  name="password" value='<?php echo $data['password']?>' />
          <input type="text" placeholder="enter Adresse" required name="Adresse" value='<?php echo $data['adress']?>' />

          
          <input type="submit" name="update" value="Modifier" style="background: green;color:white;" />
        </form>
      </div>

     
      
    </section>

    
</body>



</html>