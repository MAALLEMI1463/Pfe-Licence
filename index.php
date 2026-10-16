
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
</head>

<body>
    <!-- home section start -->
    <div class="home">
        <!-- navbar -->
        <nav class="navbar">
            <div class="logo">
                <a href="#">Farmy<span></span></a>
            </div>

            <ul class="nav-items">
                <li><a href="#top">Home</a></li>
               
                
                <li><a href="#products">Products</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>

            <form class="search-box" action="search.php" method="GET">
                
                <button class="search-icon" name="searchBtn">
                    <span class="icon-search"></span>
                </button>
                <input type="text" placeholder="Search..." name="nom">
                <!--<select autocomplete="off" required name="Cate" style="height: 2.2rem;width: 50%;color: #333;font-size: 1.2rem;border: 2px solid #fff;border-radius: 0.2rem;background: #eff;-webkit-box-shadow: 0 0 0.1rem #666;box-shadow: 0 0 0.1rem #666;outline: none;padding: 0 1rem;-webkit-box-sizing: border-box;">
                    <option value="fruit">Fruit</option>
                    <option value="legume">Legume</option>
                    <option value="lait">Lait</option>
                </select>-->
            </form>
            
            <div class="icon-links">
                <div id="search-btn"><span class="icon-search"></span></div>
                <?php
                    include('ConnectDB.php');
                    session_start();
                    $id3 = $_SESSION['user_id'];
                     $result3 = mysqli_query($con, "SELECT * FROM consommateur WHERE id_c = '$id3'");
                    $row3 = mysqli_fetch_array($result3);
                    echo"
                    <div id='login-or-signup'><a href='UpCountUser.php? id=$row3[id_c]'><span class='icon-user'></a></div>";?>
                
                <div id="icon-shopping-cart"><a href="panier.php"><span class="icon-cart-arrow-down"><span id="item-counter"></span></a></div>
                <div id="customer-center"><a href="SignOutUser.php?logout=<?php echo $id3; ?>" onclick="return confirm('Are You Sure to Leave the  Site ?');"><span class=""><ion-icon name="log-out-outline" style="position:relative;display: block;min-width: 30px; height: 30px;line-height: 75px;text-align: center;" ></ion-icon></span></a></div>
                <div id="toggle-bar"><span class="toggler"></span></div>
            </div>
        </nav>
        

        <!-- background image slider -->
        <div class="home-slider">
            <img src="img/background/1.jpg" class="bg-slider bg-slider-1 active-bg"></img>
            <img src="img/background/4.jpg" class="bg-slider bg-slider-2"></img>
            <img src="img/background/Vegetables_Cabbage_Tomatoes_Cucumbers_Mushrooms_540937_3840x2160.jpg" class="bg-slider bg-slider-3"></img>
        </div>

        <!-- slide button -->
       <!-- <div class="bg-slide-btn">
            <div class="bg-slide-left">
                <span class="icon-arrow-left"></span>
            </div>
            <div class="bg-slide-right">
                <span class="icon-arrow-right"></span>
            </div>
        </div> _>

        <!-- hero text -->
        <div id="hero">
            <h1>Eat Natural,Clean And Organic</h1>
            <p>  Purchase the best product in Algeria wih just one clic</p>
           
        </div>
    </div>
    <!-- home section end -->



    <!-- top products section start -->
    <div class="top-products">
        <div class="section-wrap">
            <div class="sub-section-title">
                <p>Top products</p>
                
            </div>

            <div class="products">
                <div class="fruit apple">
                    <div class="fruit-text">
                        <h2>Apple</h2>
                        <span>+260kg</span>
                        <p>Sales</p>
                    </div>
                </div>

                <div class="fruit mango">
                    <div class="fruit-text">
                        <h2>Mango</h2>
                        <span>+180kg</span>
                        <p>Sales</p>
                    </div>
                </div>

                <div class="fruit peach">
                    <div class="fruit-text">
                        <h2>Peach</h2>
                        <span>+160kg</span>
                        <p>Sales</p>
                    </div>
                </div>

                <div class="fruit strawberry">
                    <div class="fruit-text">
                        <h2>Strawberry</h2>
                        <span>+150kg</span>
                        <p>Sales</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top products section end -->





    <!-- featured products section start  -->
    <div class="featured-product-section" id="products">
        <div class="section-wrap">
            <!-- fruits -->
            <div class="featured-product-wrap fruits">
                <div class="sub-section-title">
                    <p>Fresh Products</p>
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
                            <div class='add-to-favorite'><a href='description.php? id=$row[id]' style='text-decoration:none;color: #fff;'><span style='font-size: 1.2rem;padding: 0.4rem 0.4rem;border-radius: 0.2rem;background: #61790a;'><ion-icon name='add-outline'></ion-icon></span></a></div>
                           
                        </div>

                        <div class='product-description'>
                            <p class='product-name'>$row[nom]</p>
                            <p class='price'>
                                <strong>Price:</strong>
                        
                                    <span class='f-product-price'>$row[price]</span> DA/kg
                        
                        
                        
                            </p>
                            <a href='ajouter_panier.php? id=$row[id]' class='add-to-cart-btn' style='text-decoration: none;'>
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
                <div class='add-to-favorite'><a href='description.php? id=$row[id]' style='text-decoration:none;color: #fff;'><span style='font-size: 1.2rem;padding: 0.4rem 0.4rem;border-radius: 0.2rem;background: #61790a;'><ion-icon name='add-outline'></ion-icon></span></a></div>
                <p><span class='discount'><strong>-</strong>$row[discount]</span> % </p>
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
                <a href='ajouter_panier.php? id=$row[id]' class='add-to-cart-btn' style='text-decoration: none;'>
                    <p><span class='icon-cart-plus'></span> Add to Cart</p>
                </a>
        
            </div>
        </div>



