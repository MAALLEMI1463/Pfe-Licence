<?php

include('ConnectDB.php');

if(isset($_POST['btnMess'])){
    $Wilaya = $_POST['Wilaya'];
    $Message = $_POST['message'];
    
    session_start();
    $id = $_SESSION['user_id'];

    $insert = "INSERT INTO comentair (comment , wilaya , id_con) VALUES ('$Message','$Wilaya','$id')";
    mysqli_query($con, $insert);
    header('location: index.php#contact');
}
?>