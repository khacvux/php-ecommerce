<?php
include_once '../../Classes/web/web.php';
include_once '../../Classes/admin/category.php';
$web = new website();
$category = new category();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../public/web/css/style.css">
    <link rel="stylesheet" href="../../public/web/css/grid.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
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

<body>
    <div class="app">
        <header class="header">
            <div class="grid wide">
                <nav class="navbar">
                    <?php
                    $get_logo = $web->get_web();
                    if ($get_logo) {
                        foreach ($get_logo as $data) {
                    ?>
                            <div class="nav__logo">
                                <a href="#" class="nav__logo-link"><img src="../../public/admin/Image/web/<?php echo $data['logo'] ?>" alt="logo" class="nav__logo--img"></a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <ul class="nav__list"> 
                        <li class="nav__item nav__item--active">
                            <a href="#" class="nav__item-link">Trang chủ</a>
                        </li>
                        <li class="nav__item">
                            <a href="#category" class="nav__item-link">Thông tin</a>
                        </li>
                        <li class="nav__item">
                            <a href="#strengths" class="nav__item-link">Thế mạnh</a>
                        </li>
                        <li class="nav__item">
                            <a href="#product" class="nav__item-link">Hình ảnh</a>
                        </li>
                        <li class="nav__item">
                            <a href="#introduce" class="nav__item-link">Về chúng tôi</a>
                        </li>
                        <li class="nav__item">
                            <a href="#nutrition" class="nav__item-link">Dinh dưỡng</a>
                        </li>
                        <li class="nav__item">
                            <a href="#contact" class="nav__item-link">Liên hệ</a>
                        </li>
                    </ul>

                    <script>
                        let list = document.querySelectorAll('.nav__item');
                        for (let i = 0; i < list.length; i++) {
                            list[i].onclick = function() {
                                let j = 0;
                                while (j < list.length) {
                                    list[j++].className = 'nav__item';
                                }
                                list[i].className = 'nav__item nav__item--active';
                            }
                        }
                    </script>

                    <!-- Mobile + Tablet -->
                    <div class="nav-mobile-btn js-nav-mobile-btn">
                        <i class="nav-mobile-btn-icon fas fa-bars"></i>
                    </div>

                    <div class="nav__overlay js-nav__overlay"></div>

                    <nav class="nav-mobile js-nav-mobile">
                        <div class="nav-mobile-close js-nav-mobile-close">
                            <i class="fas fa-times"></i>
                        </div>
                        <ul class="nav-mobile-list">
                            <li class="nav-mobile-item nav-mobile-item--active">
                                <a href="#" class="nav-mobile-link">TRANG CHỦ</a>
                            </li>
                            <li class="nav-mobile-item">
                                <a href="#category" class="nav-mobile-link">THÔNG TIN</a>
                            </li>
                            <li class="nav-mobile-item">
                                <a href="#strengths" class="nav-mobile-link">THẾ MẠNH</a>
                            </li>
                            <li class="nav-mobile-item">
                                <a href="#product" class="nav-mobile-link">HÌNH ẢNH</a>
                            </li>
                            <li class="nav-mobile-item">
                                <a href="#introduce" class="nav-mobile-link">VỀ CHÚNG TÔI</a>
                            </li>
                            <li class="nav-mobile-item">
                                <a href="#nutrition" class="nav-mobile-link">DINH DƯỠNG</a>
                            </li>
                            <li class="nav-mobile-item">
                                <a href="#contact" class="nav-mobile-link">LIÊN HỆ</a>
                            </li>
                        </ul>
                    </nav>

                    <script>
                        let list = document.querySelectorAll('.nav-mobile-item');
                        for (let i = 0; i < list.length; i++) {
                            list[i].onclick = function() {
                                let j = 0;
                                while (j < list.length) {
                                    list[j++].className = 'nav-mobile-item';
                                }
                                list[i].className = 'nav-mobile-item nav-mobile-item--active';
                            }
                        }
                    </script>
                </nav>
            </div>
        </header>
        <?php
        $title = 'Slider';
        $get_img = $web->get_img($title);
        if ($get_img) {
            foreach ($get_img as $data) {
        ?>
                <div id="slider" style="background-image: url('../../public/admin/Image/web/<?php echo $data['Img'] ?>')">
                    <div class="slider__text">
                        <div class="text-heading">t farm</div>
                        <div class="text-description">Trang trại rau sạch lớn nhất bắc trung bộ</div>
                        <div class="text-footer">Đáp ứng nhu cầu ngày càng tăng của người tiêu dùng Việt Nam về nông sản an toàn. Tạo kênh phân phối trực tiếp từ nhà sản xuất đến người tiêu dùng cuối cùng.</div>
                        <button onclick="window.location.href='product.php'" class="slider__btn">Mua ngay</button>
                    </div>
                </div>
        <?php
            }
        }
        ?>

        <div class="app__container">
            <!-- Category -->
            <div class="grid wide" id="category">
                <div class="row category">
                    <?php
                    $get_category = $category->get_category();
                    if ($get_category) {
                        foreach ($get_category as $data) {
                    ?>
                            <div class="col l-4 m-4 c-12">
                                <div class="category__item">
                                    <div class="category__item-img" style="background-image: url('../../public/admin/Image/web/<?php echo $data['img'] ?>')"></div>
                                    <h4 class="category__item-name"><?php echo $data['NameCategory'] ?></h4>
                                    <span class="category__item-description"><?php echo $data['Title'] ?></span>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="session2" id="strengths">
                <?php
                $title = 'Session2';
                $get_img = $web->get_img($title);
                if ($get_img) {
                    foreach ($get_img as $data) {
                ?>
                        <div class="session2__left">
                            <div class="session2__img" style="background-image: url('../../public/admin/Image/web/<?php echo $data['Img'] ?>')"></div>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="session2__right">
                    <h4 class="session2__heading">Lý do chọn chúng tôi</h4>
                    <p class="session2__title">Luôn cung cấp sản phẩm chất lượng và an toàn vệ sinh thực phẩm của người tiêu dùng</p>
                    <ul class="session2__list">
                        <li class="session2__item">
                            <h5 class="session2__item-name">1. Thế mạnh 1</h5>
                            <span class="session2__item-description">Các nhóm sản phẩm luôn dược trồng với quy trình khép kín theo tiêu chuẩn quốc tế và đảm bảo an toàn vệ sinh thực phẩm cho người tiêu dùng</span>
                        </li>
                        <li class="session2__item">
                            <h5 class="session2__item-name">2. Thế mạnh 2</h5>
                            <span class="session2__item-description">Nhóm thực phẩm công ty cung cấp đảm bảo tươi mới và không sử dụng các nhóm chất hóa học, phân bón hóa học</span>
                        </li>
                        <li class="session2__item">
                            <h5 class="session2__item-name">3. Thế mạnh 3</h5>
                            <span class="session2__item-description">Đa dạng các chủng loại sản phẩm nhằm đảm bảo đáp ứng mọi nhu cầu của người tiêu dùng</span>
                        </li>
                        <li class="session2__item">
                            <h5 class="session2__item-name">4. Thế mạnh 4</h5>
                            <span class="session2__item-description">Đã được khảo sát và đat các tiêu chuẩn chứng nhận của các chuyên gia trong quy trình thực phẩm sạch</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Product -->
            <div class="grid wide" id="product">
                <h4 class="product__heading">Hình ảnh sản phẩm</h4>
                <div class="row product">
                    <?php
                    $get_img = $web->get_img_product();
                    if ($get_img) {
                        foreach ($get_img as $data) {
                    ?>
                            <div class="col l-3 m-6 c-12">
                                <div class="product__img" style="background-image: url('../../public/web/img/products/<?php echo $data['ProductImg1'] ?>');"></div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Introduce -->
            <div class="introduce__wrap" id="introduce">
                <div class="grid wide">
                    <div class="row introduce">
                        <?php
                        $title = 'Session4_a';
                        $get_img = $web->get_img($title);
                        if ($get_img) {
                            foreach ($get_img as $data) {
                        ?>
                                <div class="col l-4 m-12 c-12">
                                    <h4 class="introduce__heading">NÓI VỀ CHÚNG TÔI</h4>
                                    <img src='../../public/admin/Image/web/<?php echo $data['Img'] ?>' class="introduce__img"></img>
                                    <p class="introduce__title">Chủ trương khép kín quy trình sản xuất để rau đạt chuẩn VietGAP, Chúng tôi sản xuất giống rau trong vỉ xốp cung cấp cho xã viên đồng thời cung cấp những loại thuốc bảo vệ thực vật nằm trong danh mục. Sản phẩm sau thu hoạch, công ty sơ chế và bao tiêu toàn bộ cho xã viên. Bởi vậy, rau của Nông nghiệp là rau an toàn, công ty tự công bố chất lượng và được cơ quan kiểm dịch chứng nhận.</p>
                                </div>
                        <?php
                            }
                        }
                        ?>

                        <div class="col l-4 m-12 c-12">
                            <ul class="introduce-list">
                                <li class="introduce-item">
                                    <div class="introduce-item__name">Sứ mệnh</div>
                                    <span class="introduce-item__description">Cùng với sự phát triển của nền kinh tế, nhu cầu thực phẩm an toàn, bảo vệ sức khỏe đang được người tiêu dùng Việt Nam ngày càng quan tâm nhiều hơn. Bên cạnh đó, những sự kiện như rau “bẩn”, thực phẩm kém chất lượng, trái cây nhiễm độc, sự gia tăng của bệnh ung thư, v.v… đã đặt ra vấn đề cấp thiết về chất lượng và an toàn vệ sinh thực phẩm của người tiêu dùng.</span>
                                </li>
                                <li class="introduce-item">
                                    <div class="introduce-item__name">Nội dung</div>
                                    <span class="introduce-item__description">Quảng bá sản phẩm nông sản an toàn Việt Nam.Liên kết dài hạn và đảm bảo đầu ra ổn định cho nhà sản xuất nông sản an toàn, góp phần vào sự nghiệp phát triển ngành nông nghiệp Việt Nam.</span>
                                </li>
                                <li class="introduce-item">
                                    <div class="introduce-item__name">Hành trình</div>
                                    <span class="introduce-item__description">Chúng tôi chọn con đường gắn bó với rau sạch Đà Lạt, bởi đây chính là thế mạnh, là hướng đi thuận lợi với những xã viên vốn là nông dân chuyên trồng rau. Hơn 70 ha đất của xã viên tham gia hợp tác xã được xác định trồng và cung cấp cho thị trường rau VietGAP mang thương hiệu Nông nghiệp.</span>
                                </li>
                            </ul>
                        </div>
                        <?php
                        $title = 'Session4_b';
                        $get_img = $web->get_img($title);
                        if ($get_img) {
                            foreach ($get_img as $data) {
                        ?>
                                <div class="col l-4 m-12 c-12">
                                    <div class="introduce-after">
                                        <div class="introduce-after2">
                                            <div class="introduce-child">
                                                <img class="introduce-child__img" src="../../public/admin/Image/web/<?php echo $data['Img'] ?>" alt="ảnh">
                                                <h5 class="introduce-child__name">Mô hình hiện đại</h5>
                                                <span class="introduce-child__description">Với các quy trình chăm sóc hiện đại theo tiêu chuẩn thực phẩm sạch của quốc tế.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- NUTRITION -->
            <div class="grid wide" id="nutrition">
                <h4 class="nutrition__heading">DINH DƯỠNG</h4>
                <div class="row nutrition">
                    <div class="col l-6 m-12 c-12">
                        <div class="nutrition__item">
                            <div class="row">
                                <div class="col l-6 m-4 c-12">
                                    <div class="nutrition__img" style="background-image: url(../../public/web/img/nutrition1.jpeg);"></div>
                                </div>
                                <div class="col l-6 m-8 c-12">
                                    <h5 class="nutrition__name">THỰC PHẨM SẠCH</h5>
                                    <p class="nutrition__title">Nguồn cung ứng thực phẩm có xuất phát điểm từ các trang trại chăn nuôi đạt chuẩn HACCP.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col l-6 m-12 c-12">
                        <div class="nutrition__item">
                            <div class="row">
                                <div class="col l-6 m-4 c-12">
                                    <div class="nutrition__img" style="background-image: url(../../public/web/img/nutrition2.jpeg);"></div>
                                </div>
                                <div class="col l-6 m-8 c-12">
                                    <h5 class="nutrition__name">DINH DƯỠNG KHOA HỌC</h5>
                                    <p class="nutrition__title">Cân bằng dinh dưỡng với các loại trái cây sẽ giúp cơ thể luôn có đề kháng tự nhiên lành mạnh.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col l-6 m-12 c-12">
                        <div class="nutrition__item">
                            <div class="row">
                                <div class="col l-6 m-4 c-12">
                                    <div class="nutrition__img" style="background-image: url(../../public/web/img/nutrition3.jpeg);"></div>
                                </div>
                                <div class="col l-6 m-8 c-12">
                                    <h5 class="nutrition__name">NGUYÊN LIỆU TỰ NHIÊN</h5>
                                    <p class="nutrition__title">Nguyên liệu được trồng từ tự nhiên, giảm thiếu tối đa các loại hoá chất an toàn, tươi ngon.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col l-6 m-12 c-12">
                        <div class="nutrition__item">
                            <div class="row">
                                <div class="col l-6 m-4 c-12">
                                    <div class="nutrition__img" style="background-image: url(../../public/web/img/nutrition4.jpeg);"></div>
                                </div>
                                <div class="col l-6 m-8 c-12">
                                    <h5 class="nutrition__name">QUY TRÌNH KHÉP KÍN</h5>
                                    <p class="nutrition__title">Từ đồng ruộng cho đến nhà máy đạt chuẩn nông nghiêp 4.0 đảm bảo nguồn cung tươi ngon.</p>
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

    <script src="../../public/web/js/index.js"></script>
</body>

</html>