<?php
include_once '../../lib/config.php';
include_once '../../lib/session.php'
?>

<?php
$host   = DB_HOST;
$user   = DB_USER;
$pass   = DB_PASS;
$dbname = DB_NAME;
$conn =  mysqli_connect($host, $user, $pass, $dbname);

$idProduct = $_GET["IdProduct"];
$idAccount = $_GET["IdAccount"];
$rate = $_GET["rate"];
$description = $_GET["description"];

$sql = "INSERT INTO `feedback`(Title, Rate, IdProduct, IdAccount) VALUES ('$description', '$rate', '$idProduct', '$idAccount')";
$query = mysqli_query($conn, $sql);
if ($query) {
?>
    <p style = "color: green">Đánh giá thành công</p>
<?php
} else { ?>
    <p style = "color: red">Đánh giá thất bại</p>
<?php
}
?>