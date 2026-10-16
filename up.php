<?php

include('ConnectDB.php');

if(isset($_POST['update'])){
    $ID = $_POST['id'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $Discount = $_POST['discount'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up = "images/".$image_name; 
    session_start();
    
    $Admin_id = $_SESSION['admin_id'];
    $update = "UPDATE produit SET nom='$NAME' , price='$PRICE' , image='$image_up', discount='$Discount' , admin_id='$Admin_id' WHERE id=$ID";
    mysqli_query($con, $update);
    if(move_uploaded_file($image_location,'images/'.$image_name)){
        echo"<script>alert('Product Update')</script>";
    }else{
        echo"<script>alert('Product Not Update')</script>";
    }
    header('location: AdminAfichagProd.php');
}
?>