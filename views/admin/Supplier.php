<?php
include '../../Classes/admin/supplier.php';
?>

<?php
$supplier = new Supplier();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $supplierName = filter_input(INPUT_POST, 'supplierName');
  $supplierAddress = filter_input(INPUT_POST, 'supplierAddress');
  $linkWeb = filter_input(INPUT_POST, 'linkWeb');
  $width = 200;
  $height = 200;
  if (isset($linkWeb)) {
    $url = "https://chart.googleapis.com/chart?cht=qr&chs={$width}x{$height}&chl={$linkWeb}";
    $insertSupplier = $supplier->insert_supplier($supplierName, $supplierAddress, $linkWeb, $url);
  }
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $deleteSupplier = $supplier->delete_supplier($id);
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
      <div class="OrderList-wrap">
        <div class="row m-gutter">
          <div class="col l-12 m-12 c-12">
            <div class="OrderList">
              <div class="OrderList-heading">
                <h4 class="OrderList-heading__title">
                  Nhà cung cấp
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
              <div class="OrderList-body">
                <table id="table_id" class="table-bordered display" style="width:100%">
                  <thead>
                    <tr>
                      <td style='font-weight: 500; font-size:1.6rem'>ID</td>
                      <td style='font-weight: 500; font-size:1.6rem'>QRCode</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Tên nhà cung cấp</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Địa chỉ</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Hoạt động</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $show_supplier = $supplier->get_supplier();
                    if ($show_supplier) {
                      $i = 0;
                      while ($result = $show_supplier->fetch_assoc()) {
                        $i++;
                    ?>
                        <tr>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $result['IdSupplier'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><img src="<?php echo $result['QRCode'] ?>" alt="QRCode" class="ImgQR"></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $result['NameSupplier'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $result['AddressSupplier'] ?></td>
                          <td>
                            <a href="<?php echo $result['linkWebsite'] ?>" target="_blank" title="Xem chi tiết" class="icon"><i class='action__icon--eye js-action__icon--eye bx bx-low-vision'></i></a>
                            <a href="EditSupplier.php?supplierId=<?php echo $result['IdSupplier'] ?>" title="Chỉnh sửa" class="icon"><i class='action__icon--edit js-productList__body-item-Action-icon--edit bx bx-edit'></i></a>
                            <a href="?delete=<?php echo $result['IdSupplier'] ?>" onClick="return confirm('Bạn có muốn xóa không?')" title="Xóa" class="icon"><i class='action__icon--delete bx bxs-trash'></i></a>
                          </td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>

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
    <div class="modal-container-category js-modal-container">
      <div class="modal-container__heading">
        <h4 class="modal-container-category__heading-title">
          Thêm nhà cung cấp
        </h4>
      </div>
      <div class="modal-container-category__body">
        <form action="Supplier.php" method="post">
          <div class="modal-container__body-wrap">
            <label for="nameSupplier" class="modal-container__body-span">Tên nhà cung cấp:</label>
            <input name="supplierName" id="nameSupplier" type="text" class="modal-container__body-input">
          </div>
          <div class="modal-container__body-wrap">
            <label for="address" class="modal-container__body-span">Địa chỉ:</label>
            <input name="supplierAddress" id="address" type="text" class="modal-container__body-input">
          </div>
          <div class="modal-container__body-wrap">
            <label for="linkWeb" class="modal-container__body-span">Link Website:</label>
            <input name="linkWeb" id="linkWeb" type="text" class="modal-container__body-input">
          </div>
          <div class="modal-container__body-action">
            <button class="btn btn--close js-modal-container__body-action-button--back">
              Trở về
            </button>
            <input type="submit" value="Thêm" class="btn btn--primary" />
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- <div class="modal js-modal2">
    <div class="modal-container-category js-modal-container">
      <div class="modal-container__heading">
        <h4 class="modal-container-category__heading-title">
          Sửa thông tin nhà cung cấp
        </h4>
      </div>
      <div class="modal-container-category__body">
        <div class="modal-container__body-wrap">
            <label for="nameProduct" class="modal-container__body-span" >ID:</label>
            <input id="nameProduct" type="text" class="modal-container__body-input" disabled>
          </div>
        <div class="modal-container__body-wrap">
          <label for="nameProduct" class="modal-container__body-span" >Tên nhà cung cấp:</label>
          <input id="nameProduct" type="text" class="modal-container__body-input">
        </div>
        <div class="modal-container__body-wrap">
            <label for="nameProduct" class="modal-container__body-span" >Địa chỉ:</label>
            <input id="nameProduct" type="text" class="modal-container__body-input">
          </div>
        <div class="modal-container__body-action">
          <button class="btn btn--close js-modal-container__body-action-button--back">
            Trở về
          </button>
          <button class="btn btn--primary">
            Thêm
          </button>
        </div>
      </div>
    </div>
  </div> -->


  <script src="../../public/admin/js/script.js"></script>
  <script src="../../public/admin/js/productList.js"></script>

  <script>
    $(document).ready(function() {
      $('#table_id').DataTable({
        "pageLength": 10,
        "lengthMenu": [ 10, 15, 20, 30, ]
      });
    });
  </script>

</body>

</html>