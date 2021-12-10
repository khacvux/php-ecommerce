<?php
include_once '../../Classes/admin/web.php';
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $insertImg = $web->insert_Img($_POST, $_FILES);
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $deleteImg = $web->delete_img($id);
    }
    ?>
    <div class="container">
        <div class="grid">
            <div class="OrderList-wrap">
                <div class="row m-gutter">
                    <div class="col l-12 m-12 c-12">
                        <div class="OrderList">
                            <div class="OrderList-heading">
                                <h4 class="OrderList-heading__title">
                                    Hình ảnh LandingPage
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
                                            <td style='font-weight: 500; font-size:1.6rem'>Hình ảnh</td>
                                            <td style='font-weight: 500; font-size:1.6rem'>Mô tả</td>
                                            <td style='font-weight: 500; font-size:1.6rem'>Hoạt động</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $get_img = $web->get_img();
                                        if ($get_img) {
                                            foreach ($get_img as $data) {
                                        ?>
                                                <tr>
                                                    <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['IdImg'] ?></td>
                                                    <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['Img'] ?></td>
                                                    <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['Title'] ?></td>
                                                    <td>
                                                        <a href="ImgDetail.php?imgId=<?php echo  $data['IdImg'] ?>" title="Xem chi tiết" class="icon"><i class='action__icon--eye js-action__icon--eye bx bx-low-vision'></i></a>
                                                        <a href="EditImgLandingPage.php?imgId=<?php echo  $data['IdImg'] ?>" title="Chỉnh sửa" class="icon"><i class='action__icon--edit js-productList__body-item-Action-icon--edit bx bx-edit'></i></a>
                                                        <a href="?delete=<?php echo $data['IdImg'] ?>" onClick="return confirm('Bạn có muốn xóa không?')" title="Xóa" class="icon"><i class='action__icon--delete bx bxs-trash'></i></a>
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
        <div class="modal-container js-modal-container">
            <div class="modal-container__heading">
                <h4 class="modal-container__heading-title">
                    Thêm hình ảnh
                </h4>
            </div>
            <form action="ImgLandingPage.php" method="post" enctype="multipart/form-data">
                <div class="modal-container__body">
                    <div class="modal-container__body-wrap">
                        <label for="title" class="modal-container__body-span">Mô tả:</label>
                        <input name="title" id="title" type="text" class="modal-container__body-input">
                    </div>
                    <div class="modal-container__body-upImg">
                        <span class="modal-container__body-upImg-title">Hình ảnh:</span>
                        <input name="img1" type="file" id="img1" class="modal-container__body-upImg-input">
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
                "pageLength": 10,
                "lengthMenu": [10, 15, 20, 30]
            });
        });
    </script>
</body>

</html>