";} }
    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- featured products section end  -->



 





    <!-- customer review section start -->
    <div class="customer-review">
        <div class="section-wrap">
            <div class="customer-section-title">
                <p> review </p>
                <span class="icon-angle-double-right"></span>
            </div>

            <div class="review-items owl-carousel">
                
                <?php
                $ID = $_SESSION['user_id'];
                $result1 = mysqli_query($con, "SELECT * FROM comentair INNER JOIN consommateur ON comentair.id_con=consommateur.id_c");
                while($row1 = mysqli_fetch_array($result1)){
                echo"
                <div class='review-content'>
                    <div class='customer-info'>
                        
                        <div class='customer-image'>
                            <img src='img/customers/pngwing.com.png' alt='review1'>
                        </div>
                        <div class='customer-details'>
                            <h2 class='name'>$row1[username] $row1[prenom]</h2>
                            <p class='country'>$row1[wilaya]</p>
                        </div>
                    </div>

                    <div class='review-text'>
                        <p class='review'><span class='icon-quote-left'>$row1[comment]</span><span
                                class='icon-quote-right'></span></p>
                    </div>
                </div>";}
                ?>

            </div>
        </div>
    </div>
    <!-- customer review section end -->





    <!-- contact section start -->
    <div class="contact-section" id="contact">
        <div class="image-area"></div>
        <div class="form-area">
            <div class="form-wrap">
                <div class="title">
                    <h1>Comment</h1>
                </div>

                <div class="contact-area">
                    <div class="contact-info">
                        <h2>Information</h2>
                        <div class="contact-address">
                            <span class="icon-map-marked-alt"></span>
                            <p>15, Rue El bey khaled ,<br>
                                    blida</p>
                        </div>

                        <div class="contact-mail">
                            <span class="icon-envelope"></span>
                            <p>rhadjalla@gmail.com</p>
                        </div>

                        <div class="contact-phone">
                            <span class="icon-phone-alt"></span>
                            <p>06-67-96-17-96</p>
                        </div>
                    </div>

                    <form class="contact-form" action="Comentaire.php" method="post">
                        

                    <div class="input-area">
                            <select id="email" autocomplete="off" required name="Wilaya" style="height: 3rem;width: 100%;color: #333;font-size: 1.2rem;border: 2px solid #fff;border-radius: 0.2rem;background: #eff;-webkit-box-shadow: 0 0 0.1rem #666;box-shadow: 0 0 0.1rem #666;outline: none;padding: 0 1rem;-webkit-box-sizing: border-box;">
                                <option value="Tipaza">Tipaza</option>
                                <option value="Alger">Alger</option>
                                <option value="Oran">Oran</option>
                                <option value="Blida">Blida</option>
                            </select>
                           <!-- <label for="email">Wilaya</label> -->
                        </div>

                        <div class="message-area">
                            <textarea id="message" required name="message"></textarea>
                            <label for="message">Message</label>
                        </div>

                        <div class="btn">
                            <button type="submit" name="btnMess">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- contact section end -->





    <!-- footer section start -->
    <!-- <div id="footer">
        <!-- subscribe area start -->
          <!--<div class="subscribe-area">
            <div class="section-wrap">
                <div class="subscribe-wrap">
                    <div class="subscribe-text">
                        <p>Subscribe to get all product updates first</p>
                    </div>
                    <form class="subscribe-input">
                        
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div> -->
        <!-- subscribe area end -->



        <!-- footer navigation area start -->
        <div class="section-footer">
            <div class="section-wrap">
                <div class="footer-wrap">
                    <div class="company-details">
                        <h2>Farmy</h2>

                        <div class="fdetails">
                            <p> The First Organice Marketplace In Algeria</p>
                        </div>

                        <div class="social-media-links">
                            <div class="f-links">
                                <a href="#"><span class="icon-facebook-f"></span></a>
                            </div>

                            <div class="f-links">
                                <a href="#"><span class="icon-instagram"></span></a>
                            </div>

                            <div class="f-links">
                                <a href="#"><span class="icon-linkedin-in"></span></a>
                            </div>

                            <div class="f-links">
                                <a href="#"><span class="icon-twitter"></span></a>
                            </div>

                            <div class="f-links">
                                <a href="#"><span class="icon-telegram-plane"></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="footer-menu">
                        <h2>Menu</h2>
                        <div class="fmenu">
                            <p><a href="#top">Home</a></p>
                            <p><a href="#products">Products</a></p>
                            <p><a href="#contact">Contact</a></p>
                        </div>
                    </div>

                    <div class="top-products-links">
                        <h2>Top Products</h2>
                        <div class="flinks">
                            <p><a href="#products">Apple</a></p>
                            <p><a href="#products">Grapes</a></p>
                            <p><a href="#products">Mangos</a></p>
                            <p><a href="#products">Oranges</a></p>
                            <p><a href="#products">Pinapple</a></p>
                        </div>
                    </div>

                    <div class="useful-links">
                        <h2>Quick Links</h2>
                        <div class="Qlinks">
                            <p><a href="#">User Account</a></p>
                            <p><a href="#">Become An Affilate</a></p>
                            <p><a href="#">New Offer</a></p>
                            <p><a href="#">Recent Blogs</a></p>
                            <p><a href="#">Help</a></p>
                        </div>
                    </div>

                    <div class="master-cards">
                        <h2> Cach on dilevry</h2>
                        <div class="payment-cards">
                            <p>Pay When The Product Arrive To Ur Home</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer navigation area end -->



        <!-- copyright area start -->
        <footer>
             <p>PFE 2023 <a href="">Riadh & Madjid</a> </p>
        </footer>
        <!-- copyright area end -->
    </div>
    <!-- footer section end -->



    <!-- owl carousel cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- external plugins script -->
    <script src="js/library.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- custom script -->
    <script src="js/script.js"></script>

</body>

</html>