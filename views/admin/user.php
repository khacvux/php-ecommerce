<?php
include '../../Classes/admin/account.php';
?>

<?php
$account = new account();
    if(!isset($_GET['id']) || $_GET['id'] == NULL)
      echo "<script>window.location = 'CategoryList.php'</script> ";
    else
      $id = filter_input(INPUT_GET, 'id');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateAccount = $account->updateAccount($_POST, $_FILES, $id);
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
            <div class="Form-wrap">
                <div class="row no-gutters">
                    <div class="col l-12 m-12 c-12">
                        <div class="Form">
                            <div class="user-container">
                                <div class="user-container-heading">
                                    <h4 class="user-container-heading-title">
                                        Thông tin tài khoản
                                    </h4>
                                </div>
                                <?php
                                $accountDetail = $account->get_accountById($id);
                                if ($accountDetail) {
                                    foreach ($accountDetail as $data) {
                                ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row user-container-body-wrap">
                                                <div class="col l-8 m-12 c-12">
                                                    <div class="user-container-body">
                                                        <ul class="user-container-body-list">
                                                            <li class="user-container-body-item">
                                                                <label for="name" class="user-container-body-item-title">Họ và
                                                                    tên:</label>
                                                                <input value="<?php echo $data['Username'] ?>" id="name" type="text" class="user-container-body-item-input" name="fullName">
                                                            </li>
                                                            <!-- <li class="user-container-body-item">
                                                        <label for="email" class="user-container-body-item-title">Email:</label>
                                                        <input id="email" type="text" class="user-container-body-item-input" name="email">
                                                    </li> -->
                                                            <li class="user-container-body-item">
                                                                <label for="phoneNumber" class="user-container-body-item-title">Số
                                                                    điện thoại:</label>
                                                                <input value="<?php echo $data['PhoneNumber'] ?>" id="phoneNumber" type="text" class="user-container-body-item-input" name="phoneNumber">
                                                            </li>
                                                            <li class="user-container-body-item">
                                                                <label for="address" class="user-container-body-item-title">Address:</label>
                                                                <input value="<?php echo $data['AddressAcc'] ?>" id="address" type="text" class="user-container-body-item-input" name="address">
                                                            </li>

                                                            <li class="user-container-body-item">
                                                                <span class="user-container-body-item-title">Ngày sinh:</span>
                                                                <input value="<?php echo $data['BirthDay'] ?>" type="date" id="" class="user-container-body-item-input__date" name="birthday">
                                                            </li>
                                                            <li class="user-container-body-item">
                                                                <span class="user-container-body-item-title">Giới tính:</span>
                                                                <input  <?= ($data['Gender'] == 1) ? 'checked' : '' ?> type="radio" name="gender" id="made" value="1">
                                                                <label for="made" class="user-container-body-item__gender">Nam</label>
                                                                <input  <?= ($data['Gender'] == 0) ? 'checked' : '' ?> type="radio" name="gender" id="femade" value="0">
                                                                <label for="femade" class="user-container-body-item__gender">Nữ</label>
                                                            </li>

                                                            <?php
                                                            if (isset($updateAccount)) {
                                                                echo $updateAccount;
                                                            }
                                                            ?>
                                                            <!-- <li class="user-container-body-item user-container-body-item--mobile">
                                                    <span class="user-container-body-item-title">Ảnh đại diện:</span>
                                                    <button class="user-container-body-img-button">Chọn ảnh</button>
                                                    <span class="user-container-body-item__upAvatar">(Dung lượng file
                                                        tối đa 1 MB. Định dạng:.JPEG, .PNG)</span>
                                                </li> -->

                                                            <li class="user-container-body-item user-container-body-item__changePass-link--mobile">
                                                                <span class="user-container-body-item-title"></span>
                                                                <a href="user_changePass.html" class="user-container-body-item__changPass-link">Đổi mật
                                                                    khẩu?</a>
                                                            </li>

                                                            <li class="user-container-body-item">
                                                                <label for="" class="user-container-body-item-title"></label>
                                                                <input type="submit" value="Cập nhật" class="user-container-body-btn"></input>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col l-4 m-12 c-12">
                                                    <div class="user-container-body-upload-img">
                                                        <div class="user-container-body-img" style="background-image:url('<?php echo '../../public/admin/Image/accountImg/' .$data['Img']?>');"></div>
                                                        <input type="file" name="img" id="" class="user-container-body-img__input">
                                                        <span id='val'></span>
                                                        <span id='button'>Chọn ảnh</span>
                                                        <p class="user-container-body-img-title">Dung lượng file tối đa 1 MB</p>
                                                        <p class="user-container-body-img-title">Định dạng:.JPEG, .PNG</p>
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
    <!-- <script>
        $('#button').click(function() {
            $("input[type='file']").trigger('click');
        })

        $("input[type='file']").change(function() {
            $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''))
        })
    </script> -->

</body>

</html>