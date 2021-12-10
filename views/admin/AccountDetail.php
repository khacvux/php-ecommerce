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
    if (!isset($_GET['idAcc']) || $_GET['idAcc'] == NULL)
        echo "<script>window.location = 'AccountList.php'</script> ";
    else
        $id = filter_input(INPUT_GET, 'idAcc');
    ?>
    <div class="container">
        <div class="grid">
            <div class="Form-wrap">
                <div class="row m-gutter">
                    <div class="col l-12 m-12 c-12">
                        <div class="Form">
                            <div class="Form-header">
                                <h3 class="form-header__title">Dữ liệu người dùng</h3>
                            </div>
                            <?php
                            $detailAcc = $account->get_accountById($id);
                            if ($detailAcc) {
                                foreach ($detailAcc as $data) {
                            ?>
                                    <div class="formDetail-wrap">
                                        <label for="" class="formDetail__title">Họ và tên:</label>
                                        <span class="formDetail__description"><?php echo $data['Username'] ?></span><br>
                                    </div>
                                    <div class="formDetail-wrap">
                                        <label for="" class="formDetail__title">Email:</label>
                                        <span class="formDetail__description"><?php echo $data['Email'] ?></span><br>
                                    </div>
                                    <div class="formDetail-wrap">
                                        <label for="" class="formDetail__title">Số điện thoại:</label>
                                        <span class="formDetail__description"><?php echo $data['PhoneNumber'] ?></span><br>
                                    </div>
                                    <div class="formDetail-wrap">
                                        <label for="" class="formDetail__title">Ngày sinh:</label>
                                        <span class="formDetail__description"><?php echo $data['BirthDay'] ?></span><br>
                                    </div>
                                    <div class="formDetail-wrap">
                                        <label for="" class="formDetail__title">Giới tính:</label>
                                        <span class="formDetail__description">
                                            <?php
                                            if ($data['Gender'] == 1)
                                                echo 'Nam';
                                            else
                                                echo 'Nữ';
                                            ?>
                                        </span><br>
                                    </div>
                                    <div class="formDetail-wrap">
                                        <label for="" class="formDetail__title">Địa chỉ:</label>
                                        <span class="formDetail__description"><?php echo $data['AddressAcc'] ?></span><br>
                                    </div>
                                    <div class="formDetail-wrap">
                                        <label for="" class="formDetail__title">Chức vụ:</label>
                                        <span class="formDetail__description">
                                            <?php
                                            if ($data['RoleAcc'] == 1)
                                                echo 'Admin';
                                            else if ($data['RoleAcc'] == 2)
                                                echo 'Nhân viên';
                                            else
                                                echo 'Người dùng';
                                            ?>
                                        </span><br>
                                    </div>
                                    <div class="formDetail-wrap">
                                        <label for="" class="formDetail__title">Ảnh:</label><br>
                                        <img src="<?php echo '../../public/admin/Image/accountImg/' . $data['Img'] ?>" alt="Ảnh người dùng" class="formDetail__img">
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <div class="formDetail-wrap">
                                <button onclick="window.location.href='AccountList.php'" class="btn btn--primary">
                                    Trở về
                                </button>
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
    <script src="../../public/admin/js/productList.js"></script>

</body>

</html>