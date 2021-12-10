<?php
include '../../Classes/admin/product.php';
include '../../Classes/admin/account.php';
include '../../Classes/admin/order.php';

$product = new product();
$account = new account();
$order = new order();
?>

<?php
include '../../inc/admin/header.php';
?>

<body>
  <?php
  include '../../inc/admin/sidebar.php';
  ?>
  <div class="container">
    <div class="grid">
      <div class="container-counter">
        <div class="row m-gutter">
          <div class="col l-3 m-6 c-12">
            <div class="container-counter-item">
              <h4 class="container-counter__title">Tổng sản phẩm</h4>
              <div class="container-counter-item-wrap">
                <span class="container-counter__quantity"><?php echo $product->quantity_Product() ?></span>
                <i class='container-counter__icon bx bx-shopping-bag'></i>
              </div>
            </div>
          </div>
          <div class="col l-3 m-6 c-12">
            <div class="container-counter-item">
              <h4 class="container-counter__title">Tổng đơn hàng</h4>
              <div class="container-counter-item-wrap">
                <span class="container-counter__quantity"><?php echo $order->quantity_order() ?></span>
                <i class='container-counter__icon bx bx-cart-alt'></i>
              </div>
            </div>
          </div>
          <div class="col l-3 m-6 c-12">
            <div class="container-counter-item">
              <h4 class="container-counter__title">Tổng tài khoản</h4>
              <div class="container-counter-item-wrap">
                <span class="container-counter__quantity"><?php echo $account->quantity_account() ?></span>
                <i class='container-counter__icon bx bx-user-circle'></i>
              </div>
            </div>
          </div>
          <div class="col l-3 m-6 c-12">
            <div class="container-counter-item">
              <h4 class="container-counter__title">Doanh thu (VNĐ)</h4>
              <div class="container-counter-item-wrap">
                <span class="container-counter__quantity"><?php echo $order->get_total() ?></span>
                <i class='container-counter__icon bx bx-coin-stack'></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="top-product-wrap">
        <div class="row m-gutter">
          <div class="col l-3 m-6 c-12">
            <div class="top-product">
              <div class="top-product-header">
                <h4 class="top-product-header__title">
                  Sản phẩm bán chạy
                </h4>
              </div>
              <div class="top-product-body">
                <?php
                $top = $product->get_bestsellerProduct();
                $topProduct = $top['listTop'];
                $topProductDetail = $top['listDetailTop'];
                if ($topProduct) {
                  foreach ($topProduct as $lists) {
                    foreach ($topProductDetail[$lists['IdProduct']] as $list) {
                      foreach ($list as $data) {
                ?>
                        <div class="top-product-item">
                          <div class="top-product-item__img" style="background-image: url('<?php echo '../../public/web/img/products/' . $data['ProductImg1'] ?>');"></div>
                          <div class="top-product-item-info">
                            <h4 class="top-product-item__name"><?php echo $data['NameProduct'] ?></h4>
                            <span class="top-product-item__title"><?php echo $data['NameCategory'] ?></span>
                          </div>
                          <div class="top-product-item-price">
                            <span class="top-product-item__title">Giá</span>
                            <h4 class="top-product-item__name"><?php echo $data['Price'] . ' đ' ?></h4>
                          </div>
                        </div>
                <?php
                      }
                    }
                  }
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col l-3 m-6 c-12">
            <div class="new-customer">
              <div class="new-customer-header">
                <h4 class="new-customer-header__title">
                  Khách hàng mới
                </h4>
              </div>
              <div class="new-customer-body">
                <?php
                $get_customer = $account->get_account_customer();
                if ($get_customer) {
                  foreach ($get_customer as $data) {
                ?>
                    <div class="new-customer-body-item">
                      <div class="new-customer-body-item__img" style="background-image: url('<?php echo '../../public/admin/Image/accountImg/' . $data['Img'] ?>')"></div>
                      <div class="new-customer-body-item-info">
                        <h4 class="new-customer-body-item-info__name">
                          <?php
                          if ($data['Username'] != '')
                            echo $data['Username'];
                          else
                            echo '<p style="color:orangered">Chưa cập nhật!!!<p>'
                          ?>
                        </h4>
                        <span class="new-customer-body-item-info__email"><?php echo $data['Email'] ?></span>
                      </div>
                      <div class="new-customer-body-item-action">
                        <i class='bx bx-user-circle'></i>
                        <i class='bx bx-comment-detail'></i>
                      </div>
                    </div>
                <?php
                  }
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col l-6 m-12 c-12">
            <div class="Calendar-wrap">
              <iframe class="calendar" src="https://calendar.google.com/calendar/embed?src=tuanle37372000%40gmail.com&ctz=Asia%2FHo_Chi_Minh" frameborder="0" scrolling="no"></iframe>
            </div>
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