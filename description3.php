<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Product Details</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap');

:root {
    --primary-color: #90e0ef;
    --secondary-color: #00b4d5;
    --tertiary-color: #0077b6;
    --yellow-color: #ffb900;
    --gray-color: #808080;
}

* {
    box-sizing: border-box;
    font-family: 'Source Sans Pro', sans-serif;
    line-height: 1;
    padding: 0;
    margin: 0;
}

.container {
    background-color: var(--primary-color);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.box {
    background-color: white;
    border-radius: 10px;
    box-shadow: 5px 5px 10px 1px rgb(0, 0, 0, 12%);
    padding: 45px;
    margin: 15px 0;
    width: 950px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: auto 1fr;
    grid-template-areas: 
    "images info"
    "images description";
    grid-gap: 35px;
}

.box .images {
    grid-area: images;
    display: grid;
    grid-template-columns: repeat(3, auto);
    grid-template-rows: auto 1fr;
    grid-template-areas: 
    "active active active"
    "idle idle idle";
    grid-gap: 5px;
}

.box .images .img-holder img {
    width: 100%;
    display: block;
    border-radius: 10px;
}

.box .images .img-holder.active {
    grid-area: active;
}

.box .images .img-holder:not(.active):hover {
    opacity: 0.95;
    cursor: pointer;
}

.box .basic-info {
    grid-area: info;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.box .basic-info .rate {
    color: var(--yellow-color);
}

.box .basic-info span {
    font-weight: 800;
    font-size: 25px;
}

.box .basic-info .options a {
    color: white;
    background-color: var(--secondary-color);
    display: inline-block;
    padding: 10px 15px;
    text-decoration: none;
    font-weight: 600;
    font-size: 12px;
    border-radius: 5px;
}

.box .basic-info .options a:hover {
    background-color: var(--tertiary-color);
}

.box .description {
    grid-area: description;
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.box .description p {
    color: var(--gray-color);
    font-size: 14px;
    line-height: 1.5;
}

.box .description .features {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 10px;
    color: var(--gray-color);
}

.box .description .features i {
    margin-right: 5px;
}

.box .description .features .fa-circle-check {
    color: var(--tertiary-color);
}

.box .description .features .fa-circle-xmark {
    color: var(--yellow-color);
}

.box .description .social {
    list-style: none;
    display: flex;
}

.box .description .social a {
    margin-right: 15px;
    color: var(--gray-color);
}

.box .description .social a:hover {
    color: var(--secondary-color);
}

@media (max-width: 991px) {
    .box {
        width: 750px;
        grid-template-areas: 
        "info info"
        "images description";
    }
    .box .basic-info .options a {
        padding: 8.5px 12px;
    }
}

@media screen and (max-width: 991px) and (min-width: 769px) {
    .box .basic-info span {
        position: absolute;
        align-self: flex-end;
    }
    .box .basic-info .options {
        position: absolute;
        align-self: flex-end;
        margin-top: 40px;
    }
}

@media (max-width: 768px) {
    .box {
        width: 600px;
        grid-template-areas: 
        "images info"
        "description description";
    }
    .box .images {
        gap: 3px;
    }
    .box .images .img-holder img {
        border-radius: 5px;
    }
}

@media (max-width: 640px) {
    .box {
        width: 100%;
        min-height: 100vh;
        border-radius: 0;
        padding: 35px;
        margin: 0;
        grid-template-columns: 1fr;
        grid-template-rows: repeat(3, auto);
        grid-template-areas: 
        "images"
        "info"
        "description";
    }
}

    </style>
</head>
<body>
<?php

include('ConnectDB.php');
$ID = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM produit INNER JOIN categorie ON produit.id_categoriee=categorie.id_cat WHERE id=$ID");
while($row = mysqli_fetch_array($result)){
    if($row['discount'] == NULL){
 echo"
    <div class='container'>
        <div class='box'>
            <div class='images'>
                <div class='img-holder active'>
                    <img src='$row[image]'>
                </div>
               
            </div>
            <div class='basic-info'>
                <h1>$row[nom]</h1>
                <div class='rate'>
                    <i class='filled fas fa-star'></i>
                    <i class='filled fas fa-star'></i>
                    <i class='filled fas fa-star'></i>
                    <i class='filled fas fa-star'></i>
                    <i class='filled fas fa-star'></i>
                </div>
                <p style='font-size:20px;'>$row[price] DZD</p>
                
                <h3>Categorie:<span style='font-size:15px;'> $row[name_c]</span> </h3>
                
            </div>
            <div class='description'>
                <p>$row[decript].</p>
                
                <ul class='social'>
                    <li><a href='#'><i class='fa-brands fa-facebook-f'></i></a></li>
                    <li><a href='#'><i class='fa-brands fa-instagram'></i></a></li>
                    <li><a href='#'><i class='fa-brands fa-twitter'></i></a></li>
                </ul>
            </div>
        </div>
    </div>";}elseif($row['discount'] !== NULL){
        $prix = ($row['price'] * (100 - $row['discount']) / 100);
        echo"
    <div class='container'>
        <div class='box'>
            <div class='images'>
                <div class='img-holder active'>
                    <img src='$row[image]'>
                </div>
               
            </div>
            <div class='basic-info'>
                <h1>$row[nom]</h1>
                <div class='rate'>
                    <i class='filled fas fa-star'></i>
                    <i class='filled fas fa-star'></i>
                    <i class='filled fas fa-star'></i>
                    <i class='filled fas fa-star'></i>
                    <i class='filled fas fa-star'></i>
                </div>
                <div><span style='font-size:15px;'>Discount:</span> $row[discount]%</div>
                <p><del style='font-size:20px;color:red;'>$row[price] DZD</del> $prix DZD</p>
                
                <h3>Categorie:<span style='font-size:15px;'> fruit</span> </h3>
                
            </div>
            <div class='description'>
                <p>$row[decript].</p>
                
                <ul class='social'>
                    <li><a href='#'><i class='fa-brands fa-facebook-f'></i></a></li>
                    <li><a href='#'><i class='fa-brands fa-instagram'></i></a></li>
                    <li><a href='#'><i class='fa-brands fa-twitter'></i></a></li>
                </ul>
            </div>
        </div>
    </div>";}
    }
    ?>
</body>
</html>