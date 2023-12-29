<?
$conn = new mysqli("localhost", "root", "", "cart_system");
if ($conn -> connect_error) {
    die("Connection failed! ".$conn -> connect_error);
}

//function searchProducts($query)
//{
//    $result = $conn->query("SELECT * FROM product WHERE product_name LIKE '%$query%'");
//    return $result->fetch_all(MYSQLI_ASSOC);
//}
