<?php
include '../../Classes/admin/web.php';
?>
<?php
include '../../inc/admin/header.php';
?>

<body>
    <?php
    include '../../inc/admin/sidebar.php';
    ?>
    <?php
    $web = new web();
    if (!isset($_GET['imgId']) || $_GET['imgId'] == NULL)
        echo "<script>window.location = 'ImgLandingPage.php'</script> ";
    else
        $id = filter_input(INPUT_GET, 'imgId');
    ?>
    <div class="container">
        <div class="grid">
            <div class="Form-wrap">
                <div class="row m-gutter">
                    <div class="col l-12 m-12 c-12">
                        <?php
                        $get_img = $web->get_imgById($id);
                        if ($get_img) {
                            foreach ($get_img as $data) {
                        ?>
                                <div class="Form">
                                    <div class="Form-header">
                                        <h3 class="form-header__title">Hình ảnh</h3>
                                    </div>
                                    <div class="formDetail-wrap">
                                        <img src="../../public/admin/Image/web/<?php echo $data['Img'] ?>" alt="Hình ảnh" class="ImgDetail">
                                    </div>
                                    <div class="formDetail-wrap">
                                        <button onclick="window.location.href='ImgLandingPage.php'" class="btn btn--primary">
                                            Trở về
                                        </button>
                                    </div>
                                </div>
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
    include '../../inc/admin/footer.php';
    ?>


    <script src="../../public/admin/js/script.js"></script>
    <!-- <script src="../../public/admin/js/productList.js"></script> -->

</body>

</html>