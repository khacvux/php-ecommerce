<?php
include '../../Classes/admin/account.php';
?>

<?php
$account = new account();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email');
    $pass = filter_input(INPUT_POST, 'pass');
    $cfPass = filter_input(INPUT_POST, 'cfPass');
    $role = filter_input(INPUT_POST, 'role');
    if ($pass != $cfPass) {
        echo '<script language="javascript"> alert ("Mật khẩu không trùng khớp");</script> ';
    } else {
        $check = $account->checkAccount($email);
        if (empty($check))
            $insertAccount = $account->insert_account($email, $pass, $role);
        else
            echo '<script language="javascript"> alert ("Email đã tồn tại");</script> ';
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteAccount = $account->delete_account($id);
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
                                    Danh sách tài khoản
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
                                    <div class="Account-content-row">
                                        <div class="OrderList-content-row-check">
                                            <input type="checkbox" onClick="toggle(this)" name="check" id="">
                                        </div>
                                        <div class="OrderList-content-row__td">
                                            <span class="span-heading">ID</span>
                                        </div>
                                        <div class="OrderList-content-row__td">
                                            <span class="span-heading">Email</span>
                                        </div>
                                        <div class="OrderList-content-row__td">
                                            <span class="span-heading">Họ và tên</span>
                                        </div>
                                        <div class="OrderList-content-row__td">
                                            <span class="span-heading">Ngày sinh</span>
                                        </div>
                                        <div class="OrderList-content-row__td">
                                            <span class="span-heading">Giới tính</span>
                                        </div>
                                        <div class="OrderList-content-row__td">
                                            <span class="span-heading">Quyền hạn</span>
                                        </div>
                                        <div class="OrderList-content-row__td">
                                            <span class="span-heading">Hoạt động</span>
                                        </div>
                                    </div>
                                    <div class="Account-content-row">
                                        <div class="OrderList-content-row-check">
                                            <input type="checkbox" name="check" id="" class="OrderList-content-row-checkbox">
                                        </div>
                                        <div class="OrderList-content-row__td">
                                            <span><?php echo $data['IdAccount'] ?></span>
                                        </div>
                                        <div class="OrderList-content-row__td">
                                            <span><?php echo $data['Email'] ?></span>
                                        </div>
                                        <div class="OrderList-content-row__td">
                                            <span>
                                                <?php
                                                if ($data['Username'])
                                                    echo $data['Username'];
                                                else
                                                    echo 'Trống';
                                                ?>
                                            </span>
                                        </div>
                                        <div class="OrderList-content-row__td">
                                            <span>
                                                <?php
                                                if ($data['BirthDay'])
                                                    echo $data['BirthDay'];
                                                else
                                                    echo 'Trống';
                                                ?>
                                            </span>
                                        </div>
                                        <div class="OrderList-content-row__td">
                                            <span>
                                                <?php
                                                if ($data['Gender'] == 1)
                                                    echo 'Nam';
                                                else
                                                    echo 'Nữ';
                                                ?>
                                            </span>
                                        </div>
                                        <div class="OrderList-content-row__td">
                                            <span>
                                                <?php
                                                if ($data['RoleAcc'] == 1)
                                                    echo 'Admin';
                                                else if ($data['RoleAcc'] == 2)
                                                    echo 'Nhân viên';
                                                else
                                                    echo 'Khách hàng';
                                                ?>
                                            </span>
                                        </div>
                                        <div class="body-action">
                                            <a href="AccountDetail.php?idAcc=<?php echo $data['IdAccount'] ?>" title="Xem chi tiết" class="icon"><i class='action__icon--eye js-action__icon--eye bx bx-low-vision'></i></a>
                                            <a href="?delete=<?php echo $data['IdAccount'] ?>" onClick="return confirm('Bạn có muốn xóa không?')" title="Xóa" class="icon"><i class='action__icon--delete bx bxs-trash'></i></a>
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
                                            <td style='font-weight: 500; font-size:1.6rem'>Email</td>
                                            <td style='font-weight: 500; font-size:1.6rem'>Họ và tên</td>
                                            <td style='font-weight: 500; font-size:1.6rem'>Ngày sinh</td>
                                            <td style='font-weight: 500; font-size:1.6rem'>Giới tính</td>
                                            <td style='font-weight: 500; font-size:1.6rem'>Quyền hạn</td>
                                            <td style='font-weight: 500; font-size:1.6rem'>Hoạt động</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $get_account = $account->get_account();
                                        if ($get_account) {
                                            foreach ($get_account as $data) {
                                        ?>
                                                <tr>
                                                    <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['IdAccount'] ?></td>
                                                    <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $data['Email'] ?></td>
                                                    <td style='font-size:1.4rem; color: var(--text-color)'>
                                                        <?php
                                                        if ($data['Username'])
                                                            echo $data['Username'];
                                                        else
                                                            echo 'Trống';
                                                        ?>
                                                    </td>
                                                    <td style='font-size:1.4rem; color: var(--text-color)'>
                                                        <?php
                                                        if ($data['BirthDay'])
                                                            echo $data['BirthDay'];
                                                        else
                                                            echo 'Trống';
                                                        ?>
                                                    </td>
                                                    <td style='font-size:1.4rem; color: var(--text-color)'>
                                                        <?php
                                                        if ($data['Gender'] == 1)
                                                            echo 'Nam';
                                                        else
                                                            echo 'Nữ';
                                                        ?>
                                                    </td>
                                                    <td style='font-size:1.4rem; color: var(--text-color)'>
                                                        <?php
                                                        if ($data['RoleAcc'] == 1)
                                                            echo 'Admin';
                                                        else if ($data['RoleAcc'] == 2)
                                                            echo 'Nhân viên';
                                                        else
                                                            echo 'Khách hàng';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="AccountDetail.php?idAcc=<?php echo $data['IdAccount'] ?>" title="Xem chi tiết" class="icon"><i class='action__icon--eye js-action__icon--eye bx bx-low-vision'></i></a>
                                                        <a href="?delete=<?php echo $data['IdAccount'] ?>" onClick="return confirm('Bạn có muốn xóa không?')" title="Xóa" class="icon"><i class='action__icon--delete bx bxs-trash'></i></a>
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
                    Thêm tài khoản
                </h4>
            </div>
            <div class="modal-container-category__body">
                <form action="AccountList.php" method="post">
                    <div class="modal-container__body-wrap">
                        <label for="email" class="modal-container__body-span">Email:</label>
                        <input id="email" type="email" class="modal-container__body-input" name="email">
                    </div>
                    <div class="modal-container__body-wrap">
                        <label for="password" class="modal-container__body-span">Mật khẩu:</label>
                        <input id="password" type="password" class="modal-container__body-input" name="pass" onmousedown="this.type='text'" onmouseup="this.type='password'">
                    </div>
                    <div class="modal-container__body-wrap">
                        <label for="cfPassword" class="modal-container__body-span">Xác nhận mật khẩu:</label>
                        <input id="cfPassword" type="password" class="modal-container__body-input" name="cfPass" onmousedown="this.type='text'" onmouseup="this.type='password'">
                    </div>
                    <div class="modal-container__body-wrap">
                        <label for="role" class="modal-container__body-span">Xác nhận mật khẩu:</label>
                        <select id="role" class="modal-container__body-input" name="role">
                            <option value="1">Admin</option>
                            <option value="2">Nhân viên</option>
                        </select>
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
                "lengthMenu": [10, 15, 20, 25, 50]
            });
        });
    </script>

</body>

</html>