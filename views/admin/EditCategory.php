<?php
include '../../Classes/admin/category.php';
?>

<?php
include '../../inc/admin/header.php';
?>

<body>
  <?php
  include '../../inc/admin/sidebar.php';
  ?>
  <?php
  $cate = new category();
  if (!isset($_GET['cateId']) || $_GET['cateId'] == NULL)
    echo "<script>window.location = 'CategoryList.php'</script> ";
  else
    $id = filter_input(INPUT_GET, 'cateId');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateCate = $cate->update_category($_POST, $_FILES, $id);
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
            $get_cate_name = $cate->get_cateById($id);
            if ($get_cate_name) {
              foreach ($get_cate_name as $data) {
            ?>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-container-category__body">
                    <div class="modal-container__body-wrap">
                      <label for="nameProduct" class="modal-container__body-span">ID:</label>
                      <input value="<?php echo $data['IdCategory'] ?>" id="nameProduct" type="text" class="modal-container__body-input" disabled>
                    </div>
                    <div class="modal-container__body-wrap">
                      <label for="nameProduct" class="modal-container__body-span">Tên danh mục:</label>
                      <input name="cateName" value="<?php echo $data['NameCategory'] ?>" id="nameProduct" type="text" class="modal-container__body-input">
                    </div>
                    <div class="modal-container__body-wrap">
                      <div class="modal-container__body-description">
                        <label class="modal-container__body-span">Mô tả:</label>
                        <textarea name="description" id="editor1"><?php echo $data['Title'] ?></textarea>
                        <script>
                          CKEDITOR.replace('editor1', {
                            width: '100%',
                            height: 100,
                          });
                        </script>
                      </div>
                    </div>
                    <div class="modal-container__body-wrap">
                      <?php
                      if (isset($updateCate)) {
                        echo $updateCate;
                      }
                      ?>
                    </div>
                    <div class="modal-container__body-upImg">
                      <span class="modal-container__body-upImg-title">Hình ảnh 1:</span>
                      <input type="file" name="img" id="" class="modal-container__body-upImg-input">
                      <img class="editProduct__img" src="../../public/admin/Image/web/<?php echo $data['img'] ?>" alt="CategoryImg">
                    </div>
                    <div class="modal-container__body-action">
                      <a href="CategoryList.php" class="btn btn--close">
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