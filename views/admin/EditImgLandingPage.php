<?php
include '../../Classes/admin/web.php';
?>

<?php
include '../../inc/admin/header.php';
?>

<body>
  <?php
  include '../../inc/admin/sidebar.php';
  ?>
  <?php
  $web = new web();
  if (!isset($_GET['imgId']) || $_GET['imgId'] == NULL)
    echo "<script>window.location = 'ImgLandingPage.php'</script> ";
  else
    $id = filter_input(INPUT_GET, 'imgId');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateImg = $web->update_img($_POST, $_FILES, $id);
  }
  ?>
  <div class="container">
    <div class="grid">
      <div class="row no-gutters">
        <div class="col l-o-3 l-6 m-12 c-12">
          <div class="editForm">
            <div class="modal-container__heading">
              <h4 class="modal-container-category__heading-title">
                Sửa danh mục
              </h4>
            </div>
            <?php
            $get_img = $web->get_imgById($id);
            if ($get_img) {
              foreach ($get_img as $data) {
            ?>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-container-category__body">
                    <div class="modal-container__body-wrap">
                      <label for="id" class="modal-container__body-span">ID:</label>
                      <input value="<?php echo $data['IdImg'] ?>" id="id" type="text" class="modal-container__body-input" disabled>
                    </div>
                    <div class="modal-container__body-wrap">
                      <label for="description" class="modal-container__body-span">Mô tả:</label>
                      <input name="description" value="<?php echo $data['Title'] ?>" id="description" type="text" class="modal-container__body-input">
                    </div>
                    <div class="modal-container__body-upImg">
                      <span class="modal-container__body-upImg-title">Hình ảnh 1:</span>
                      <input type="file" name="img" id="" class="modal-container__body-upImg-input">
                      <img class="editProduct__img" src="../../public/admin/Image/web/<?php echo $data['Img'] ?>" alt="CategoryImg">
                    </div>
                    <div class="modal-container__body-wrap">
                      <?php
                      if (isset($updateImg)) {
                        echo $updateImg;
                      }
                      ?>
                    </div>
                    <div class="modal-container__body-action">
                      <a href="ImgLandingPage.php" class="btn btn--close">
                        Trở về
                      </a>
                      <input type="submit" value="Sửa" class="btn btn--primary" />
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