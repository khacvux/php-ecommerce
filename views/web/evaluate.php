<?php
include_once '../../lib/session.php';
Session::checkSessionUser();
include_once '../../Classes/web/product.php';
?>

<?php
$product = new product();
if (!isset($_GET['IdProduct']) || $_GET['IdProduct'] == NULL)
    echo "<script>window.location = 'user_order.php'</script> ";
else
    $id = filter_input(INPUT_GET, 'IdProduct');

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
                        <?php
                        $get_product = $product->get_productById($id);
                        if ($get_product) {
                            foreach ($get_product as $data) {
                        ?>
                                <div class="user-container">
                                    <div class="evaluate-body__heading">

                                        <img src="../../public/web/img/products/<?php echo $data['ProductImg1'] ?>" alt="image-product" style="width: 50px; height: 50px; border: 1px solid #f1f1f1;">
                                        <div class="evaluate-body-wrap">
                                            <p class="evaluate-body__title"><?php echo $data['NameProduct'] ?></p>
                                            <p class="evaluate-body__description"><?php echo $data['Price'] ?></p>
                                        </div>

                                    </div>

                                    <div>
                                        <span class="evaluate-body__text">Vui lòng đánh giá</span>
                                    </div>
                                    <div class="stars">
                                        <form>
                                            <input class="star star-5" id="star-5" type="radio" value="5" name="star" />
                                            <label class="star star-5" for="star-5"></label>
                                            <input class="star star-4" id="star-4" type="radio" value="4" name="star" />
                                            <label class="star star-4" for="star-4"></label>
                                            <input class="star star-3" id="star-3" type="radio" value="3" name="star" />
                                            <label class="star star-3" for="star-3"></label>
                                            <input class="star star-2" id="star-2" type="radio" value="2" name="star" />
                                            <label class="star star-2" for="star-2"></label>
                                            <input class="star star-1" id="star-1" type="radio" value="1" name="star" />
                                            <label class="star star-1" for="star-1"></label>
                                        </form>
                                    </div>
                                    <div>
                                        <textarea name="description" id="evaluate"></textarea>
                                        <script>
                                            CKEDITOR.replace('evaluate', {
                                                width: '100%',
                                                height: 100,
                                            });
                                        </script>
                                    </div>
                                    <div id="message"></div>
                                    <div class="evaluate-body__footer">
                                        <a href="user_order.php" class="btn btn--normal login-form__control-back">Trở về</a>
                                        <a class="btn btn--primary" id="btn">Đánh giá</a>
                                        <input type="text" value="<?php echo $data['IdProduct'] ?>" hidden id="idProduct">
                                        <input type="text" value="<?php echo Session::get('userId') ?>" hidden id="idAccount">
                                    </div>
                                </div>

                                <script>
                                    document.getElementById("btn").onclick = function() {
                                        checkbox = document.getElementsByClassName("star");
                                        for (var i = 0; i < checkbox.length; i++) {
                                            if (checkbox[i].checked === true) {
                                                rate = checkbox[i].value;
                                            }
                                        }
                                        value = CKEDITOR.instances['evaluate'].getData();
                                        IdProductElement = document.getElementById('idProduct');
                                        IdProduct = IdProductElement.value;

                                        IdAccountElement = document.getElementById('idAccount');
                                        IdAccount = IdAccountElement.value;

                                        $.get('../../Classes/web/evaluate.php', {
                                                'IdProduct': IdProduct,
                                                'rate': rate,
                                                'description': value,
                                                'IdAccount': IdAccount,
                                            },
                                            function(data) {
                                                $('#message').html(data);
                                            });
                                    }
                                </script>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../../inc/web/footer.php';
    ?>

</body>

</html>