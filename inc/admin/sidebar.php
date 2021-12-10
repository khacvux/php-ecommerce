<?php
include_once '../../lib/session.php';
include_once '../../Classes/admin/web.php';
Session::checkSession();
$web = new web();
?>

<div class="sidebar close">
    <div class="logo-details">
        
    <?php
    $get_info = $web->get_web();
    if ($get_info) {
        foreach ($get_info as $data) {
    ?>
        <a href="index.php" class="logoImg" style="background-image: url(../../public/admin/Image/web/<?php echo $data['logo'] ?>)"></a>
    <?php
        }
    }
    ?>
    </div>
    <ul class="nav-links">
        <li>
            <a href="index.php">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="index.php">Dashboard</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">QL sản phẩm</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Quản lí sản phẩm</a></li>
                <li><a href="ProductList.php">Danh sách sản phẩm</a></li>
                <li><a href="CategoryList.php">Danh mục sản phẩm</a></li>
                <li><a href="Types.php">Loại sản phẩm</a></li>
            </ul>
        </li>

        <li>
            <a href="OrderList.php">
                <i class='bx bx-notepad'></i>
                <span class="link_name">QL đơn hàng</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="OrderList.php">Quản lí đơn hàng</a></li>
            </ul>
        </li>
        <?php
        if (Session::get('role') == 1)
            echo '
            <li>
                <a href="AccountList.php">
                    <i class="bx bx-user-circle"></i>
                    <span class="link_name">QL tài khoản</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="AccountList.php">Quản lí tài khoản</a></li>
                </ul>
            </li>
            ';
        else
            echo '';
        ?>

        <li>
            <a href="Supplier.php">
                <i class='bx bx-store'></i>
                <span class="link_name">QL nhà cung cấp</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="Supplier.php">Quản lí nhà cung cấp</a></li>
            </ul>
        </li>
        <li>
            <a href="SaleList.php">
                <i class='bx bx-gift'></i>
                <span class="link_name">QL khuyến mãi</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="SaleList.php">Quản lí khuyến mãi</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-plug'></i>
                    <span class="link_name">QL website</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Quản lí website</a></li>
                <li><a href="InfoWebsite.php">Thiết lập website</a></li>
                <li><a href="ImgLandingPage.php">LandingPage</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-mail-send'></i>
                    <span class="link_name">Email</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Email</a></li>
                <li><a href="EmailSend.php">Gửi Email</a></li>
                <li><a href="https://mail.google.com/mail/u/0/#inbox"  target="_blank">Hộp thư đến</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Cài đặt</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Cài đặt</a></li>
                <li><a href="user.php?id=<?php echo Session::get('adminId') ?>">Cài đặt tài khoản</a></li>
                <li><a href="userChangePass.php?id=<?php echo Session::get('adminId') ?>">Đổi mật khẩu</a></li>
            </ul>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="<?php echo '../../public/admin/Image/accountImg/' . Session::get('img') ?>" alt="profileImg">
                </div>
                <div class="name-job">
                    <div class="profile_name"><?php echo Session::get('adminUser') ?></div>
                    <div class="job">
                        <?php
                        if (Session::get('role') == 1)
                            echo 'Admin';
                        else
                            echo 'Nhân viên';
                        ?>
                    </div>
                </div>
                <?php
                if (isset($_GET['action']) && $_GET['action'] == 'logout') {
                    Session::destroy();
                }
                ?>
                <a href="?action=logout" class="">
                    <i class='bx bx-log-out'></i>
                </a>
            </div>
        </li>
    </ul>
</div>
<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"></span>
    </div>
</section>