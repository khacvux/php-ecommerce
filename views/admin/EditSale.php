<?php
include '../../Classes/admin/sale.php';
?>

<?php
include '../../inc/admin/header.php';
?>

<body>
  <?php
  include '../../inc/admin/sidebar.php';
  ?>
  <?php
  $sale = new sale();
  if (!isset($_GET['saleId']) || $_GET['saleId'] == NULL)
    echo "<script>window.location = 'SaleList.php'</script> ";
  else
    $id = filter_input(INPUT_GET, 'saleId');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nameSale = filter_input(INPUT_POST, 'nameSale');
    $discount = filter_input(INPUT_POST, 'discount');
    $description = filter_input(INPUT_POST, 'description');
    $updateSale = $sale->update_sale($nameSale, $discount, $description, $id);
  }
  ?>
  <div class="container">
    <div class="grid">
      <div class="row no-gutters">
        <div class="col l-o-3 l-6 m-12 c-12">
          <div class="editForm">
            <div class="modal-container__heading">
              <h4 class="modal-container__heading-title">
                Sửa khuyến mãi
              </h4>
            </div>
            <?php
            $get_sale_name = $sale->get_saleById($id);
            if ($get_sale_name) {
              foreach ($get_sale_name as $data) {
            ?>
                <form action="" method="post">
                  <div class="modal-container__body">
                    <div class="modal-container__body-wrap">
                      <label for="nameProduct" class="modal-container__body-span">Tên khuyến mãi:</label>
                      <input name="nameSale" id="nameProduct" type="text" class="modal-container__body-input" value="<?php echo $data['NameSale'] ?>">
                    </div>
                    <div class="modal-container__body-wrap">
                      <label for="discount" class="modal-container__body-span">Giá trị:</label>
                      <input name="discount" id="discount" type="text" class="modal-container__body-input" value="<?php echo $data['Percent'] ?>">
                    </div>
                    <div class="modal-container__body-wrap">
                      <div class="modal-container__body-description">
                        <label class="modal-container__body-span">Mô tả:</label>
                        <textarea name="description" id="editor1"><?php echo $data['DescripSale'] ?></textarea>
                        <script>
                          CKEDITOR.replace('editor1', {
                            width: '100%',
                            height: 100,
                          });
                        </script>
                      </div>
                    </div>
                    <?php
                    if (isset($updateSale)) {
                      echo $updateSale;
                    }
                    ?>
                    <div class="modal-container__body-action">
                      <a href="SaleList.php" class="btn btn--close">
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