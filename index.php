<?php
include 'functions.php';
session_start();


if(!isset($_SESSION['cart'])){

$_SESSION['cart']=array();

}


if(isset($_POST['itemName'])){    //if a new item has been added, then add it to cat
    
    $newItem=array();
    $newItem['name']=$_POST['itemName'];
    $newItem['id']=$_POST['itemId'];
    $newItem['price']=$_POST['itemPrice'];
    $newItem['image']=$_POST['itemImage'];
    
    
    
    foreach ($_SESSION['cart'] as &$item) {
        if ($newItem['id']==$item['id']){
            
            $item['quantity'] +=1;
            $found=true;
            
        }
        
        
    }
    
    
    if ($found!=true){
        
        $newItem['quantity']=1;
        array_push($_SESSION['cart'],$newItem );
    }
    
    
}


?>



<!DOCTYPE html>
<html>
    <head>
        
        <style>
            body{
                margin:0 auto;
                text-align:center;
            }
        </style>
        
        
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        
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
                                 <span class='glyphicon-shopping-cart' aria-hidden='true' > </span>   
                                 Cart:<?php displayCartCount();  ?>
                             </a>
                        
                        </li>
                        
                        
                        
                    </ul>
                </div>
            </nav>



        <br> <br> <br>





            <!-- Search Form -->
            <form>
                
                Product: <input type="text" name="product"  /        >      <br>
                Category: 
                <Select name="category">
                    <option value="">Select One </option>
                    <?=displayCategories()?>
                </Select>                           <br> <br>
                
                Format: 
                <Select name="format">
                    <option value="">Select One </option>
                    <?=displayFormats()?>
                </Select>                           <br> <br>
                
                Rating: 
                <Select name="rating">
                    <option value="">Select One </option>
                    <?=displayRatings()?>
                </Select>                           <br> <br>
                
                
            Sort Results by Name: <br/>
            
            <input type="radio" name="sort" value="asc" /> ASC <br>
            <input type="radio" name="sort" value="desc" /> DESC  <br>
                
                
                
                
                
                
            
                
            <input type="submit" value="Search" name="searchForm" id="submit"/>
            
            </form>



             <!-- Display Search Results -->
            <?php
                displayResults();
            
            ?>





      



    </body>
</html>