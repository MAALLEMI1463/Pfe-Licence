<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    
        <div class='featured-products'>
<?php
include('ConnectDB.php');

if(isset($_GET['searchBtn'])){
$Name = $_GET['nom'];
//$cate = $_GET['Cate'];
$searchvalue = "%" . $_GET['nom'] . "%";
//$searchvalue1 = "%" . $_GET['Cate'] . "%";
$query = "SELECT * FROM produit INNER JOIN categorie ON produit.id_categoriee=categorie.id_cat  WHERE nom LIKE '$searchvalue%'";
    $res = mysqli_query($con,$query);
    if(mysqli_num_rows($res) > 0){while($row = mysqli_fetch_array($res)){
        if($row['discount'] == NULL){
            echo"


            <div class='product-wrap apple'>
                <div class='product-img'>
                    <img src='$row[image]'>
                </div>

                <div class='product-icons'>
                    <div class='add-to-favorite'><a href='description2.php? id=$row[id]' style='text-decoration:none;color: #fff;'><span style='font-size: 1.2rem;padding: 0.4rem 0.4rem;border-radius: 0.2rem;background: #61790a;'><ion-icon name='add-outline'></ion-icon></span></a></div>
                   
                </div>

                <div class='product-description'>
                    <p class='product-name'>$row[nom]</p>
                    <p class='price'>
                        <strong>Price:</strong>
                
                            <span class='f-product-price'>$row[price]</span> DA/kg
                
                
                
                    </p>
                    <a href='#' class='add-to-cart-btn' style='text-decoration: none;'>
                        <p><span class='icon-cart-plus'></span> Add to Cart</p>
                    </a>
            
                </div>
            </div>



";}
elseif($row['discount'] !== NULL){
$prix = ($row['price'] * (100 - $row['discount']) / 100);
echo"


<div class='product-wrap apple'>
    <div class='product-img'>
        <img src='$row[image]'>
    </div>

    <div class='product-icons'>
        <div class='add-to-favorite'><a href='description2.php? id=$row[id]' style='text-decoration:none;color: #fff;'><span  style='font-size: 1.2rem;padding: 0.4rem 0.4rem;border-radius: 0.2rem;background: #61790a;'><ion-icon name='add-outline'></ion-icon></span></a></div>
        <p><span class='discount'>$row[discount]</span> % off</p>
    </div>

    <div class='product-description'>
        <p class='product-name'>$row[nom]</p>
        <p class='price'>
            <strong>Price:</strong>
            <span class='f-product-price'>$prix</span> DA/kg
            <br>
            <del style='color:red;'>
            <span class='f-product-price'>$row[price]</span> DA/kg
            </del>
    
        </p>
        <a href='#' class='add-to-cart-btn' style='text-decoration: none;'>
            <p><span class='icon-cart-plus'></span> Add to Cart</p>
        </a>

    </div>
</div>



";} } }
else echo"<h2 style='margin-left:40%;'>Product Not Found!</h2>";}
?>
    
        </div>
        
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>