<?php
    session_start();
    include 'functions.php';
    if (isset($_POST['removeId']))
        foreach($_SESSION['cart'] as $itemKey => $item)
            unset($_SESSION['cart'] [$itemKey]);
    if(isset($_POST['removeMovie']))
        foreach($_SESSION['cart'] as $itemKey =>$item)
            if($item['id'] == $_POST['removeMovie'])
                unset($_SESSION['cart'][$itemKey]);
    if (isset($_POST['itemId']))
        foreach($_SESSION['cart'] as &$item)
            if ($item['id']==$_POST['itemId'])
                $item['quantity']=$_POST['update'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css/styles_cart.css" rel="stylesheet" type="text/css" />
        <title>Shopping Cart</title>
    </head>
    <body>
        <div class='container'>
            <div class='text-center'>
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
                <br /> <br /> <br />
                <!-- Cart Items -->
            </div>
                <?php displayCart(); ?>
        </div>
    </body>
</html>
