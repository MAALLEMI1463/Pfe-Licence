<?php
$flag1 = '';
include('ConnectDB.php');
session_start();
if(isset($_POST['LOGIN'])){
    $Email = $_POST['Email'];
    $Password = $_POST['password'];
    

    $query = "select * from consommateur where email = '$Email' and PASSWORD = '$Password'";
    $res = mysqli_query($con,$query);

    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
        $_SESSION['user_id'] = $row['id_c'];
        $flag1 = '1';
        
    }else{
        $flag1 = '0';
    }
    
}




$flag = '';

if(isset($_POST['submit'])){
    $UserName = $_POST['UserName'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Prename = $_POST['Prename'];
    $Adresse = $_POST['Adresse'];
    if(filter_var($Email,FILTER_VALIDATE_EMAIL)){
        $select = mysqli_query($con, "SELECT * FROM `consommateur` WHERE email = '$Email' AND PASSWORD = '$Password'") or die('query failed');
        if(mysqli_num_rows($select) > 0){
            $flag = '1';
        }else{
            $query = mysqli_query($con,"INSERT INTO `consommateur`(`username`, `email`, `PASSWORD`, `prenom`, `adress`) VALUES ('$UserName','$Email','$Password','$Prename','$Adresse')");
        }
    }else{
        echo"Email Not Valide";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <div class="social-icons">
                <img src="images/facebook.png" alt="facebook">
                <img src="images/instagram.png" alt="instgramme">
                <img src="images/twitter (1).png" alt="twitter">
            </div>
            <form id="login"action="" class="input-group" method="post">
                <input type="text" class="input-field" placeholder="Enter Email" required name="Email">
                <input type="password" class="input-field" placeholder="Enter Password" required name="password">
                <!--<a href="logADMIN.php" style="text-align:center;left:20%;color:blue;font-size:14px;font-weight:bold;padding:20px;"><span style="text-align:center;left:20%;color:blue;font-size:14px;font-weight:bold;padding:20px;">Je_Suis_Admin</span></a>-->
                <button type="submit" class="submit-btn" name="LOGIN" style="margin-top: 75px;">Log In</button>
                <?php
                if($flag1 == '1'){
                    header('location:index.php');
                }
                if($flag1 == '0'){
                    echo"<li type='none' style='text-center;color:red;margin: 15px;padding:20px;font-size:15px;'><strong>Email or password error</strong></li>";
                    }
                ?>
            </form>
            <form id="register" action="" class="input-group" method="post">
                <input type="email" class="input-field" placeholder="Email" required name="Email">
                <input type="password" class="input-field" placeholder="Enter Password " required name="Password">
                <input type="text" class="input-field" placeholder="User Name" name="UserName" required>
                <input type="text" class="input-field" placeholder="Prename" name="Prename" required>
                <input type="text" class="input-field" placeholder="Adresse" name="Adresse" required>
                <button type="submit" class="submit-btn" name="submit" style="margin-top: 25px;">Register</button>
                
            </form>
            <?php
                    if($flag == '1'){
                        echo"<li type='none' style='text-center;color:red;margin: 15px;padding:20px;'><strong>The Count Is Existe</strong></li>";
                    }
            ?>
        </div>
    </div>
    <script src="docm.js"></script>
    
</body>
</html>