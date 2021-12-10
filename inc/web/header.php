<?php
include_once '../../Classes/web/web.php';
$web = new website();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../public/web/css/base.css">
    <link rel="stylesheet" href="../../public/web/css/main.css">
    <link rel="stylesheet" href="../../public/web/css/grid.css">
    <link rel="stylesheet" href="../../public/web/css/bonus.css">
    <link rel="stylesheet" href="../../public/web/css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- ckeditor -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.16.2/ckeditor.js" integrity="sha512-bGYUkjDyyOMGm3ASzq3zRaWZ4CONNH1wAYMFch/Z0ASZrsg722SeRsX0FPPRZjTuJrqIMbB9fvY0LEMzyHeyeQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- favicon -->
    <?php
    $get_logo = $web->get_web();
    if ($get_logo) {
        foreach ($get_logo as $data) {
    ?>
        <title><?php echo $data['webname'] ?></title>
        <link rel="shortcut icon" type="image/png" href="../../public/admin/Image/web/<?php echo $data['favicon'] ?>" />
    <?php
        }
    }
    ?>
</head>

<header class="header">
    <div class="grid wide">
        <!-- Nav pc -->
        <nav class="navbar hide-on-mobile-tablet">
            <ul class="navbar__list">
                <li class="navbar__item navbar__item--separate navbar__item--has-qr">
                    Fanpage cửa hàng

                    <!-- Navbar QR Code -->
                    <div class="navbar__qr">
                        <?php
                        $get_logo = $web->get_web();
                        if ($get_logo) {
                            foreach ($get_logo as $data) {
                        ?>
                                <img src="<?php echo $data['QRCode'] ?>" alt="QRCode" class="navbar__qr--img">
                        <?php
                            }
                        }
                        ?>
                        <div class="navbar__apps">
                            <a href="" class="navbar__qr--link"><img src="../../public/web/img/AppStore.png" alt="App Store" class="navbar__app--img"></a>
                            <a href="" class="navbar__qr--link"><img src="../../public/web/img/GooglePlay.png" alt="Google Play" class="navbar__app--img"></a>
                        </div>
                    </div>
                </li>
                <li class="navbar__item">
                    <a href="index.php" class="navbar__title--no-pointer">Landing Page</a>
                    <!-- <a href="" class="navbar__icon--social">
                                <i class="navbar__icon fab fa-facebook"></i>
                            </a>
                            <a href="" class="navbar__icon--social">
                                <i class="navbar__icon fab fa-instagram"></i>
                            </a> -->
                </li>
            </ul>
            <ul class="navbar__list">
                <li class="navbar__item navbar__item--has-notify">
                    <a href="" class="navbar__item--link">
                        <i class="navbar__icon far fa-bell"></i>
                        Thông báo
                    </a>
                    <div class="navbar__notify">
                        <header class="navbar__notify-header">
                            <h3>Thông Báo Mới Nhận</h3>
                        </header>
                        <ul class="navbar__notify-list">
                            <li class="navbar__notify-item navbar__notify-item--view">
                                <a href="" class="navbar__notify-link">
                                    <img src="https://64.media.tumblr.com/2fac5353703617bbfd493efa51f3d802/54c5c0bbcc3611c7-03/s640x960/2bac1bc59ca3e2f3ae588205990f775f384f3aac.jpg" alt="" class="navbar__notify-img">
                                    <div class="navbar__notify-info">
                                        <span class="navbar__notify-name">Mỹ phẩm Ohi chính hãng</span>
                                        <span class="navbar__notify-description">Mô tả Mỹ phẩm Ohi chính hãng</span>
                                    </div>
                                </a>
                            </li>
                            <li class="navbar__notify-item">
                                <a href="" class="navbar__notify-link">
                                    <img src="https://64.media.tumblr.com/2fac5353703617bbfd493efa51f3d802/54c5c0bbcc3611c7-03/s640x960/2bac1bc59ca3e2f3ae588205990f775f384f3aac.jpg" alt="" class="navbar__notify-img">
                                    <div class="navbar__notify-info">
                                        <span class="navbar__notify-name">Mỹ phẩm Ohi chính hãng nguồn gốc các sản phẩm Ohi</span>
                                        <span class="navbar__notify-description">Mô tả Mỹ phẩm Ohi chính hãng</span>
                                    </div>
                                </a>
                            </li>
                            <li class="navbar__notify-item">
                                <a href="" class="navbar__notify-link">
                                    <img src="https://64.media.tumblr.com/2fac5353703617bbfd493efa51f3d802/54c5c0bbcc3611c7-03/s640x960/2bac1bc59ca3e2f3ae588205990f775f384f3aac.jpg" alt="" class="navbar__notify-img">
                                    <div class="navbar__notify-info">
                                        <span class="navbar__notify-name">Mỹ phẩm Ohi chính hãng</span>
                                        <span class="navbar__notify-description">Mô tả Mỹ phẩm Ohi chính hãng</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <footer class="navbar__notify-footer">
                            <a href="" class="navbar__notify-footer-btn">Xem tất cả</a>
                        </footer>
                    </div>
                </li>

                <?php
                if (Session::get('img') != 0) {
                    $nameImg = Session::get('img');
                    $img = '../../public/admin/Image/accountImg/' . $nameImg;
                } else {
                    $img =  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTySgCWhidVMSuqxP3rB3uxdhUyoGYTbwKy5AZ8Fik4r6JjfQJJa1uKLwntdVgGQ8Jcox4&usqp=CAU';
                }

                if (Session::get('Username') != 0) {
                    $userId = Session::get('Username');
                } else {
                    $userId  = "Vô danh";
                }

                if (Session::get('userLogin') == true) {
                    $userLogin = ' <li class="navbar__item navbar__user">'

                        . '<img src="'
                        . $img
                        . '" alt="" class="navbar__user-img">
                                <span class="navbar__user-name">'
                        . $userId
                        . '</span>
                                <ul class="navbar__user-menu">
                                    <li class="navbar__user-item">
                                        <a href="user.php">Tài khoản của tôi</a>
                                    </li>
                                    <li class="navbar__user-item">
                                        <a href="user_address.php">Địa chỉ của tôi</a>
                                    </li>
                                    <li class="navbar__user-item">
                                        <a href="user_order.php">Đơn mua</a>
                                    </li>
                                    <li class="navbar__user-item navbar__user-item--separate">
                                        <a href="?action=logout">Đăng xuất</a>
                                    </li>
                                </ul>
                            </li>
                        ';
                    echo $userLogin;
                } else {
                    $userLogin = '<li class="navbar__item">
                            <a href="" class="navbar__item--link">
                                <i class="navbar__icon far fa-question-circle"></i>
                                Trợ giúp
                            </a>
                        </li>
                        <li class="navbar__item navbar__item--bold navbar__item--separate">
                            <a class="navbar__user js-user-register" href="register.php">Đăng kí</a>
                        </li>
                        <li class="navbar__item navbar__item--bold">
                            <a class="navbar__user js-user-login" href="login.php">Đăng nhập</a>
                        </li> ';
                    echo $userLogin;
                }

                if (isset($_GET['action'])  == 'logout') {
                    Session::destroy();
                }


                ?>
                <!-- <li class="navbar__item">
                    <a href="" class="navbar__item--link">
                        <i class="navbar__icon far fa-question-circle"></i>
                        Trợ giúp
                    </a>
                </li>
                <li class="navbar__item navbar__item--bold navbar__item--separate">
                    <a class="navbar__user js-user-register" href="register.php">Đăng kí</a>
                </li>
                <li class="navbar__item navbar__item--bold">
                    <a class="navbar__user js-user-login" href="login.php">Đăng nhập</a>
                </li> -->

                <!-- <li class="navbar__item navbar__user">
                            <img src="https://64.media.tumblr.com/2fac5353703617bbfd493efa51f3d802/54c5c0bbcc3611c7-03/s640x960/2bac1bc59ca3e2f3ae588205990f775f384f3aac.jpg" alt="" class="navbar__user-img">
                            <span class="navbar__user-name">TuanLe</span>

                            <ul class="navbar__user-menu">
                                <li class="navbar__user-item">
                                    <a href="">Tài khoản của tôi</a>
                                </li>
                                <li class="navbar__user-item">
                                    <a href="">Địa chỉ của tôi</a>
                                </li>
                                <li class="navbar__user-item">
                                    <a href="">Đơn mua</a>
                                </li>
                                <li class="navbar__user-item navbar__user-item--separate">
                                    <a href="">Đăng xuất</a>
                                </li>
                            </ul>
                        </li> -->
            </ul>
        </nav>

        <!-- Header with search-->
        <div class="header-with-search">

            <!-- Nav mobile - tablet -->
            <label for="nav-mobile-input" class="nav__bars-btn">
                <i class="nav__bars-btn-icon fas fa-bars"></i>
            </label>

            <input type="checkbox" hidden class="nav__input" id="nav-mobile-input">

            <label for="nav-mobile-input" class="nav__overlay"></label>

            <nav class="nav__mobile">
                <label for="nav-mobile-input" class="nav__mobile-close">
                    <i class="fas fa-times"></i>
                </label>
                <ul class="nav__mobile-list">
                    <li>
                        <a href="product.php" class="nav__mobile-link">
                            <span><i class="nav__mobile-icon fas fa-home"></i></span>
                            Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="" class="nav__mobile-link">
                            <span><i class="nav__mobile-icon fas fa-bell"></i></span>
                            Thông báo
                        </a>
                    </li>
                    </li>
                    <?php if (Session::get('userLogin') == true) { ?>
                        <li>
                            <a href="user.php" class="nav__mobile-link">
                                <span><i class="nav__mobile-icon fas fa-user-plus"></i></span>
                                Tài khoản
                            </a>
                        </li>
                        <li>
                            <a href="user_address.php" class="nav__mobile-link">
                                <span><i class="fas fa-map-marker-alt"></i></span>
                                Địa chỉ của tôi
                            </a>
                        </li>
                        <li>
                            <a href="user_order.php" class="nav__mobile-link">
                                <span><i class="fas fa-shopping-cart"></i></i></span>
                                Đơn mua
                            </a>
                        </li>
                        <li>
                            <a href="product.php?action=logout" class="nav__mobile-link">
                                <span><i class="nav__mobile-icon fas fa-sign-out-alt"></i></span>
                                Đăng xuất
                                
                            </a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="register.php" class="nav__mobile-link">
                                <span><i class="nav__mobile-icon fas fa-user-plus"></i></span>
                                Đăng kí
                            </a>
                        </li>
                        <li>
                            <a href="login.php" class="nav__mobile-link">
                                <span><i class="nav__mobile-icon fas fa-lock"></i></span>
                                Đăng nhập
                            </a>
                        </li>
                        <?php } ?>
                </ul>
            </nav>

            <div class="header__logo">
                <a href="product.php" class="header__logo-link">
                    <img src="../../public/web/img/logo2.png" alt="Logo" class="header__logo-img">
                </a>
            </div>

            <input type="checkbox" hidden id="mobile-search-checkbox" class="header__search-checkbox">

            <div class="header__search">
                <div class="header__search-input-wrap">
                    <input type="text" class="header__search-input" placeholder="Tìm kiếm sản phẩm" id="inputSearch">

                    <!-- Search history -->
                    <div class="header__search-history">
                        <!-- <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                        <ul class="header__search-history-list">
                            <li class="header__search-history-item">
                                <a href="">IU</a>
                            </li>
                            <li class="header__search-history-item">
                                <a href="">Rau muống</a>
                            </li>
                            <li class="header__search-history-item">
                                <a href="">Cà rốt</a>
                            </li>
                        </ul> -->
                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

                    <script>
                        $(document).ready(function() {
                            $('.header__search-input[type="text"]').on("keyup input", function() {
                                var inputVal = $(this).val();
                                var resultDropdown = $(this).siblings(".header__search-history-list");
                                if (inputVal.length) {
                                    $.get("../../Classes/web/search.php", {
                                        'term': inputVal
                                    }).done(function(data) {
                                        resultDropdown.html(data);
                                    });
                                } else {
                                    resultDropdown.empty();
                                }
                            });
                            $(document).on("click", ".header__search-history-list li", function() {
                                // $(this).parent(".header__search-history-list").empty();
                            });
                        });
                    </script>
                </div>
                <!-- <div class="header__search-select">
                            <span class="header__search-select-label">Trong shop</span>
                            <i class="header__search-select-icon fas fa-chevron-down"></i>

                            <ul class="header__search-option">
                                <li class="header__search-option-item header__search-option-item--active">
                                    <span>Trong shop</span>
                                    <i class="fas fa-check"></i>
                                </li>
                                <li class="header__search-option-item">
                                    <span>Ngoài shop</span>
                                    <i class="fas fa-check"></i>
                                </li>
                            </ul>
                        </div> -->
                <button class="header__search-btn" id="search">
                    <i class="header__search-btn-icon fas fa-search"></i>
                </button>

                <script>
                    $(document).ready(function() {
                        $('#search').click(function(e) {
                            e.preventDefault();
                            var input = document.getElementById('inputSearch').value;
                            $.ajax({
                                url: 'ajaxResultSearch.php',
                                type: 'POST',
                                dataType: 'html',
                                data: {
                                    'input': input
                                }
                            }).done(function(getHtml) {
                                $('.app').html(getHtml);
                                console.log(page);
                            });
                        })

                    });
                </script>
            </div>

            <label for="mobile-search-checkbox" class="header__mobile-search">
                <i class="header__mobile-search-icon fas fa-search"></i>
            </label>

            <!-- Cart -->
            <div class="header__cart">
                <?php
                $sumOrder = 0;
                if (Session::get('cart')) {
                    $sumOrder = count(Session::get('cart'));
                }
                ?>
                <div class="header__cart-wrap">
                    <i class="header__cart-icon fas fa-shopping-cart"></i>
                    <span class="header__cart-notice" id="sumOrder"><?php echo $sumOrder ?></span>

                    <!-- No cart: thêm class: header__cart-list--no-cart -->
                    <div class="header__cart-list">
                        <img src="/assets/img/no-cart.png" alt="" class="header__cart-no-cart-img">
                        <span class="header__cart-list-no-cart-msg">Chưa có sản phẩm</span>

                        <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                        <ul class="header__cart-list-item" id="listCart">
                            <div class="header__cart-empty-item" style="display: <?php if (Session::get('cart') == true) echo "none" ?>">
                                <img src="../../public/web/img/empty_order.png" alt="">
                            </div>

                            <!-- Cart Item-->
                            <?php
                            if (Session::get('cart')) {
                                $cart = Session::get('cart');
                                foreach ($cart as $data) {
                            ?>
                                    <li class="header__cart-item">
                                        <img src="../../public/web/img/products/<?php echo $data['img'] ?>" alt="cart-product" class="header__cart-img">
                                        <div class="header__cart-item-info">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name"><?php echo $data['name'] ?></h5>
                                                <div class="header__cart-price-wrap">
                                                    <span class="header__cart-item-price"><?php echo $data['price'] ?> đ</span>
                                                    <span class="header__cart-item-multiply">x</span>
                                                    <span class="header__cart-item-quantity"><?php echo $data['quantity'] ?></span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-description">1kg</span>
                                                <span class="header__cart-item-remove">Xóa</span>
                                            </div>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>

                        <a href="cart.php" class="header__cart-view-cart btn btn--primary">Xem giỏ hàng</a>
                    </div>
                </div>

            </div>

            <div class="header__cart-mobile">
                <a href="cart.php" class="header__cart-mobile-link">
                    <i class="header__cart-icon-mobile fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
    </div>
</header>