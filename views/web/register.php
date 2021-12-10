<?php 
    include '../../Classes/web/userRegister.php';
    

    $class = new userRegister();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $new_email = filter_input(INPUT_POST, 'newEmail');
        $create_pass = md5(filter_input(INPUT_POST, 'createPass'));
        $conf_pass = md5(filter_input(INPUT_POST, 'confPass'));

        if ($create_pass != $conf_pass) {
            echo '<script language="javascript"> alert ("Mật khẩu không trùng khớp");</script> ';
        } else {
            $check = $class->checkAccount($new_email);
            if (empty($check))
                $login_check = $class->user_Register($new_email, $create_pass, $conf_pass);
            else
                echo '<script language="javascript"> alert ("Email đã tồn tại");</script> ';
        }
    }

?>


<body>
    <div class="app">
    <?php
        include '../../inc/web/header.php';
    ?>

        <div class="app__container app__container__Tablet">
            <div class="grid wide">
                <div class="row">               
                    <div class="col l-o-3-5 l-5 m-o-2 m-8 c-12">
                        <!-- Register form -->
                        <form action="register.php" method="post">
                        <div class="register-form">
                            <div class="register-form__header">
                                <h3 class="register-form__heading">Đăng Ký</h3>
                                <a href="login.php" class="register-form__switch-btn">Đăng nhập</a>
                            </div>
    
                            <div class="register-form__form">
                                <div class="register-form__group">
                                    <input type="email" class="register-form__input" placeholder="Email của bạn" name="newEmail">
                                </div>
                                <div class="register-form__group">
                                    <input type="password" class="register-form__input" placeholder="Mật khẩu của bạn" name="createPass" onmousedown="this.type='text'" onmouseup="this.type='password'">
                                </div>
                                <div class="register-form__group">
                                    <input type="password" class="register-form__input" placeholder="Xác nhận mật khẩu" name="confPass" onmousedown="this.type='text'" onmouseup="this.type='password'">
                                </div>
                            </div>
    
                            <div class="register-form__aside">
                                <p class="register-form__policy-text">
                                    Bằng việc đăng kí, bạn đồng ý với TFarm về
                                    <a href="" class="register-form__text-link">Điều khoản dịch vụ </a>&
                                    <a href="" class="register-form__text-link">Chính sách bảo mật</a>
                                </p>
                            </div>
    
                            <div class="register-form__controls">
                                <button onclick="window.location.href='product.php' " class="btn btn--normal register-form__control-back">TRỞ LẠI</button>
                                <button class="btn btn--primary">ĐĂNG KÝ</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include '../../inc/web/footer.php';
        ?>

    </div>
</body>
</html>