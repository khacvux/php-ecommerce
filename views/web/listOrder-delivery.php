<?php
include_once '../../Classes/web/userOrder.php';
$list = new listOrder();
include_once '../../lib/session.php';
Session::init();

$ar = $list->getListOrder_where(Session::get('userId'), '2');
$listOrder = $ar['listOrder'];
$listDetailOrder = $ar['listDetailOrder'];

?>


<?php
if ($listOrder == false) {
?>
    <div class="empty-cart" style="background-color: white;">
        <img src="../../public/web/img/empty_order.png" alt="">;
    </div>
<?php
} else
    foreach ($listOrder as $lists) {
?>
    <div class="user-order-body">
        <div class="user-order-body-heading">
            <div class="user-order-body-heading-button-wrap">
                <button class="user-order-body-heading-button__chat">Chat</button>
                <button class="user-order-body-heading-button__vote">Đánh giá</button>
            </div>
            <span class="user-order-body-heading-title">
                <?php
                switch ($lists['StatusOrder']) {
                    case 1:
                        echo 'CHỜ XÁC NHẬN';
                        break;
                    case 2:
                        echo 'ĐANG GIAO';
                        break;
                    case 3:
                        echo 'ĐÃ GIAO';
                        break;
                    case 4:
                        echo 'ĐÃ HUỶ';
                        break;
                }
                ?>
            </span>
        </div>


        <?php
        foreach ($listDetailOrder[$lists['IdOrder']] as $list) {
            foreach ($list as $item) {

        ?>
                <div class="user-order-body-container">
                    <div class="user-order-body-img" style="background-image: url('../../public/web/img/products/<?php echo $item['ProductImg1'] ?>')">
                    </div>
                    <div class="user-order-body-info">
                        <p class="user-order-body-info__name">
                            <?php echo $item['NameProduct'] ?>
                        </p>
                        <p class="user-order-body-info__type">
                            Khối lượng: 1kg
                        </p>
                        <p class="user-order-body-info__quantity">
                            Số lượng: <?php echo $item['QuantityOrder'] ?>
                        </p>
                    </div>
                    <span class="user-order-body-info__price">
                        <?php echo $item['SumOrder'] ?>
                    </span>
                </div>
        <?php
            }
        }
        ?>

        <div class="user-order-body-total">
            <span class="user-order-body-total__title">Tổng số tiền:</span>
            <span class="user-order-body-total__sum-price"><?php echo $lists['Total'] ?> đ</span>
        </div>

        <div class="user-order-body-footer">
            <!-- <a class="user-order-body-footer__buy button_outline pointer-none">
                Huỷ đơn hàng
            </a> -->
            <a class="user-order-body-footer__buy" href="#<?php echo $lists['IdOrder'] ?>" onclick="deliveredOrder(this);">
                Đã nhận được hàng
            </a>
        </div>
    </div>
    <script>
        function deliveredOrder(obj) {
            var idOrder = $(obj).attr('href').substr(1);
            $.post("../../Classes/web/updateOrder.php", {
                    'idOrder': idOrder,
                    'act': 'delivered'
                },
                function(data) {
                    console.log(obj);
                });
            console.log(idOrder);
            content.removeChild(obj.parentElement.parentElement);
        }
    </script>
<?php
    }
?>