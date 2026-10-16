<?php

include('ConnectDB.php');

if(isset($_POST['upload'])){
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $Stock = $_POST['stock'];
    $Descript = $_POST['description'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up = "images/".$image_name;
    $categ = $_POST['categ'];
    $categorie = mysqli_query($con, "SELECT * FROM categorie WHERE name_c='$categ'") or die('query failed');
    $row1 = mysqli_fetch_assoc($categorie);
    session_start();
    
    $Admin_id = $_SESSION['admin_id'];
    $insert = "INSERT INTO produit (nom , price , image , stock , decript , admin_id, id_categoriee) VALUES ('$NAME','$PRICE','$image_up','$Stock','$Descript','$Admin_id','$row1[id_cat]')";
    mysqli_query($con, $insert);

   // $row = mysqli_fetch_assoc($res);
     //   $_SESSION['produit_id'] = $row['id'];
      //  $prod_id = $row['id'];
  //  $insert1 = "INSERT INTO categorie (nom , produit_id) VALUES ('$categorie','$prod_id')";
   // mysqli_query($con, $insert1);
    if(move_uploaded_file($image_location,'images/'.$image_name)){
        echo"<script>alert('Product Upload')</script>";
    }else{
        echo"<script>alert('Product Not Upload')</script>";
    }
    header('location: add_product.php');
}
?>