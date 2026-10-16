<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
</head>
<body background="#fff">
    <center>
        <div class="main">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <h2 class="h2">Farmy</h2>
                <img src="images/farm.png" alt="logo" width="62%">
                <input type="text" name='name' class="input" placeholder="Enter Name" required>:
                <br>
                <input type="number" name='price' class="input" placeholder="Enter Price" required>
                <br>
                <input type="number" name='stock' class="input" placeholder="Enter Stock" required>
                <br>
                <div style="display: flex;margin:10px; padding:5px;justify-content:space-between;" >
                <h3>Catégorie :</h3><br>
                <input type="radio" name="categ" value="fruit" id="fruit">
                <label for="fruit">fruit</label>
                <input type="radio" name="categ" value="lait" id="lait">
                <label for="lait">Milk</label>
                <input type="radio" name="categ" value="legume" id="Vegetable">
                <label for="Vegetable">Vegetable</label>
                <input type="radio" name="categ" value="Herbs" id="herbe">
                <label for="herbe">Herbs</label>
                <input type="radio" name="categ" value="Honey" id="Honey">
                <label for="Honey">Honey</label>
                </div>
                <br>
                
                <textarea name="description" class="input" id="dd" style="width:62%;height:50px;" placeholder="Enter Description"></textarea>
                <br>
                <input type="file" id="file" name='image' style='display:none;' class="input">
                <label for="file" class="choice">Choice image</label>
                <button name="upload" class="upload">✔️Upload Product</button>
                <br><br>
                <a href="AdminAfichagProd.php" class="aa">Sow All Product</a>
            </form>
        </div>
       
    </center>
</body>
</html>