<?php

//inclure la page de connexion
include('ConnectDB.php');
//verifier si une session existe
if(!isset($_SESSION)){
   //si non demarer la session
    session_start();
}
//creer la session
if(!isset($_SESSION['panier'])){
   //s'il nexiste pas une session on créer une et on mets un tableau a l'intérieur 
    $_SESSION['panier'] = array();
}
//récupération de l'id dans le lien
if(isset($_GET['id'])){//si un id a été envoyé alors :
    $id = $_GET['id'] ;
    //verifier grace a l'id si le produit existe dans la base de  données
    $produit = mysqli_query($con ,"SELECT * FROM produit WHERE id = $id") ;
    

    $row1 = mysqli_fetch_assoc($produit);
    
    $_SESSION['produit_id'] = $row1['id'];
    $produit_id = $_SESSION['produit_id'];
    $USER_id = $_SESSION['user_id'];
    $select_cart = mysqli_query($con, "SELECT * FROM `ordre` WHERE name = '$row1[nom]' AND consommateur_id = '$USER_id'");
    if(mysqli_num_rows($select_cart) > 0){
         echo"Le Produit Eté Ajouter"; //Représente la quantité 
    }else{
        $insert = "INSERT INTO ordre (name , price , image , produit_id, consommateur_id) VALUES ('$row1[nom]','$row1[price]','$row1[image]','$produit_id','$USER_id')";
        mysqli_query($con, $insert);
    }
    
    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style3.css">


    <style>
        /*Police d'écriture*/
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500&display=swap');


*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}
body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-color: #054e05;
}
.link {
    margin: 20px;
    width: fit-content;
    position: relative;
    text-decoration: 0;
    background-color: #020b13;
    color: #fff;
    padding: 10px 25px;
    border-radius: 6px;
    font-size: 14px;
}
span {
    position: absolute;
    top: -9px;
    right: -9px;
    background-color: red;
    height: 20px;
    width: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 12px;
    color: #fff;
}


/*Panier CSS*/

.panier {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;

}
.panier img {
    width: 40px;
    padding: 8px 0;
}
.panier section {
    width: 70%;
    background-color: #fff;
    padding: 10px;
    border-radius: 6px;
}
table {
    border-collapse: collapse;
    width: 100%;
    letter-spacing: 1px;
    font-size: 13px;
}
th {
    padding: 10px 0;
    font-weight: 400;
}
td {
    border-top: 0.5px solid #999;
    text-align: center;
    color: #37a6ff;
}
tr {
    border-bottom: 0.5px solid #999;
}

.total th {
    border: 0;
    float: left;
    font-weight: 500;
    color: #37a6ff;
    padding: 10px;
}














.option-btn{
    display: inline-block;
    padding:10px 30px;
    cursor: pointer;
    font-size: 13px;
    color: white;
    border-radius: 5px;
    text-transform: capitalize;
    border: none;
    
}


.option-btn:hover{
   background-color: black;
}





.option-btn{
   background-color: orange
   ;
}
    </style>
    <link rel="stylesheet" href="css_popup.css">
</head>
<body class="panier" style="background: #fff;">
    
   
    <a href="index.php" class="link" style="background-color: green;font-size: 15px;font-weight: bolder;">View Product</a>
    <section style="box-shadow: 1px 1px 10px silver;">
        <table>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Prix Total</th>
                <th>Action</th>
            </tr>
            <?php
        $USER_id = $_SESSION['user_id'];
         $cart_query = mysqli_query($con, "SELECT * FROM `ordre` WHERE consommateur_id = '$USER_id'") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
        ?>
                <tr>
                    <td><img src="<?php echo $fetch_cart['image']; ?>" style="border-radius: 50%;"></td>
                    <td><?php echo $fetch_cart['name']; ?></td>
                    <td><?php echo $fetch_cart['price']; ?> DA</td>
                    <td>
                    
                        <form action="update_panier.php" method="post">
                            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id_o']; ?>">
                            <input type="number" min="0" max-value="200" name="cart_quantity" style="width: 40px;height: 40px;" value="<?php echo $fetch_cart['quantité']; ?>">
                            <input type="submit" name="update_cart" value="Update" class="option-btn" style="width: 40px;height: 40px;">
                        </form>
                        
                    </td>
                    <td><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantité']); ?> DA</td>
                    <td><a href="delete_panier.php?remove=<?php echo $fetch_cart['id_o']; ?>" onclick="return confirm('remove the product of panier');"><img src="images/delete.png"></a></td>
                </tr>
                <?php
                    $grand_total += $sub_total;
                    }
                    }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">Le Panier Vide</td></tr>';
            }
      ?>
           

            <tr class="total">
                <th>Total : <?php echo $grand_total; ?>DA</th>
            </tr>
            
        </table>
    </section>
    <footer style="position:relative;margin-top:50px;">
            <div>
                <a href="facture.php" style="text-decoration:none;background:red;font-size: 15px;font-weight: bolder;border-radius: 6px;color:white;padding: 10px 20px;position:absolute;margin:50px;position:relative;margin-left:0px;margin-top:50px;">Facture</a>
            </div>
    </footer>
    
    
</body>
</html>