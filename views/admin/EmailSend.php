<?php
include '../../Classes/admin/Email.php';
?>

<?php
include '../../inc/admin/header.php';
?>

<body>
    <?php
    include '../../inc/admin/sidebar.php';
    ?>
    <?php
    $email = new Email();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sendEmail = $email->sendEmail($_POST, $_FILES);
    }
    ?>
    <div class="container">
        <div class="grid">
            <div class="Form-wrap">
                <div class="row m-gutter">
                    <div class="col l-3 m-3 c-5">
                        <div class="email-nav">
                            <div class="email__heading">
                                <span>Soạn thư</span>
                                <a href="" class="email__icon--plus"><i class='bx bx-plus'></i></a>
                            </div>
                            <a href="" class="email__nav-item email__nav-item--active">
                                <div>
                                    <span><i class='bx bx-envelope'></i></span>
                                    <label>Hộp thư đến</label>
                                </div>
                                <label class="email__nav-item-quantity">5</label>
                            </a>
                            <a href="" class="email__nav-item">
                                <div>
                                    <span><i class='bx bx-star'></i></span>
                                    <label>Có gắn sao</label>
                                </div>
                                <label class="email__nav-item-quantity">5</label>
                            </a>
                            <a href="" class="email__nav-item">
                                <div>
                                    <span><i class='bx bx-send'></i></span>
                                    <label>Đã gửi</label>
                                </div>
                            </a>
                            <a href="" class="email__nav-item">
                                <div>
                                    <span><i class='bx bx-file-blank'></i></span>
                                    <label>Thư nháp</label>
                                </div>
                                <label class="email__nav-item-quantity">5</label>
                            </a>
                            <a href="" class="email__nav-item">
                                <div>
                                    <span><i class='bx bx-trash'></i></span>
                                    <label>Thùng rác</label>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col l-9 m-9 c-7">
                        <form action="" enctype="multipart/form-data" method="POST">
                            <div class="email-nav">
                                <div class="email__content-heading">
                                    <span>Tạo tin nhắn mới</span>
                                </div>
                                <div class="email__content">
                                    <label for="">Đến</label>
                                    <input type="text" name="email">
                                </div>
                                <div class="email__content">
                                    <label for="">Chủ đề</label>
                                    <input type="text" name="title">
                                </div>
                                <div class="email__content">
                                    <label for="">Nội dung</label>
                                    <textarea name="editor1" id="editor1"></textarea>
                                    <script>
                                        CKEDITOR.replace('editor1', {
                                            width: '100%',
                                            height: 150,
                                        });
                                    </script>
                                </div>
                                <div class="email__content">
                                    <label for=""></label>
                                    <input type="file" name="file">
                                </div>
                                <div class="email__content">
                                    <label for=""></label>
                                    <?php
                                    if (isset($sendEmail)) {
                                        echo $sendEmail;
                                    }
                                    ?>
                                </div>
                                <div class="email__content-footer">
                                    <!-- <button class="btn btn--close">
                                        Trở về
                                    </button> -->
                                    <button type="submit" class="btn btn--primary">
                                        Gửi
                                    </button>
                                </div>
                            </div>
                        </form>
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