<?php

include 'dbConnection.php';

$conn=getDatabaseConnection("project");


$productId=$_GET['Id'];


$sql="SELECT * FROM `movie_products` WHERE 1 and Id= $productId";
    

$stmt=$conn->prepare($sql);
$stmt->execute();
$records=$stmt->fetchAll(PDO::FETCH_ASSOC);


echo "name: "; echo $records[0]['name'] . "<br>" ."<br>"  ;

echo "category: "; echo $records[0]['category'] . "<br>" ."<br>";

echo "Rating: "; echo $records[0]['Rating'] . "<br>" ."<br>";

echo "Description: "; echo $records[0]['Description'] . "<br>" ."<br>";

    
 echo "<img src= '  img/".$records[0]['img']."      '   width='200'> <br/>";




?>