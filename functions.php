<?php


include 'dbConnection.php';

$conn=getDatabaseConnection("project");

function displayCategories(){
global $conn;

$sql="SELECT catId, catName FROM movie_category order by catName";

$stmt=$conn->prepare($sql);
$stmt->execute();
$records=$stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($records);

foreach($records as $record){
    
    echo "<option value='".$record["catId"]."'>" . $record["catName"] . "</option> " ; 
    
}

}


function displayFormats(){
global $conn;

$sql="SELECT formatId, formatName FROM movie_format order by formatName";

$stmt=$conn->prepare($sql);
$stmt->execute();
$records=$stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($records);

foreach($records as $record){
    
    echo "<option value='".$record["formatName"]."'>" . $record["formatName"] . "</option> " ; 
    
}

}



function displayRatings(){
global $conn;

$sql="SELECT ratingId, ratingName FROM movie_rating order by ratingName";

$stmt=$conn->prepare($sql);
$stmt->execute();
$records=$stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($records);

foreach($records as $record){
    
    echo "<option value='".$record["ratingName"]."'>" . $record["ratingName"] . "</option> " ; 
    
}

}




function displayResults(){
    global $conn;
    
    if(isset($_GET['searchForm']))
    {
        
        $namedParameters= array();
        
        $sql= "SELECT * FROM `movie_products` WHERE 1";
        
        
         if(!empty($_GET['product']))
         {
              $sql.=  " and name LIKE :name" ;
            $namedParameters[":name"]= "%" . $_GET['product'] . "%";
                
        }
        
        
        if(!empty($_GET['category']))
        {
            $sql.=  "  and catId= :categoryId" ;
            $namedParameters[":categoryId"]=  $_GET['category'] ;
                
        }
        
        if(!empty($_GET['format']))
        {
            $sql.=  "  and Format= :Format" ;
            $namedParameters[":Format"]=  $_GET['format'] ;
                
        }
        
         if(!empty($_GET['rating']))
        {
            $sql.=  "  and Rating= :Rating" ;
            $namedParameters[":Rating"]=  $_GET['rating'] ;
                
        }
        
        
        
     if (isset($_GET['sort']))
        {
     
        if ($_GET['sort']=="asc")
        {
                $sql.=" ORDER BY name";
        }
        
        
        else 
        {
            $sql.=" ORDER BY name DESC";
        }
        
    }  
        
        
        
        
        
        
        $stmt=$conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);



        echo"<table class='table' > ";


        foreach($records as $record)
        {
            
            $itemName=$record['name'];
            $itemPrice=$record['price'];
            $itemImage=$record['img'];
            $itemId=$record['Id'];
            $itemDescription=$record['Description'];
            $itemRating=$record['Rating'];
            
            
            echo ' <tr>';
            echo "<td>  <img src= '  img/".$record['img']."      '   width='100'>           </td>" ;
            echo "<td> <h4>    $itemName     </h4>     </td>" ;
            echo "<td> <h4> $ $itemPrice   </h4>          </td>" ;
            
            
            
            echo " <form method='post' > " ; 
            echo"  <input type='hidden' name='itemName'  value='$itemName'      >              ";
            echo"  <input type='hidden' name='itemId'  value='$itemId'      >              ";
            echo"  <input type='hidden' name='itemImage'  value='$itemImage'      >              ";
            echo"  <input type='hidden' name='itemPrice'  value='$itemPrice'      >              ";
            
            
            if ($_POST['itemId']==$itemId)
            {
                
                echo"  <td>     <button class='btn btn-success'>       Added             </button>        </td>     " ;
            }
            
            else 
            {
            echo"  <td>     <button class='btn btn-warning'>           Add To Cart         </button>        </td>     " ;
            }
            
            echo "<td> <a href=\"productInfo.php?Id=".$record["Id"]."\">More Info </a>  </td>";
            
            echo "</form>" ;
            
            
                
    
            //echo $record["name"] . "----"  . $record["price"]  ."---" ; echo "<br>";
            //echo "<img src= '  img/".$record['img']."      '   width='100'>";   echo "<br>";
            
            
            
            echo '</tr>' ;
            
            
        }
        
        
        echo "</table>";
        
    }
    
    
    
}



function displayCartCount(){
    
    echo count($_SESSION['cart']);

}

function displayCartCount2(){
    
    return count($_SESSION['cart']);

}


function displayCart(){
    
    
    
        if (isset ($_SESSION['cart']))
    {
        echo "<table class='table' > ";
        
        foreach ($_SESSION['cart'] as $item){
            
            $itemName= $item['name'];
            $itemPrice= $item['price'];
            $itemImage= $item['image'];
            $itemId= $item['id'];
            $itemQuant=$item['quantity'];
            
            
            
            echo "<tr>";
            echo "<td> <img src= '  img/".$item['image']."      '   width='100' height='120'>               </td>";
            echo "<td>  <h4>    $itemName </h4>       </td>   ";
            echo "<td>  <h4>    $itemPrice </h4>       </td>   ";
            
            
            
            
            
            
            echo "</tr>";
            
            
        }
        
        echo "</table> ";
        
        
        
        
        if (displayCartCount2()>0) {
         echo "<form method='post'> ";
             echo"<input type='hidden' name='removeId'  >              ";
            echo"  <td>     <button class='btn btn-danger'>     Remove All Items    </button>        </td>     " ;
            echo "</form";
        
        }
        
        
        else echo "cart is Empty";
        
        echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>";
        
        
    }
    
    
    
}


?>