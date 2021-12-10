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
        $updateWeb = $web->update_web($_POST, $_FILES);
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $deleteLogo = $web->delete_logo($id);
    }

    if (isset($_GET['delete2'])) {
        $id = $_GET['delete2'];
        $deleteFavicon = $web->delete_favicon($id);
      }
    ?>
    <div class="container">
        <div class="grid">
            <div class="Form-wrap">
                <div class="row no-gutters">
                    <div class="col l-12 m-12 c-12">
                        <div class="Form">
                            <div class="user-container">
                                <?php
                                $get_webInfo = $web->get_web();
                                if ($get_webInfo) {
                                    foreach ($get_webInfo as $data) {
                                ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="InfoWeb-heading">
                                                <h1 class="InfoWeb-heading__title">
                                                    Thiết lập website
                                                    <button class="InfoWeb-heading__button btn--primary">
                                                        <i class='InfoWeb-form__sub-button-wrap--icon bx bx-save'></i>
                                                        Lưu dữ liệu
                                                    </button>
                                                </h1>
                                            </div>
                                            <div class="row InfoWeb-container">
                                                <div class="col l-4 m-12 c-12">
                                                    <h3 class="InfoWeb-header">Thông tin cơ bản</h3>
                                                    <p class="InfoWeb-header__title">Thông tin cơ bản của website</p>
                                                </div>
                                                <div class="col l-8 m-12 c-12">
                                                    <div class="InfoWeb-form">
                                                        <div class="InfoWeb-form__sub">
                                                            <label for="name" class="InfoWeb-form__title">Tên website</label>
                                                            <input name="name" value="<?php echo $data['webname'] ?> " id="name" type="text" class="InfoWeb-form__input">
                                                        </div>
                                                        <div class="InfoWeb-form__sub">
                                                            <label class="InfoWeb-form__title">Mô tả website</label>
                                                            <textarea name="editor1" id="editor1"><?php echo $data['title'] ?></textarea>
                                                            <script>
                                                                CKEDITOR.replace('editor1', {
                                                                    width: '100%',
                                                                    height: 100,
                                                                });
                                                            </script>
                                                        </div>
                                                        <div class="InfoWeb-form__sub">
                                                            <label for="address" class="InfoWeb-form__title">Địa chỉ</label>
                                                            <input name="address" value="<?php echo $data['addressWeb'] ?> " id="address" type="text" class="InfoWeb-form__input">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row InfoWeb-container">
                                                <div class="col l-4 m-12 c-12">
                                                    <h3 class="InfoWeb-header">Logo</h3>
                                                    <p class="InfoWeb-header__title">Chấp nhận file .png .jpg .jpeg</p>
                                                </div>
                                                <div class="col l-8 m-12 c-12">
                                                    <div class="InfoWeb-form">
                                                        <div class="InfoWeb-form__sub">
                                                            <div class="InfoWeb-form__sub--img" style="background-image: url('<?php echo '../../public/admin/Image/web/' . $data['logo'] ?>');"></div>
                                                        </div>
                                                        <div class="InfoWeb-form__sub-button-wrap">
                                                            <input value="<?php echo $data['logo'] ?> " type="file" name="img1" class="InfoWeb-form__sub-button-wrap--up js-file1">
                                                            <span id='val1'></span>
                                                            <span id='button1'>
                                                                <i class='InfoWeb-form__sub-button-wrap--icon bx bx-upload'></i>
                                                                Chọn ảnh
                                                            </span>
                                                            <a href="?delete=<?php echo $data['IdWeb'] ?>" onClick="return confirm('Bạn có muốn xóa không?')" class="InfoWeb-form__sub-button-wrap--delete">
                                                                <i class='InfoWeb-form__sub-button-wrap--icon bx bxs-trash'></i>
                                                                Xóa
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row InfoWeb-container">
                                                <div class="col l-4 m-12 c-12">
                                                    <h3 class="InfoWeb-header">Favicon</h3>
                                                    <p class="InfoWeb-header__title">Favicon sẽ hiển thị bên cạnh tab trình duyệt. Kích thước khuyến nghị: 50x50 (px). Chấp nhận file .png .jpg .jpeg.</p>
                                                </div>
                                                <div class="col l-8 m-12 c-12">
                                                    <div class="InfoWeb-form">
                                                        <div class="InfoWeb-form__sub">
                                                            <div class="InfoWeb-form__sub--img" style="background-image: url('<?php echo '../../public/admin/Image/web/' . $data['favicon'] ?>');"></div>
                                                        </div>
                                                        <div class="InfoWeb-form__sub-button-wrap">
                                                            <input value="<?php echo $data['favicon'] ?> " type="file" name="img2" class="InfoWeb-form__sub-button-wrap--up js-file2">
                                                            <span id='val2'></span>
                                                            <span id='button2'>
                                                                <i class='InfoWeb-form__sub-button-wrap--icon bx bx-upload'></i>
                                                                Chọn ảnh
                                                            </span>
                                                            <a href="?delete2=<?php echo $data['IdWeb'] ?>" onClick="return confirm('Bạn có muốn xóa không?')" class="InfoWeb-form__sub-button-wrap--delete">
                                                                <i class='InfoWeb-form__sub-button-wrap--icon bx bxs-trash'></i>
                                                                Xóa
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row InfoWeb-container">
                                                <div class="col l-4 m-12 c-12">
                                                    <h3 class="InfoWeb-header">Thông tin khác</h3>
                                                    <p class="InfoWeb-header__title">Thông tin liên hệ</p>
                                                </div>
                                                <div class="col l-8 m-12 c-12">
                                                    <div class="InfoWeb-form">
                                                        <div class="InfoWeb-form__sub">
                                                            <label for="email" class="InfoWeb-form__title">Email:</label>
                                                            <input name="email" value="<?php echo $data['email'] ?> " id="email" type="text" class="InfoWeb-form__input">
                                                        </div>
                                                        <div class="InfoWeb-form__sub">
                                                            <label for="phoneNumber" class="InfoWeb-form__title">Điện thoại</label>
                                                            <input name="phoneNumber" value="<?php echo $data['phoneNumber'] ?> " id="phoneNumber" type="text" class="InfoWeb-form__input">
                                                        </div>
                                                        <div class="InfoWeb-form__sub">
                                                            <label for="fanPage" class="InfoWeb-form__title">Fanpage</label>
                                                            <input name="fanPage" value="<?php echo $data['fanpage'] ?> " id="fanPage" type="text" class="InfoWeb-form__input">
                                                        </div>
                                                    </div>
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
        </div>
    </div>
    <?php
    include '../../inc/admin/footer.php';
    ?>


    <script src="../../public/admin/js/script.js"></script>
    <script src="../../public/admin/js/jquery.upfile.js"></script>
</body>

</html>