<?php
include '../../Classes/admin/supplier.php';
include '../../Classes/admin/category.php';
include '../../Classes/admin/product.php';
include '../../Classes/admin/sale.php';
include '../../Classes/admin/type.php';
?>

<?php
include '../../inc/admin/header.php';
?>

<body>
  <?php
  include '../../inc/admin/sidebar.php';
  ?>
  <?php
  $product = new product();
  if (!isset($_GET['productId']) || $_GET['productId'] == NULL)
    echo "<script>window.location = 'ProductList.php'</script> ";
  else
    $id = filter_input(INPUT_GET, 'productId');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateP = $product->update_product($_POST, $_FILES, $id);
  }
  ?>
  <div class="container">
    <div class="grid">
      <div class="row no-gutters">
        <div class="col l-o-3 l-6 m-12 c-12">
          <div class="editForm">
            <div class="modal-container__heading">
              <h4 class="modal-container__heading-title">
                Sửa sản phẩm
              </h4>
            </div>
            <?php
            $get_product = $product->get_productById($id);
            if ($get_product) {
              foreach ($get_product as $data) {
            ?>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-container__body">
                    <div class="modal-container__body-wrap">
                      <label for="nameProduct" class="modal-container__body-span">Tên sản phẩm:</label>
                      <input name="nameProduct" value="<?php echo $data['NameProduct'] ?>" id="nameProduct" type="text" class="modal-container__body-input">
                    </div>
                    <div class="modal-container__body-wrap">
                      <div class="modal-container__body-wrap--2">
                        <label for="price" class="modal-container__body-span">Giá:</label>
                        <input name="price" value="<?php echo $data['Price'] ?>" id="price" type="text" class="modal-container__body-input">
                      </div>
                      <div class="margin8px"></div>
                      <div class="modal-container__body-wrap--2">
                        <label for="quantity" class="modal-container__body-span">Số lượng:</label>
                        <input name="quantity" value="<?php echo $data['QuantityProduct'] ?>" id="quantity" type="text" class="modal-container__body-input">
                      </div>
                    </div>
                    <div class="modal-container__body-wrap">
                      <div class="modal-container__body-wrap--2">
                        <label for="type" class="modal-container__body-span">Loại:</label>
                        <select name="type" id="type" class="modal-container__body-input">
                          <?php
                          $type = new type();
                          $typeList = $type->get_type();
                          foreach ($typeList as $typeData) {
                          ?>
                            <option <?php if ($typeData['IdType'] == $data['IdType']) {
                                      echo 'selected';
                                    } ?> value="<?php echo $typeData['IdType'] ?>"><?php echo $typeData['Mass'] . 'kg' ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="margin8px"></div>
                      <div class="modal-container__body-wrap--2">
                        <label for="sale" class="modal-container__body-span">Sale:</label>
                        <select name="sale" id="sale" class="modal-container__body-input">
                          <?php
                          $sale = new sale();
                          $saleList = $sale->get_sale();
                          foreach ($saleList as $saleData) {
                          ?>
                            <option <?php if ($saleData['IdSale'] == $data['IdSale']) {
                                      echo 'selected';
                                    } ?> value="<?php echo $saleData['IdSale'] ?>"><?php echo $saleData['NameSale'] ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="modal-container__body-wrap">
                      <div class="modal-container__body-wrap--2">
                        <label for="category" class="modal-container__body-span">Nhóm:</label>
                        <select name="category" id="category" class="modal-container__body-input">
                          <?php
                          $cate = new category();
                          $cateList = $cate->get_category();
                          foreach ($cateList as $category) {
                          ?>
                            <option <?php if ($category['IdCategory'] == $data['IdCategory']) {
                                      echo 'selected';
                                    } ?> value="<?php echo $category['IdCategory'] ?>"><?php echo $category['NameCategory'] ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="margin8px"></div>
                      <div class="modal-container__body-wrap--2">
                        <label for="supplier" class="modal-container__body-span">Cung cấp bởi:</label>
                        <select name="supplier" id="supplier" class="modal-container__body-input">
                          <?php
                          $supplier = new Supplier();
                          $supplierList = $supplier->get_supplier();
                          foreach ($supplierList as $supp) {
                          ?>
                            <option <?php if ($supp['IdSupplier'] == $data['IdSupplier']) {
                                      echo 'selected';
                                    } ?> value="<?php echo $supp['IdSupplier'] ?>"><?php echo $supp['NameSupplier'] ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="modal-container__body-wrap">
                      <div class="modal-container__body-description">
                        <label for="supplier" class="modal-container__body-span">Mô tả:</label>
                        <textarea name="description" id="editor1"><?php echo $data['Descrip'] ?></textarea>
                        <script>
                          CKEDITOR.replace('editor1', {
                            width: '100%',
                            height: 100,
                          });
                        </script>
                      </div>
                    </div>
                    <div class="modal-container__check">
                      <span>Trạng thái:</span>
                      <input <?= ($data['StatusProduct'] == 1) ? 'checked' : '' ?> type="checkbox" name="checkStatus" value="1" id="checkStatus">
                      <label for="checkStatus">(Check để hiện sản phẩm)</label>
                    </div>
                    <div class="modal-container__body-upImg">
                      <span class="modal-container__body-upImg-title">Hình ảnh 1:</span>
                      <input type="file" name="img1" id="" class="modal-container__body-upImg-input">
                      <img class="editProduct__img" src="../../public/web/img/products/<?php echo $data['ProductImg1'] ?>" alt="ProductImg">
                    </div>
                    <div class="modal-container__body-upImg">
                      <span class="modal-container__body-upImg-title">Hình ảnh 2:</span>
                      <input type="file" name="img2" id="" class="modal-container__body-upImg-input">
                      <img class="editProduct__img" src="../../public/web/img/products/<?php echo $data['ProductImg2'] ?>" alt="ProductImg">
                    </div>
                    <div class="modal-container__body-upImg">
                      <span class="modal-container__body-upImg-title">Hình ảnh 3:</span>
                      <input type="file" name="img3" id="" class="modal-container__body-upImg-input">
                      <img class="editProduct__img" src="../../public/web/img/products/<?php echo $data['ProductImg3'] ?>" alt="ProductImg">
                    </div>
                    <div class="modal-container__body-upImg">
                      <span class="modal-container__body-upImg-title">Hình ảnh 4:</span>
                      <input type="file" name="img4" id="" class="modal-container__body-upImg-input">
                      <img class="editProduct__img" src="../../public/web/img/products/<?php echo $data['ProductImg4'] ?>" alt="ProductImg">
                    </div>
                    <div class="modal-container__body-upImg">
                      <span class="modal-container__body-upImg-title">Hình ảnh 5:</span>
                      <input type="file" name="img5" id="" class="modal-container__body-upImg-input">
                      <img class="editProduct__img" src="../../public/web/img/products/<?php echo $data['ProductImg5'] ?>" alt="ProductImg">
                    </div>
                    <div class="modal-container__body-wrap">
                      <?php
                      if (isset($updateCate)) {
                        echo $updateCate;
                      }
                      ?>
                    </div>
                    <div class="modal-container__body-action">
                      <a href="ProductList.php" class="btn btn--close">
                        Trở về
                      </a>
                      <button class="btn btn--primary">
                        Sửa
                      </button>
                    </div>
                  </div>
                </form>
            <?php
              }
            }
            ?>
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