<?php
    include 'dbConnection.php';
    $conn=getDatabaseConnection("project");
    function displayCategories(){
        global $conn;
        $sql="SELECT catId, catName FROM movie_category order by catName";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record)
            echo "<option value='".$record["catId"]."'>" . $record["catName"] . "</option> " ;
    }
        function displayFormats(){
        global $conn;
        $sql="SELECT formatId, formatName FROM movie_format order by formatName";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record)
            echo "<option value='".$record["formatName"]."'>" . $record["formatName"] . "</option> " ;
    }
    function displayRatings(){
        global $conn;
        $sql="SELECT ratingId, ratingName FROM movie_rating order by ratingName";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record)
            echo "<option value='".$record["ratingName"]."'>" . $record["ratingName"] . "</option> " ;
    }
    function displayResults(){
        global $conn;
        if(isset($_GET['searchForm'])){
            $namedParameters= array();
            $sql= "SELECT * FROM `movie_products` WHERE 1";
             if(!empty($_GET['product'])){
                $sql.=" and name LIKE :name" ;
                $namedParameters[":name"]= "%" . $_GET['product'] . "%";
            }
            if(!empty($_GET['category'])){
                $sql.="  and catId= :categoryId" ;
                $namedParameters[":categoryId"] = $_GET['category'];
            }
            if(!empty($_GET['format'])){
                $sql.="  and Format= :Format" ;
                $namedParameters[":Format"] = $_GET['format'] ;
            }
             if(!empty($_GET['rating'])){
                $sql.=  "  and Rating= :Rating" ;
                $namedParameters[":Rating"] = $_GET['rating'];
            }
            if (isset($_GET['sort'])){
                if ($_GET['sort']=="asc")
                    $sql.=" ORDER BY name";
                else
                    $sql.=" ORDER BY name DESC";
            }
            $stmt=$conn->prepare($sql);
            $stmt->execute($namedParameters);
            $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($records)){
                echo "<br /><table class='table' > ";
                echo "<tr><th><h3>Cover</h3></th>
                      <th><h3>Title</h3></th>
                      <th><h3>Price</h3></th>
                      <th><h3>Cart</h3></th>
                      <th><h3>Info</h3></th></tr>";
                foreach($records as $record){
                    $itemName=$record['name'];
                    $itemPrice=$record['price'];
                    $itemImage=$record['img'];
                    $itemId=$record['Id'];
                    $itemDescription=$record['Description'];
                    $itemRating=$record['Rating'];
                    echo "<tr><td><img src='img/". $record['img']. "'width='100'></td>" ;
                    echo "<td id='td-text'>$itemName</td>" ;
                    echo "<td id='td-text'>$$itemPrice</td>" ;
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='itemName' value='$itemName'>";
                    echo "<input type='hidden' name='itemId' value='$itemId'> ";
                    echo "<input type='hidden' name='itemImage' value='$itemImage'>";
                    echo "<input type='hidden' name='itemPrice' value='$itemPrice'>";
                    if ($_POST['itemId']==$itemId)
                        echo "<td id='td-cell'><button class='btn btn-success'>Added</button></td>" ;
                    else
                        echo "<td id='td-cell'><button class='btn-danger'>Add To Cart</button></td>" ;
                    echo "<td id='td-text'><a href=\"productInfo.php?Id=".$record["Id"]."\"><h3>More Info</h3></a></td>";
                    echo "</form>" ;
                    echo '</tr>' ;
                }
                echo "</table>";
            } else
                echo "<br/><h2 id='error'>No movies found!</h2>";
        }
    }
    function displayCartCount(){
        echo count($_SESSION['cart']);
    }
    function displayCartCount2(){
        return count($_SESSION['cart']);
    }
    function displayCart(){
        if (isset ($_SESSION['cart'])){
            if (displayCartCount2()>0){
                echo "<h2>Shopping Cart</h2>";
                echo "<table class='table'>";
                echo "<tr><th></th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Update</th>
                      <th>Remove</th></tr>";
                foreach ($_SESSION['cart'] as $item){
                    $itemName=$item['name'];
                    $itemPrice=$item['price'];
                    $itemImage=$item['image'];
                    $itemId=$item['id'];
                    $itemQuant=$item['quantity'];
                    echo "<tr>";
                    echo "<td><img src='img/" .$item['image']. "'width='100' height='120'></td>";
                    echo "<td id='td-text'>$itemName</td>";
                    echo "<td id='td-text'>$$itemPrice</td>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='itemId' value='$itemId'>";
                    echo "<td id='td-quantity'><input type='text' name='update' size='3' placeHolder='$itemQuant'></td>";
                    echo "<td id='td-cell'><button class='btn btn-danger'>Update</button></td>";
                    echo "</form>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='removeMovie' value='$itemId'>";
                    echo "<td id='td-cell'><button class='btn btn-danger'>Remove</button></td>";
                    echo "</form></tr>";
                }
                echo "</table> <br />";
                echo "<form method='post'>";
                echo "<input type='hidden' name='removeId'>";
                echo "<button class='btn btn-danger'>Remove All Items</button>" ;
                echo "</form";
            }
            else
                echo "<h2>No movies in your cart!<h2>";
            echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>";
        }
    }
    function displayInfo(){
        global $conn;
        $productId=$_GET['Id'];
        $sql="SELECT * FROM `movie_products` WHERE 1 and Id= $productId";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<img id='infoimg' src= 'img/".$records[0]['img']."' width='200'/>";
        echo "<table class='tableinfo'>";
        echo "<tr><td id='td-info'>Title</td>"; echo "<td id='td-info'>". $records[0]['name'] ."</td><td id='td-info'></td>";
        echo "<td id='td-info'>Category</td>"; echo "<td id='td-info'>". $records[0]['category'] ."</td><td id='td-info'></td>";
        echo "<td id='td-info'>Rating</td>"; echo "<td id='td-info'>". $records[0]['Rating'] ."</td></tr></table>";
        echo "<p>Description: ". $records[0]['Description'] . "<p>";
    }
?>