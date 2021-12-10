<?php
include '../../Classes/admin/order.php';
?>

<?php
include '../../inc/admin/header.php';
?>

<body>
    <?php
    include '../../inc/admin/sidebar.php';
    ?>
    <?php
    $order = new order();
    if (!isset($_GET['orderId']) || $_GET['orderId'] == NULL)
        echo "<script>window.location = 'OrderList.php'</script> ";
    else
        $id = filter_input(INPUT_GET, 'orderId');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $update_order = $order->update_order($id);
    }
    ?>
    <div class="container">
        <div class="grid">
            <div class="row no-gutters">
                <div class="col l-o-3-5 l-5 m-12 c-12">
                    <div class="editForm">
                        <div class="modal-order-header">
                            <h4 class="modal-order-header__title">#<?php echo $id ?></h4>
                            <span class="modal-order-header__btn--close js-btn--close">
                                <i class='bx bx-x'></i>
                            </span>
                        </div>
                        <div class="modal-order-body">
                            <div class="modal-order-item">
                                <span class="span-heading">Tên sản phẩm</span>
                                <span class="span-heading">Số lượng</span>
                                <span class="span-heading">Giá</span>
                                <span class="span-heading">Tổng</span>
                            </div>
                            <?php
                            $show_order = $order->get_OrderDetailById($id);
                            if ($show_order) {
                                foreach ($show_order as $result) {
                            ?>
                                    <div class="modal-order-item">
                                        <span><?php echo $result['NameProduct'] ?></span>
                                        <span><?php echo $result['QuantityOrder'] ?></span>
                                        <span><?php echo $result['Price'] ?>đ</span>
                                        <span><?php echo $result['SumOrder'] ?>đ</span>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <div class="modal-order-body-text">

                                <?php
                                $show_order = $order->get_OrderDetailById($id);
                                if ($show_order) {
                                    foreach ($show_order as $result) {
                                        $sumOrder = 0;
                                        foreach ($show_order as $data) {
                                            $sumOrder += $data['SumOrder'];
                                        }
                                    }
                                }
                                echo '<p class="modal-order-body-text__sum">Tổng hóa đơn: ' . $sumOrder . ' đ</p>';
                                echo '<p class="modal-order-body-text__ship">Vận chuyển: 10,000 đ</p>';
                                $total = $sumOrder + 10000;
                                echo '<p class="modal-order-body-text__total">Tổng tiền: <span>' . $total . ' đ</span></p>';
                                ?>
                            </div>
                            <?php
                            if (isset($update_order)) {
                                echo $update_order;
                            }
                            ?>
                        </div>
                        <form action="" method="post">
                            <div class="modal-order-footer">
                                <a href="OrderList.php" class="btn btn--close js-btn--close">
                                    Trở về
                                </a>
                                <button class="btn btn--primary">
                                    Duyệt
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../../inc/admin/footer.php';
    ?>

    <script src="../../public/admin/js/script.js"></script>

</body>

</html>