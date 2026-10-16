<?php

include('ConnectDB.php');

if(isset($_POST['update'])){
    $ID = $_POST['id1'];
    $NAME = $_POST['name'];
    $prename = $_POST['prename'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Adresse = $_POST['Adresse'];
    
    $update = "UPDATE consommateur SET username='$NAME' , PASSWORD='$password' , prenom='$prename' , email='$email' , adress='$Adresse' WHERE consommateur.id_c = $ID";
    mysqli_query($con, $update);
    header('location: index.php');
}

?>