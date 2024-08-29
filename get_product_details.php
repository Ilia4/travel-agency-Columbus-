<?php
require_once("connect.php"); 
$product_id = $_GET['product_id'];


$sql = "SELECT * FROM tours WHERE id = $product_id";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
 
    $row = $result->fetch_assoc();
    $product_name = $row['name'];
    $product_description = $row['description'];
    $product_country = $row['country'];

$sql2 = "SELECT * FROM country WHERE name = '$product_country' ";
$result2 = $connect->query($sql2);

    if($result2->num_rows > 0){
        $row2 = $result2->fetch_assoc();
        $description_country = $row2['description'];
    }

$sql3 = "SELECT * FROM hotels WHERE country_hotel = '$product_country'";
$result3 = $connect->query($sql3);

if($result3->num_rows >0){
    $row3 = $result3->fetch_assoc();
    $name_hotel = $row3['name_hotel'];
    $description_hotel = $row3['description_hotel'];


}


    $data = array(
        'name' => $product_name,
        'description' => $product_description,
        'country' => $product_country,
        'description_country' => $description_country,
        'name_hotel' => $name_hotel
    );

    echo json_encode($data, JSON_PRETTY_PRINT);
} else {
    echo "Product not found";
}

$connect->close();



?>