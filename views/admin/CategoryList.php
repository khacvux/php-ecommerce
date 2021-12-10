<?php
include '../../Classes/admin/category.php';
?>

<?php
$cate = new category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $cateName = filter_input(INPUT_POST, 'cateName');
  $description = filter_input(INPUT_POST, 'description');

  $insertCate = $cate->insert_category($cateName, $description);
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $deleteCate = $cate->delete_category($id);
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
                  Danh mục sản phẩm
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
                <!-- <div class="productList__body-heading">
                  <div class="productList__body-length">
                    Hiển thị
                    <input class="productList__body-length-input" type="number" min="5" step="5" value="5" max="20">
                    mục
                  </div>
                  <div class="productList__body-search">
                    <input type="text" class="productList__body-search-input" placeholder="Tìm kiếm">
                  </div>
                </div>
                <div class="OrderList-content">
                  <div class="Category-content-row">
                    <div class="OrderList-content-row-check">
                      <input type="checkbox" onClick="toggle(this)" name="check" id="">
                    </div>
                    <div class="OrderList-content-row__td">
                      <span class="span-heading">ID</span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span class="span-heading">Tên danh mục</span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span class="span-heading">Mô tả</span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span class="span-heading">Hoạt động</span>
                    </div>
                  </div>
                  <div class="Category-content-row">
                    <div class="OrderList-content-row-check">
                      <input type="checkbox" name="check" id="" class="OrderList-content-row-checkbox">
                    </div>
                    <div class="OrderList-content-row__td">
                      <span><?php echo $result['IdCategory'] ?></span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span><?php echo $result['NameCategory'] ?></span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span><?php echo $result['Title'] ?></span>
                    </div>
                    <div class="body-action">
                      <a href="EditCategory.php?cateId=<?php echo $result['IdCategory'] ?>" title="Chỉnh sửa" class="icon"><i class='action__icon--edit js-productList__body-item-Action-icon--edit bx bx-edit'></i></a>
                      <a href="?delete=<?php echo $result['IdCategory'] ?>" onClick="return confirm('Bạn có muốn xóa không?')" title="Xóa" class="icon"><i class='action__icon--delete bx bxs-trash'></i></a>
                    </div>
                  </div>
                </div>
                <ul class="pagination">
                  <li class="pagination-item">
                    <i class='bx bx-chevron-left'></i>
                  </li>
                  <li class="pagination-item">
                    <a href="" class="pagination--active">1</a>
                  </li>
                  <li class="pagination-item">
                    <i class='bx bx-chevron-right'></i>
                  </li>
                </ul> -->

                <table id="table_id" class="table-bordered display" style="width:100%">
                  <thead>
                    <tr>
                      <td style='font-weight: 500; font-size:1.6rem'>ID</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Tên danh mục</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Mô tả</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Hoạt động</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $show_cate = $cate->get_category();
                    if ($show_cate) {
                      foreach ($show_cate as $data) {
                    ?>
                        <tr>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['IdCategory'] ?></span></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['NameCategory'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['Title'] ?></td>
                          <td>
                            <a href="EditCategory.php?cateId=<?php echo $data['IdCategory'] ?>" title="Chỉnh sửa" class="icon"><i class='action__icon--edit js-productList__body-item-Action-icon--edit bx bx-edit'></i></a>
                            <a href="?delete=<?php echo $data['IdCategory'] ?>" onClick="return confirm('Bạn có muốn xóa không?')" title="Xóa" class="icon"><i class='action__icon--delete bx bxs-trash'></i></a>
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
          Thêm danh mục
        </h4>
      </div>
      <div class="modal-container-category__body">
        <form action="CategoryList.php" method="post">
          <div class="modal-container__body-wrap">
            <label for="nameProduct" class="modal-container__body-span">Tên danh mục:</label>
            <input name="cateName" id="nameProduct" type="text" class="modal-container__body-input">
          </div>
          <div class="modal-container__body-wrap">
            <div class="modal-container__body-description">
              <label class="modal-container__body-span">Mô tả:</label>
              <textarea name="description" id="editor1"></textarea>
              <script>
                CKEDITOR.replace('editor1', {
                  width: '100%',
                  height: 100,
                });
              </script>
            </div>
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

  <script src="../../public/admin/js/script.js"></script>
  <script src="../../public/admin/js/productList.js"></script>
  <script>
    $(document).ready(function() {
      $('#table_id').DataTable({
        "pageLength": 10,
        "lengthMenu": [10, 15, 20, 30]
      });
    });
  </script>

</body>

</html>