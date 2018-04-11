<?php
    include 'functions.php';
    session_start();
    if(!isset($_SESSION['cart']))
        $_SESSION['cart']=array();
    if(isset($_POST['itemName'])){
        $newItem=array();
        $newItem['name']=$_POST['itemName'];
        $newItem['id']=$_POST['itemId'];
        $newItem['price']=$_POST['itemPrice'];
        $newItem['image']=$_POST['itemImage'];
        foreach ($_SESSION['cart'] as &$item){
            if ($newItem['id']==$item['id']){
                $item['quantity'] +=1;
                $found=true;
            }
        }
        if ($found!=true){
            $newItem['quantity']=1;
            array_push($_SESSION['cart'], $newItem);
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <title>Movie Catalog</title>
    </head>
    <body>
         <!-- Bootstrap Navagation Bar -->
        <nav class='navbar navbar-default - navbar-fixed-top'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <a class='navbar-brand' href='#'>Movie Catalog</a>
                </div>
                <ul class='nav navbar-nav'>
                    <li><a href='index.php'>Home</a></li>
                    <li><a href='cart.php'>
                             <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span>
                             Cart: <?php displayCartCount(); ?>
                         </a>
                    </li>
                </ul>
            </div>
        </nav>
        <br> <br > <br >
        <!-- Search Form -->
        <form>
            <div class="container">
                <h2>Movie Search</h2>
                <b>Product: </b><input type="text" name="product" /><br> <br>
                <b>Category: </b>
                <Select name="category">
                    <option value="">Select One </option>
                    <?=displayCategories()?>
                </Select> <br> <br>
                <b>Format: </b>
                <Select name="format">
                    <option value="">Select One </option>
                    <?=displayFormats()?>
                </Select> <br> <br>
                <b>Rating: </b>
                <Select name="rating">
                    <option value="">Select One </option>
                    <?=displayRatings()?>
                </Select><br> <br>
                <b>Sort Results by Name: </b><br/>
                 <input type="radio" name="sort" id="ascending" value="asc">
                     <label for="ascending">Ascending</label><br>
                <input type="radio" name="sort" id="descending" value="desc">
                    <label for="descending">Descending</label><br>
                <input type="submit" value="Search" name="searchForm" id="Submit"/> <br />
            </div>
        </form>
         <!-- Display Search Results -->
        <?php displayResults(); ?>
    </body>
    <hr>
    <div id="foot">
        <footer>
            <br /><strong>CST336 Internet Programming. By: Chenyu, Mustafa, Devin</strong><br />
            <strong>DISCLAIMER: This is not a real movie catalog</strong>
            <br /><img id="otter" src="img/otter.png" alt="CSUMB Logo" />
        </footer>
    </div>
</html>
