<?php
include '../../Classes/admin/type.php';
?>

<?php
$type = new type();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nameType = filter_input(INPUT_POST, 'nameType');
  $mass = filter_input(INPUT_POST, 'mass');

  $insertType = $type->insert_type($nameType, $mass);
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $deleteType = $type->delete_type($id);
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
                  Loại sản phẩm
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
                      <td style='font-weight: 500; font-size:1.6rem'>Tên loại</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Khối lượng</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Hoạt động</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $types = $type->get_type();
                    if ($types) {
                      foreach ($types as $data) {
                    ?>
                        <tr>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['IdType'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['NameType'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['Mass'] . 'kg' ?></td>
                          <td>
                            <a href="EditTypes.php?typeId=<?php echo  $data['IdType'] ?>" title="Chỉnh sửa" class="icon"><i class='action__icon--edit bx bx-edit'></i></a>
                            <a href="?delete=<?php echo $data['IdType'] ?>" onClick="return confirm('Bạn có muốn xóa không?')" title="Xóa" class="icon"><i class='action__icon--delete bx bxs-trash'></i></a>
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
          Thêm loại sản phẩm
        </h4>
      </div>
      <form action="Types.php" method="post">
        <div class="modal-container-category__body">
          <div class="modal-container__body-wrap">
            <label for="nameType" class="modal-container__body-span">Tên loại:</label>
            <input name="nameType" id="nameType" type="text" class="modal-container__body-input">
          </div>
          <div class="modal-container__body-wrap">
            <label for="mass" class="modal-container__body-span">Khối lượng:</label>
            <input name="mass" id="mass" type="text" class="modal-container__body-input">
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
      </form>
    </div>
  </div>

  <script src="../../public/admin/js/script.js"></script>
  <script src="../../public/admin/js/productList.js"></script>
  <script>
    $(document).ready(function() {
      $('#table_id').DataTable({
        "pageLength": 5,
        "lengthMenu": [ 5, 10, 15, 20 ]
      });
    });
  </script>
</body>

</html>