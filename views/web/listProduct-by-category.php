<?php
include '../../Classes/web/product.php';
$product = new product();
$idCategory = $_POST['idCategory'];
$listProducts = $product->get_listProductByCategory($idCategory);
if ($listProducts) {
    foreach ($listProducts as $data) {
?>
        <div class="col l-2-4 m-4 c-6">
            <a class="product-item" href="product-detail.php?idProduct=<?php echo $data['IdProduct'] ?>&idCate=<?php echo $data['IdCategory'] ?>">
                <div class="product-item__img" style="background-image: url('<?php echo '../../public/web/img/products/' . $data['ProductImg1'] ?>');"></div>
                <h4 class="product-item__name"><?php echo $data['NameProduct'] ?></h4>
                <div class="product-item__price">
                    <?php if ($data['Percent'] != 0) {
                        echo '<span class="product-item__price-old"> ' . $data["Price"] . 'đ</span>';
                        echo '<span class="product-item__price-current">' . ($data['Price'] * (100 - $data['Percent'])) / 100 . 'đ</span>';
                    } else {
                        echo '<span class="product-item__price-current">' . $data['Price'] . 'đ</span>';
                    } ?>
                </div>
                <div class="product-item__action">
                    <span class="product-item__like product-item__like--liked">
                        <i class="product-item__like-icon--empty far fa-heart"></i>
                        <i class="product-item__like-icon--fill fas fa-heart"></i>
                    </span>
                    <div class="product-item__rating">
                        <i class="product-item__star--gold fas fa-star"></i>
                        <i class="product-item__star--gold fas fa-star"></i>
                        <i class="product-item__star--gold fas fa-star"></i>
                        <i class="product-item__star--gold fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>

                    <span class="product-item__sold">88 đã bán</span>
                </div>
                <div class="product-item__origin">
                    <span class="product-item__brand"><?php echo $data['NameSupplier'] ?></span>
                    <span class="product-item__origin-name">Việt Nam</span>
                </div>
                <div class="product-item__favorite">
                    <i class="fas fa-check"></i>
                    <span>Yêu thích</span>
                </div>
                <?php if ($data['Percent'] != 0) {
                    echo '
                    <div class="product-item__sale-off">
                        <span class="product-item__sale-off-percent">' . $data['Percent'] . '%</span>
                        <span class="product-item__sale-off-label">GIẢM</span>
                    </div>';
                } ?>
            </a>
        </div>
<?php
    }
}
?>