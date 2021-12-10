<?php
include '../../Classes/web/address.php';
include '../../lib/session.php';
Session::checkSessionUser();
$address = new address();
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
                                    Địa chỉ của tôi
                                </h4>
                            </div>
                            <div class="user-container-body-wrap-address">
                                <a class="user-container-body__add-address js-action" href="user_createAddress.php">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <ul class="user-container-body__address-list">
                                    <?php
                                    $listAddress = $address->get_listAddress();
                                    if ($listAddress) {
                                        foreach ($listAddress as $data) {
                                    ?>
                                            <li class="user-container-body__address-item">
                                                <div class="user-container-body__address">
                                                    <div class="user-container-body__address-name">
                                                        <div class="user-container-body__address-title-wrap">
                                                            <span class="user-container-body__address-title-right">Họ và tên</span>
                                                            <span class="user-container-body__address-Username"><?php echo $data['Name'] ?></span>
                                                            <span class="user-container-body__address-tick 
                                                            <?php
                                                                    if($data['StatusInfo'] == 1){
                                                                        echo '
                                                                            user-container-body__address-tick--active
                                                                        ';
                                                                    }                                                               
                                                            ?>">
                                                                <i class="user-container-body__address-tick-icon far fa-check-circle"></i>
                                                                Mặc định
                                                            </span>
                                                        </div>

                                                        <div class="user-container-body__address-action">
                                                            <a class="js-action user-container-body__address-btn--edit" href="user_updateAddress.php?Address=<?php echo $data['Address'] ?>">
                                                                Sửa
                                                            </a>
                                                            <a class="user-container-body__address-btn" href="../../Controller/web/user_deleteAddress.php?Address=<?php echo $data['Address'] ?>">
                                                                Xóa
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="user-container-body__address-title">
                                                        <span class="user-container-body__address-title-right">Địa chỉ:</span>
                                                        <span class="user-container-body__address-title-left"><?php echo $data['Address'] ?></span>
                                                    </div>
                                                    <div class="user-container-body__address-title">
                                                        <span class="user-container-body__address-title-right">Số điện thoại:</span>
                                                        <span class="user-container-body__address-title-left"><?php echo $data['PhoneNumber'] ?></span>
                                                    </div>
                                                </div>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="modal-user-address js-modal-user-address">
            <div class="modal-user-address__container">
                <h4 class="modal-user-address__heading">Chỉnh sửa địa chỉ</h4>
                <div class="modal-user-address__body">
                    <div class="modal-user-address__body-wrap">
                        <div class="modal-user-address__body-infoName">
                            <label for="username" class="modal-user-address__title">Họ và tên</label>
                            <input id="username" type="text" class="modal-user-address__input">
                        </div>
                        <div class="modal-user-address__body-margin"></div>
                        <div class="modal-user-address__body-infoPhone">
                            <label for="phonenumber" class="modal-user-address__title">Số điện thoại</label>
                            <input id="phonenumber" type="text" class="modal-user-address__input">
                        </div>
                    </div>
                    <div class="modal-user-address__body-infoAddress">
                        <label for="address" class="modal-user-address__title">Địa chỉ</label>
                        <input id="address" type="text" class="modal-user-address__input">
                    </div>
                    <div class="modal-user-address__body-footer">
                        <input id="check" type="checkbox" class="modal-user-address__body-footer-input"></input>
                        <label for="check" class="modal-user-address__body-footer-title">Đặt làm địa chỉ mặc định</label>
                    </div>
                </div>
                <div class="modal-user-address__footer">
                    <button class="btn btn--normal login-form__control-back js-login-form__control-back">TRỞ LẠI</button>
                    <button class="btn btn--primary">HOÀN THÀNH</button>
                </div>
            </div>
        </div> -->

        <footer class="footer">
            <div class="grid wide footer__content">
                <div class="row">
                    <div class="col l-2-4 m-4 c-6">
                        <h3 class="footer__heading">Chăm sóc khách hàng</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Trung tâm trợ giúp</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">TT Mall</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Hướng dẫn mua hàng</a>
                            </li>
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
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Trang điểm mắt</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Trang điểm mắt</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Trang điểm mắt</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col l-2-4 m-4 c-6">
                        <h3 class="footer__heading">Theo dõi chúng tôi</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    <span><i class="footer-item-icon fab fa-facebook"></i></span>
                                    Facebook
                                </a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    <span><i class="footer-item-icon fab fa-instagram"></i></span>
                                    Instagram
                                </a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    <span><i class="footer-item-icon fab fa-github"></i></span>
                                    Github
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col l-2-4 m-8 c-12">
                        <h3 class="footer__heading">Vào cửa hàng trên ứng dụng</h3>
                        <div class="footer__download">
                            <img src="../../public/web/img/QRCode.png" alt="QRCode" class="footer__download-qr">
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
                    <p class="footer__text">© 2021 - Bản quyền thuộc về TuanLe</p>
                </div>
            </div>
        </footer>


    </div>
    <script>
        const edits = document.querySelectorAll('.js-action')
        const modal = document.querySelector('.js-modal-user-address')
        const Close = document.querySelector('.js-login-form__control-back')

        function showEditForm() {
            modal.classList.add('modal-user-address-open')
        }

        function hideEditForm() {
            modal.classList.remove('modal-user-address-open')
        }
        for (const edit of edits) {
            edit.addEventListener('click', showEditForm)
        }
        Close.addEventListener('click', hideEditForm)
    </script>
</body>

</html>