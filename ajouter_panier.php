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
        //echo "le produit eté ajouter"; //Représente la quantité
        ?><script>alert("le produit eté ajouter");</script><?php
        header('location: index.php#products');
    }else{
        $insert = "INSERT INTO ordre (name , price , image , produit_id, consommateur_id) VALUES ('$row1[nom]','$row1[price]','$row1[image]','$produit_id','$USER_id')";
        mysqli_query($con, $insert);

    $select2 = mysqli_query($con, "SELECT * FROM `ordre` WHERE produit_id = '$produit_id'") or die('query failed');


    
    if(mysqli_num_rows($select2) > 0){
        $row2= mysqli_fetch_assoc($select2);
        $_SESSION['id_o'] = $row2['id_o'];
        $insert2 = "INSERT INTO contain (produit_id , ordre_id) VALUES ('$produit_id','$row2[id_o]')";
        mysqli_query($con, $insert2);
    }
    header('location: index.php#products');
}
    
    

}


?>