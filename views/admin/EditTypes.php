<?php
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
    $type= new type();
    if(!isset($_GET['typeId']) || $_GET['typeId'] == NULL)
      echo "<script>window.location = 'Types.php'</script> ";
    else
      $id = filter_input(INPUT_GET, 'typeId');

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $nameType = filter_input(INPUT_POST, 'nameType');
      $mass = filter_input(INPUT_POST, 'mass');
      $updateType = $type->update_type($nameType, $mass, $id);
    }
  ?>

  <div class="container">
    <div class="grid">
      <div class="row no-gutters">
        <div class="col l-o-3 l-6 m-12 c-12">
          <div class="editForm">
            <div class="modal-container__heading">
              <h4 class="modal-container-category__heading-title">
                Sửa thông tin loại sản phẩm
              </h4>
            </div>
            <?php
            $get_type = $type->get_typeById($id);
            if ($get_type) {
              foreach ($get_type as $data) {
            ?>
                <form action="" method="post">
                  <div class="modal-container-category__body">
                    <div class="modal-container__body-wrap">
                      <label for="idType" class="modal-container__body-span">ID:</label>
                      <input id="idType" type="text" class="modal-container__body-input" disabled value="<?php echo $data['IdType'] ?>">
                    </div>
                    <div class="modal-container__body-wrap">
                      <label for="nameType" class="modal-container__body-span">Tên loại:</label>
                      <input name="nameType" id="nameType" type="text" class="modal-container__body-input" value="<?php echo $data['NameType'] ?>">
                    </div>
                    <div class="modal-container__body-wrap">
                      <label for="mass" class="modal-container__body-span">Khối lượng:</label>
                      <input name="mass" id="mass" type="text" class="modal-container__body-input" value="<?php echo $data['Mass'] ?>">
                    </div>
                    <?php 
                        if(isset($updateType))
                        {
                          echo $updateType;
                        }
                    ?>
                    <div class="modal-container__body-action">
                      <a href="Types.php" class="btn btn--close">
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