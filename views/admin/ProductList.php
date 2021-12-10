<?php
include '../../Classes/admin/supplier.php';
include '../../Classes/admin/category.php';
include '../../Classes/admin/product.php';
include '../../Classes/admin/sale.php';
include '../../Classes/admin/type.php';
?>

<?php
$product = new product();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $insertProduct = $product->insert_product($_POST, $_FILES);
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $deleteProduct = $product->delete_product($id);
}
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
      <div class="productList-wrap">
        <div class="row m-gutter">
          <div class="col l-12 m-12 c-12">
            <div class="productList">
              <div class="productList__heading">
                <h4 class="productList__heading-title">
                  Sản phẩm
                </h4>

                <div class="productList__heading-button-wrap">
                  <button class="btn--delete">
                    <i class='bx bx-minus-circle'></i>
                    Xóa
                  </button>
                  <button class="productList__heading-button--add js-productList__heading-button--add">
                    <i class='bx bx-plus-circle'></i>
                    Thêm mới
                  </button>
                </div>
              </div>
              <div class="productList__body">
                <div class="productList__body-heading">
                  <div class="productList__body-length">
                    Hiển thị
                    <input class="productList__body-length-input" id="limit" type="number" min="5" step="5" value="5" max="20">
                    mục
                  </div>
                  <div class="productList__body-search">
                    <input id="search" type="text" class="productList__body-search-input" placeholder="Tìm kiếm">
                  </div>
                  <script type="text/javascript">
                    $('#search').keyup(function() {
                      var txt = $('#search').val();
                      $.post('../../Classes/admin/searchProduct.php', {
                        data: txt
                      }, function(data) {
                        $('.list').html(data);
                      })
                    })
                  </script>
                </div>
                <div class="productList__body-list list">
                  <div class="productList__body-list-heading">
                    <div class="productList__body-list-heading-check">
                      <input type="checkbox" onClick="toggle(this)" name="check" id="">
                    </div>
                    <span>Image</span>
                    <span>Product name</span>
                    <span>Amount</span>
                    <span>Quantity</span>
                    <span>Date</span>
                    <span>Action</span>
                  </div>
                  <div id='content'>
                    <?php
                    $product = new product();
                    $productList = $product->get_product();
                    foreach ($productList as $data) {
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
                    ?>
                  </div>
                </div>
                <ul class="pagination">
                  <li class="pagination-item">
                    <label onclick="decrement(this)"><i class='bx bx-chevron-left'></i></label>
                  </li>
                  <li class="pagination-item">
                    <input class="pagination--active" style="width: 42px" value="1" id="page" disabled></input>
                  </li>
                  <li class="pagination-item">
                    <label onclick="increment(this)"><i class='bx bx-chevron-right'></i></label>
                  </li>
                  <input id="listPages" hidden></input>
                </ul>
                <input type="text" value="<?php echo $product->quantity_Product() ?>" hidden id="inputQuantity"></input>

                <script>
                  function decrement(Object) {
                    var input = Object.parentElement.parentElement.children[1].children[0];
                    var oldPage = parseInt(input.value);
                    if (oldPage > 1) {
                      input.setAttribute('value', oldPage - 1)
                    }
                  }

                  function increment(Object) {
                    var input = Object.parentElement.parentElement.children[1].children[0];
                    var oldPage = parseInt(input.value);
                    if (oldPage < document.getElementById('listPages').value) {
                      input.setAttribute('value', oldPage + 1)
                    }
                  }

                  $(document).ready(function() {
                    var input = document.getElementById('page');
                    var value = 1;
                    inputElement = document.getElementById('limit');
                    inputQuantity = document.getElementById('inputQuantity');
                    inputTotalPage = document.getElementById('listPages');
                    quantity = parseInt(inputQuantity.value);
                    limit = 5;
                    totalPage = quantity / limit;
                    inputTotalPage.setAttribute('value', totalPage);

                    $('.pagination').on('click', 'label', function() {
                      value = parseInt(input.value);
                      var limit = inputElement.value;
                      $.post('../../Classes/admin/pagination.php', {
                          page: value,
                          limit: limit
                        },
                        function(data) {
                          $('#content').html(data);
                        })
                    })
                    inputElement.onchange = function(e) {
                      value = parseInt(input.value);
                      limit = e.target.value;
                      totalPage = quantity / limit;
                      inputTotalPage.setAttribute('value', totalPage);

                      $.post('../../Classes/admin/pagination.php', {
                          page: value,
                          limit: limit
                        },
                        function(data) {
                          $('#content').html(data);
                        })
                    }
                  })
                </script>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include '../../inc/admin/footer.php';
  ?>

  <div class="modal js-modal">
    <div class="modal-container js-modal-container">
      <div class="modal-container__heading">
        <h4 class="modal-container__heading-title">
          Thêm sản phẩm
        </h4>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-container__body">
          <div class="modal-container__body-wrap">
            <label for="nameProduct" class="modal-container__body-span">Tên sản phẩm:</label>
            <input name="nameProduct" id="nameProduct" type="text" class="modal-container__body-input">
          </div>
          <div class="modal-container__body-wrap">
            <div class="modal-container__body-wrap--2">
              <label for="price" class="modal-container__body-span">Giá:</label>
              <input name="price" id="price" type="text" class="modal-container__body-input">
            </div>
            <div class="margin8px"></div>
            <div class="modal-container__body-wrap--2">
              <label for="quantity" class="modal-container__body-span">Số lượng:</label>
              <input name="quantity" id="quantity" type="text" class="modal-container__body-input">
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
                  <option value="<?php echo $typeData['IdType'] ?>"><?php echo $typeData['Mass'] . 'kg' ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="margin8px"></div>
            <div class="modal-container__body-wrap--2">
              <label for="date" class="modal-container__body-span">Sale:</label>
              <select name="sale" id="type" class="modal-container__body-input">
                <?php
                $sale = new sale();
                $saleList = $sale->get_sale();
                foreach ($saleList as $saleData) {
                ?>
                  <option value="<?php echo $saleData['IdSale'] ?>"><?php echo $saleData['NameSale'] ?></option>
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
                foreach ($cateList as $data) {
                ?>
                  <option value="<?php echo $data['IdCategory'] ?>"><?php echo $data['NameCategory'] ?></option>
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
                foreach ($supplierList as $data) {
                ?>
                  <option value="<?php echo $data['IdSupplier'] ?>"><?php echo $data['NameSupplier'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="modal-container__body-wrap">
            <div class="modal-container__body-description">
              <label for="editor1" class="modal-container__body-span">Mô tả:</label>
              <textarea name="description" id="editor1"></textarea>
            </div>
            <script>
              CKEDITOR.replace('editor1', {
                width: '100%',
                height: 70,
              });
            </script>
          </div>
          <div class="modal-container__check">
            <span>Trạng thái:</span>
            <input type="checkbox" name="checkStatus" value="1" id="checkStatus">
            <label for="checkStatus">(Check để hiện sản phẩm)</label>
          </div>
          <div class="modal-container__body-upImg">
            <span class="modal-container__body-upImg-title">Hình ảnh 1:</span>
            <input type="file" name="Img1" id="" class="modal-container__body-upImg-input">
          </div>
          <div class="modal-container__body-upImg">
            <span class="modal-container__body-upImg-title">Hình ảnh 2:</span>
            <input type="file" name="Img2" id="" class="modal-container__body-upImg-input">
          </div>
          <div class="modal-container__body-upImg">
            <span class="modal-container__body-upImg-title">Hình ảnh 3:</span>
            <input type="file" name="Img3" id="" class="modal-container__body-upImg-input">
          </div>
          <div class="modal-container__body-upImg">
            <span class="modal-container__body-upImg-title">Hình ảnh 4:</span>
            <input type="file" name="Img4" id="" class="modal-container__body-upImg-input">
          </div>
          <div class="modal-container__body-upImg">
            <span class="modal-container__body-upImg-title">Hình ảnh 5:</span>
            <input type="file" name="Img5" id="" class="modal-container__body-upImg-input">
          </div>
          <div class="modal-container__body-action">
            <button class="btn btn--close js-modal-container__body-action-button--back">
              Trở về
            </button>
            <input type="submit" value="Thêm" class="btn btn--primary" />
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="../../public/admin/js/script.js"></script>
  <script src="../../public/admin/js/pagination.js"></script>
  <script src="../../public/admin/js/productList.js"></script>

</body>

</html>