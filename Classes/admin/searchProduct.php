<?php
include '../../lib/config.php';
?>
<?php
$host   = DB_HOST;
$user   = DB_USER;
$pass   = DB_PASS;
$dbname = DB_NAME;
$conn =  mysqli_connect($host, $user, $pass, $dbname);

$a = filter_input(INPUT_POST, 'data');
$sql = "SELECT * FROM `product` WHERE NameProduct like '%$a%'";
$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query);
if ($num > 0) {
    while ($data = mysqli_fetch_array($query)) {
?>
        <div class="productList__body-item">
            <div class="productList__body-item-check">
                <input type="checkbox" name="check" id="" class="productList__body-item-checkbox">
            </div>
            <div class="productList__body-item-img" style="background-image: url('<?php echo '../../public/web/img/products/' . $data['ProductImg1'] ?>');"></div>
            <div class="productList__body-item-info">
                <h5 class="productList__body-item-info__name">
                    <?php echo $data['NameProduct'] ?>
                </h5>
                <span class="productList__body-item-info__title">
                    <?php echo $data['Descrip'] ?>
                </span>
            </div>
            <div class="productList__body-item-amount">
                <span><?php echo $data['Price'] ?></span>
            </div>
            <div class="productList__body-item-quantity">
                <span><?php echo $data['QuantityProduct'] ?></span>
            </div>
            <div class="productList__body-item-date">
                <span><?php echo $data['TimeAdd'] ?></span>
            </div>
            <div class="productList__body-item-Action">
                <a href="../web/product-detail.php?idProduct=<?php echo $data['IdProduct'] ?>&idCate=<?php echo $data['IdCategory'] ?>" target="_blank" title="Xem chi tiết" class="icon"><i class='action__icon--eye bx bx-hide'></i></a>
                <a href="EditProduct.php?productId=<?php echo $data['IdProduct'] ?>" title="Chỉnh sửa" class="icon"><i class='action__icon--edit js-productList__body-item-Action-icon--edit bx bx-edit'></i></a>
                <a href="?delete=<?php echo $data['IdProduct'] ?>" onClick="return confirm('Bạn có muốn xóa không?')" title="Xóa" class="icon"><i class='action__icon--delete bx bxs-trash'></i></a>
            </div>
        </div>
<?php
    }
}
?>