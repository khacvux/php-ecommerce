<?php
include_once '../../Classes/admin/category.php';
include_once '../../Classes/web/web.php';
$category = new category();
$web = new website();
?>

<footer id="contact" class="footer">
    <div class="grid wide footer__content">
        <div class="row">
            <div class="col l-2-4 m-4 c-6">
                <h3 class="footer__heading">Thông tin liên hệ</h3>
                <ul class="footer-list">
                    <?php
                    $get_info = $web->get_web();
                    if ($get_info) {
                        foreach ($get_info as $data) {
                    ?>
                            <li class="footer-item">
                                <a href="#" class="footer-item__link">Địa chỉ: <?php echo $data['addressWeb'] ?></a>
                            </li>
                            <li class="footer-item">
                                <a href="#" class="footer-item__link">Email: <?php echo $data['email'] ?></a>
                            </li>
                            <li class="footer-item">
                                <a href="#" class="footer-item__link">Hotline: <?php echo $data['phoneNumber'] ?></a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col l-2-4 m-4 c-6">
                <h3 class="footer__heading">Giới thiệu</h3>
                <ul class="footer-list">
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Giới thiệu</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Tuyển dụng</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Điều khoản</a>
                    </li>
                </ul>
            </div>
            <div class="col l-2-4 m-4 c-6">
                <h3 class="footer__heading">Danh mục</h3>
                <ul class="footer-list">
                    <?php
                    $listCategories = $category->get_category();
                    if ($listCategories) {
                        foreach ($listCategories as $data) {
                    ?>
                            <li class="footer-item">
                                <a href="#<?php echo $data['IdCategory'] ?>" class="footer-item__link"><?php echo $data['NameCategory'] ?></a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
                <script>
                    $(document).ready(function() {
                        $('.footer-item__link').click(function(e) {
                            e.preventDefault();
                            var idCategory = $(this).attr("href").substr(1)
                            $.ajax({
                                url: 'listProduct-by-category.php',
                                type: 'POST',
                                dataType: 'html',
                                data: {
                                    'idCategory': idCategory
                                }
                            }).done(function(getHtml) {
                                $('#listProduct').html(getHtml);
                                page = null;
                            });
                        });
                    });
                </script>
            </div>
            <div class="col l-2-4 m-4 c-6">
                <h3 class="footer__heading">Theo dõi chúng tôi</h3>
                <ul class="footer-list">
                    <li class="footer-item">
                        <a href="https://www.facebook.com/TFarm-103143542006139" class="footer-item__link" target="_blank">
                            <span><i class="footer-item-icon fab fa-facebook"></i></span>
                            Facebook
                        </a>
                    </li>
                    <li class="footer-item">
                        <a href="https://www.facebook.com/TFarm-103143542006139" class="footer-item__link" target="_blank">
                            <span><i class="footer-item-icon fab fa-instagram"></i></span>
                            Instagram
                        </a>
                    </li>
                    <li class="footer-item">
                        <a href="https://www.facebook.com/TFarm-103143542006139" class="footer-item__link" target="_blank">
                            <span><i class="footer-item-icon fab fa-github"></i></span>
                            Github
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col l-2-4 m-8 c-12">
                <h3 class="footer__heading">Vào cửa hàng trên ứng dụng</h3>
                <div class="footer__download">
                    <?php
                    $get_logo = $web->get_web();
                    if ($get_logo) {
                        foreach ($get_logo as $data) {
                    ?>
                            <img src="<?php echo $data['QRCode'] ?>" alt="QRCode" class="footer__download-qr">
                    <?php
                        }
                    }
                    ?>
                    <div class="footer__download-apps">
                        <a href="" class="footer__download-app-link">
                            <img src="../../public/web/img/AppStore.png" alt="AppStore" class="footer__download-app-img">
                        </a>
                        <a href="" class="footer__download-app-link">
                            <img src="../../public/web/img/GooglePlay.png" alt="GooglePlay" class="footer__download-app-img">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="grid wide">
            <p class="footer__text">© 2021 - Bản quyền thuộc về TFarm</p>
        </div>
    </div>
</footer>