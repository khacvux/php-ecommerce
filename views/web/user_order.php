<?php
include_once '../../lib/session.php';
Session::checkSessionUser();
?>


<body>
    <?php
    include '../../inc/web/header.php';
    ?>
    <div class="app">
        <?php
        include '../../inc/web/user_sidebar.php';
        ?>

        <div class="app__container app__container__Tablet--user">
            <div class="grid wide">
                <div class="row sm-gutter">
                    <?php
                    include '../../inc/web/userMenubar.php';
                    ?>

                    <div class="col l-10 m-9 c-12">
                        <div class="user-order-container">
                            <div class="user-order-navbar">
                                <ul class="user-order-navbar-list" id="tabs">
                                    <li class="user-order-navbar-item user-order-navbar-item--active">
                                        <a href="#listOrder-all">
                                            Tất cả
                                        </a>
                                    </li>
                                    <li class="user-order-navbar-item">
                                        <a href="#listOrder-unconfirmred">
                                            Chờ xác nhận
                                        </a>
                                    </li>
                                    <li class="user-order-navbar-item">
                                        <a href="#listOrder-delivery">
                                            Đang giao
                                        </a>
                                    </li>
                                    <li class="user-order-navbar-item">
                                        <a href="#listOrder-delivered">
                                            Đã giao
                                        </a>
                                    </li>
                                    <li class="user-order-navbar-item">
                                        <a href="#listOrder-canceled">
                                            Đã hủy
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <script>
                                $(function() {
                                    $("#tabs li a").click(function() {
                                        var page = this.hash.substr(1);
                                        console.log(page)
                                        $.get(page + '.php', function(html) {
                                            $('#content').html(html);
                                        });
                                    });
                                });


                                let list = document.querySelectorAll('.user-order-navbar-item');
                                for (let i = 0; i < list.length; i++) {
                                    list[i].onclick = function() {
                                        let j = 0;
                                        while (j < list.length) {
                                            list[j++].className = 'user-order-navbar-item';
                                        }
                                        list[i].className = 'user-order-navbar-item user-order-navbar-item--active';
                                    }
                                }
                            </script>

                            <div class="user-order-navbar-mobile">
                                <ul class="user-order-navbar-list--mobile" id="option">
                                    <li class="user-order-navbar-item--mobile user-order-navbar-item--mobile__active">
                                        <a href="#listOrder-all"><i class="fas fa-shopping-basket"></i></a>
                                    </li>
                                    <li class="user-order-navbar-item--mobile">
                                        <a href="#listOrder-unconfirmred"><i class="fas fa-hourglass-half"></i></a>
                                    </li>
                                    <li class="user-order-navbar-item--mobile">
                                        <a href="#listOrder-delivery"><i class="fas fa-shipping-fast"></i></a>
                                    </li>
                                    <li class="user-order-navbar-item--mobile">
                                        <a href="#listOrder-delivered"><i class="fas fa-archive"></i></a>
                                    </li>
                                    <li class="user-order-navbar-item--mobile">
                                        <a href="#listOrder-canceled"><i class="fas fa-trash-alt"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <script>
                                $(function() {
                                    $("#option li a").click(function() {
                                        var page = this.hash.substr(1);
                                        console.log(page)
                                        $.get(page + '.php', function(html) {
                                            $('#content').html(html);
                                        });
                                    });
                                });

                                let list = document.querySelectorAll('.user-order-navbar-item--mobile');
                                for (let i = 0; i < list.length; i++) {
                                    list[i].onclick = function() {
                                        let j = 0;
                                        while (j < list.length) {
                                            list[j++].className = 'user-order-navbar-item--mobile';
                                        }
                                        list[i].className = 'user-order-navbar-item--mobile user-order-navbar-item--mobile__active';
                                    }
                                }
                            </script>
                            <div id="content">
                                <?php include './listOrder-all.php' ?>
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

</body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

</html>