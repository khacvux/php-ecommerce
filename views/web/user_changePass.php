<?php
include '../../Classes/web/changePass.php';
include_once '../../lib/session.php';
Session::checkSessionUser();

$class = new userChangePass();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conf_oldPass = md5(filter_input(INPUT_POST, 'oldPass'));
    $newPass = md5(filter_input(INPUT_POST, 'newPass'));
    $conf_newPass = md5(filter_input(INPUT_POST, 'conf_newPass'));

    $checked = $class->user_changePass($conf_oldPass, $newPass, $conf_newPass);
}
?>


<body>
    <div class="app">
        <?php
        include '../../inc/web/header.php';
        include '../../inc/web/user_sidebar.php';
        ?>

        <div class="app__container app__container__Tablet--user">
            <div class="grid wide">
                <div class="row sm-gutter">
                    <?php
                    include '../../inc/web/userMenubar.php';
                    ?>

                    <div class="col l-10 m-9 c-12">
                        <div class="user-container">
                            <div class="user-container-heading">
                                <h4 class="user-container-heading-title">
                                    Đổi mật khẩu
                                </h4>
                            </div>
                            <div class="row user-container-body-wrap">
                                <div class="col l-8 m-12 c-12">
                                    <div class="user-container-body">
                                        <form action="user_changePass.php" method="post">
                                            <ul class="user-container-body-list">
                                                <li class="user-container-body-item">
                                                    <label for="oldPassword" name="oldPassword" class="user-container-body-item-title">Mật khẩu cũ:</label>
                                                    <input id="oldPassword" type="password" class="user-container-body-item-input changPass__eye1" required name="oldPass">
                                                    <!-- onmousedown="this.type='text'" onmouseup="this.type='password'"
                                                    ẩn hiện mật khẩu
                                                -->
                                                    <div class="icon__eye1">
                                                        <i class="far fa-eye"></i>
                                                    </div>
                                                </li>
                                                <li class="user-container-body-item">
                                                    <label for="newPassword" name="newPassword" class="user-container-body-item-title">Mật khẩu mới:</label>
                                                    <input id="newPassword" type="password" class="user-container-body-item-input changPass__eye2" required name="newPass">
                                                    <div class="icon__eye2">
                                                        <i class="far fa-eye"></i>
                                                    </div>
                                                </li>
                                                <li class="user-container-body-item">
                                                    <label for="cfPassword" class="user-container-body-item-title">Xác nhận mật khẩu:</label>
                                                    <input id="cfPassword" type="password" class="user-container-body-item-input changPass__eye3" required name="conf_newPass">
                                                    <div class="icon__eye3">
                                                        <i class="far fa-eye"></i>
                                                    </div>
                                                </li>
                                                <span style="color: #f63d30">
                                                    <?php
                                                    if (isset($checked)) {
                                                        echo $checked;
                                                    }
                                                    ?>
                                                </span>
                                                <li class="user-container-body-item user-container-body-item-mobile__changePass">
                                                    <label for="" class="user-container-body-item-title"></label>
                                                    <a href="" class="user-container-body__forgot-password-mobile">
                                                        Quên mật khẩu?
                                                    </a>
                                                </li>

                                                <li class="user-container-body-item">
                                                    <label for="" class="user-container-body-item-title"></label>
                                                    <button class="user-container-body-btn">Cập nhật</button>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                                <div class="col l-4 m-12 c-12">
                                    <a href="" class="user-container-body__forgot-password">
                                        Quên mật khẩu?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include '../../inc/web/footer.php';
        ?>


    </div>
    <script src="../../public/web/js/user_changePass.js"></script>
</body>

</html>