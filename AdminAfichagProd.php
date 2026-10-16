<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">

    <!-- owl carousel cnd link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Fruty</title>
    <style>
    .featured-products {
        padding-top: 1rem;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        width: 100%;
        height: auto;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: start;
    }

.product-wrap {
    margin: 0 0.7rem 2rem 0.6rem;
    position: relative;
    height: 400px;
    width: 260px;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 0.2rem;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
    -webkit-box-shadow: 0.6rem 0.6rem 1rem #ddd;
    box-shadow: 0.6rem 0.6rem 1rem #ddd;
}

.product-wrap:hover {
    -webkit-box-shadow: 0.6rem 0.6rem 1rem silver;
    box-shadow: 0.6rem 0.6rem 1rem silver;
}

.product-wrap .product-img {
    position: relative;
    width: 100%;
    height: 55%;
    border: 2px solid #fff;
    border-radius: 0.2rem 0.2rem 0.6rem 0.6rem;
}

.product-wrap .product-img::before {
    position: absolute;
    content: '';
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: rgba(0, 0, 0, 0.4);
    border-radius: 0.2rem 0.2rem 0.8rem 0.8rem;
}

.product-wrap .product-img img {
    height: 100%;
    width: 100%;
    -o-object-fit: cover;
    object-fit: cover;
    border-radius: 0.2rem 0.2rem 0.8rem 0.8rem;
}

.product-wrap .product-icons {
    position: absolute;
    top: 0;
    left: 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
}

.product-icons>.add-to-favorite {
    margin: 1rem 0 0 1rem;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    text-decoration: none;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.product-icons>.add-to-favorite>span {
    color: #fff;
    cursor: pointer;
    font-size: 1.2rem;
    padding: 0.4rem 0.4rem;
    border-radius: 0.2rem;
    background: #61790a;
    -webkit-box-shadow: 0.2rem 0.2rem 1rem #211e25;
    box-shadow: 0.2rem 0.2rem 1rem #211e25;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.product-icons>.add-to-favorite>span:active {
    -webkit-transform: scale(0.94);
    -ms-transform: scale(0.94);
    transform: scale(0.94);
}

.product-icons>p {
    margin: 1rem 1rem 0 0;
    padding: 0.4rem 0.6rem;
    color: #fff;
    font-size: 1.1rem;
    background: -o-linear-gradient(45deg, orangered 20%, red, red);
    background: linear-gradient(45deg, orangered 20%, red, red);
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-box-shadow: 0.2rem 0.2rem 1rem #211e25;
    box-shadow: 0.2rem 0.2rem 1rem #211e25;
    border-radius: 0.2rem;
    font-family: 'Ubuntu', sans-serif;
}

.product-wrap .product-description {
    margin-top: 0.4rem;
    padding: 0.8rem;
    width: 100%;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.product-wrap .product-description .product-name {
    color: #211e25;
    font-size: 1.4rem;
    font-weight: bold;
    text-align: center;
}

.product-wrap .product-description>.price {
    font-size: 1.1rem;
}

.product-description .price {
    margin-top: 0.6rem;
    text-align: center;
    color: #211e25;
    font-size: 1.2rem;
    font-weight: 600;
}

.product-description .price .f-product-unit {
    display: none;
}

.product-description .add-to-cart-btn {
    margin-top: 0.8rem;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    cursor: pointer;
}
.product-description .add-to-cart-btn a {
    color: #fff;
    font-size: 1rem;
    font-family: 'Ubuntu', sans-serif;
    text-align: center;
    text-decoration: none;
    padding: 0.4rem 0.8rem;
    border-radius: 0.3rem;
    background: #f02805;
}

#pricing.menu-active {
    padding-top: 3.4rem;
}
.
    </style>
</head>
<body>
    <center>
        <h1>Manage product</h1>
    </center>
    <div class="featured-product-section" id="products">
        <div class="section-wrap">
            <!-- fruits -->
            <div class="featured-product-wrap fruits">
                <div class="sub-section-title">
                    <p>Fresh Fruits</p>
                </div>
                <div class='featured-products'>
                    <?php
                    include('ConnectDB.php');
                     $result = mysqli_query($con, "SELECT * FROM produit");
                    while($row = mysqli_fetch_array($result)){
                        if($row['discount'] == NULL){
                    echo"
                
                
                    <div class='product-wrap apple'>
                        <div class='product-img'>
                            <img src='$row[image]'>
                        </div>

                        <div class='product-icons'>
                            <div class='add-to-favorite'><a href='description3.php? id=$row[id]' style='text-decoration:none;color: #fff;'><span style='font-size: 1.2rem;padding: 0.4rem 0.4rem;border-radius: 0.2rem;background: #61790a;'><ion-icon name='add-outline'></ion-icon></span></a></div>
                            
                        </div>

                        <div class='product-description'>
                            <p class='product-name'>$row[nom]</p>
                            <p class='price'>
                                <strong>Price:</strong>
                        
                                    <span class='f-product-price'>$row[price]</span> DA/kg
                        
                            </p>
                            <div class='add-to-cart-btn bb'>
                                <a href='update.php? id=$row[id]' style='background: blue;'><span></span>Update</a>
                            </div>
                            <div class='add-to-cart-btn'>
                                <a href='delete.php? id=$row[id]'><span></span>Remove</a>
                            </div>
                        </div>
                    </div>

       
                
                
                "; }
            elseif($row['discount'] !== NULL){
                $prix = ($row['price'] * (100 - $row['discount']) / 100);
                echo"
                
                
                    <div class='product-wrap apple'>
                        <div class='product-img'>
                            <img src='$row[image]'>
                        </div>

                        <div class='product-icons'>
                            <div class='add-to-favorite'><a href='description3.php? id=$row[id]' style='text-decoration:none;color: #fff;'><span style='font-size: 1.2rem;padding: 0.4rem 0.4rem;border-radius: 0.2rem;background: #61790a;'><ion-icon name='add-outline'></ion-icon></span></a></div>
                            <p> - <span class='discount'>$row[discount]</span> %</p>
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
                            <div class='add-to-cart-btn bb'>
                                <a href='update.php? id=$row[id]' style='background: blue;'><span></span>Update</a>
                            </div>
                            <div class='add-to-cart-btn'>
                                <a href='delete.php? id=$row[id]'><span></span>Remove</a>
                            </div>
                        </div>
                    </div>

       
                
                
                ";
            }}
                ?>
                </div>
            </div>
        </div>
    </div>
  
    <footer style="background:white; border:none;">
        <a href="add_product.php" text-center style="text-decoration:none;background:green;color:white;padding: 10px;margin:10px;margin-bottom:40px;border-radius:10px;">Ajouter Produit</a>
    </footer>  
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>