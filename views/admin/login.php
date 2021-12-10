<?php
    include '../../Classes/admin/adminLogin.php'
?>

<?php
    $class = new adminLogin();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $admin_email = filter_input(INPUT_POST, 'adminEmail');
        $admin_pass = md5(filter_input(INPUT_POST, 'adminPass'));

        $login_check = $class->login_admin($admin_email, $admin_pass);
    }
?>

<?php
include '../../inc/admin/header.php';
?>

<body>
    <div class="login-container">
        <div class="grid">
            <div class="row no-gutters">
                <div class="col l-o-4-5 l-3 m-o-3 m-6 c-12">
                    <div class="login">
                        <h4 class="login-title">
                            Hệ thống quản trị website
                        </h4>
                        <form action="login.php" method="post">
                            <input type="text" placeholder="Email" class="login-input" name="adminEmail">
                            <input type="password" placeholder="Password" class="login-input" name="adminPass" onmousedown="this.type='text'" onmouseup="this.type='password'">
                            <span style="color: #f63d30">
                                <?php 
                                    if(isset($login_check)){
                                        echo $login_check;
                                    }
                                ?>
                            </span>
                            <div class="login-action">
                                <!-- <div class="login-savePass">
                                    <input id="savePass" type="checkbox" name="" id="" >
                                    <label for="savePass">Lưu mật khẩu</label>
                                </div> -->
                                <div></div>
                                <a href="#" class="login-forgotPass">Quên mật khẩu?</a>
                            </div>
                            <div class="login-right">
                                <input type="submit" class="btn--primary" value="Đăng nhập"></input>
                            </div>
                            <div class="login-right">
                                <a href="../web/index.php" class="login-back">
                                    <i class='login-icon--back bx bx-left-arrow-alt'></i>
                                    Trở về trang chủ
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
