<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
</head>
<body background="#fff">
    <?php
    include('ConnectDB.php');
    $ID=$_GET['id'];
    $up = mysqli_query($con, "select * from produit where id =$ID");
    $data = mysqli_fetch_array($up);

    ?>
    <center>
        <div class="main">
            <form action="up.php" method="post" enctype="multipart/form-data">
                <h2 class="h2">Update Of Product</h2>
                <input type="text" name='id' class="input" placeholder="Enter ID" value='<?php echo $data['id']?>'>
                <br>
                <input type="text" name='name' class="input" placeholder="Enter Name" value='<?php echo $data['nom']?>'>:
                <br>
                <input type="text" name='price' class="input" placeholder="Enter Price" value='<?php echo $data['price']?>'>
                <br>
                <input type="text" name='discount' class="input" placeholder="Enter discount" value='<?php echo $data['discount']?>'>
                <br>
                <input type="file" id="file" name='image' style='display:none;' class="input">
                <label for="file" class="choice">mise e jour image</label>
                <button name="update" class="upload" type='submit'>✔️Update Product</button>
                <br><br>
                <a href="AdminAfichagProd.php" class="aa">Sow All Product</a>
            </form>
        </div>
        
    </center>
</body>
</html>