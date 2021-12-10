<?php
include '../../Classes/admin/account.php';
?>


<?php
include '../../inc/admin/header.php';
?>

<body>
    <?php
    include '../../inc/admin/sidebar.php';
    ?>
    <?php
    $account = new account();
    if(!isset($_GET['id']) || $_GET['id'] == NULL)
      echo "<script>window.location = 'CategoryList.php'</script> ";
    else
      $id = filter_input(INPUT_GET, 'id');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $oldPass = md5(filter_input(INPUT_POST, 'oldPass'));
        $newPass = md5(filter_input(INPUT_POST, 'newPass'));
        $CFPass = md5(filter_input(INPUT_POST, 'CFpass'));

        $check = $account->checkPassword($id, $oldPass);
        if($newPass != $CFPass)
            echo '<script language="javascript"> alert ("Mật khẩu không trùng khớp");</script> ';
        else if($check === $oldPass)
            $changePass = $account->changePass($newPass, $id);
        else
            echo '<script language="javascript"> alert ("Mật khẩu không đúng");</script> ';
    }
    ?>
    <div class="container">
        <div class="grid">
            <div class="Form-wrap">
                <div class="row no-gutters">
                    <div class="col l-12 m-12 c-12">
                        <div class="Form">
                            <div class="user-container">
                                <div class="user-container-heading">
                                    <h4 class="user-container-heading-title">
                                        Đổi mật khẩu
                                    </h4>
                                </div>
                                <div class="row user-container-body-wrap">
                                    <div class="col l-8 m-12 c-12">
                                        <div class="user-container-body">
                                            <form action="" method="post">
                                                <ul class="user-container-body-list">
                                                    <li class="user-container-body-item">
                                                        <label for="oldPassword" name="oldPassword" class="user-container-body-item-title">Mật khẩu cũ:</label>
                                                        <input name="oldPass" id="oldPassword" type="password" class="user-container-body-item-input changPass__eye1" required>
                                                        <!-- onmousedown="this.type='text'" onmouseup="this.type='password'"
                                                        ẩn hiện mật khẩu
                                                    -->
                                                        <div class="icon__eye1">
                                                            <i class='bx bx-hide'></i>
                                                        </div>
                                                    </li>
                                                    <li class="user-container-body-item">
                                                        <label for="newPassword" name="newPassword" class="user-container-body-item-title">Mật khẩu mới:</label>
                                                        <input name="newPass" id="newPassword" type="password" class="user-container-body-item-input changPass__eye2" required>
                                                        <div class="icon__eye2">
                                                            <i class='bx bx-hide'></i>
                                                        </div>
                                                    </li>
                                                    <li class="user-container-body-item">
                                                        <label for="cfPassword" class="user-container-body-item-title">Xác nhận mật khẩu:</label>
                                                        <input name="CFpass" id="cfPassword" type="password" class="user-container-body-item-input changPass__eye3" required>
                                                        <div class="icon__eye3">
                                                            <i class='bx bx-hide'></i>
                                                        </div>
                                                    </li>
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
        </div>
    </div>
    <?php
    include '../../inc/admin/footer.php';
    ?>


    <script src="../../public/admin/js/script.js"></script>
    <script src="../../public/admin/js/jquery.changePass.js"></script>

</body>

</html>