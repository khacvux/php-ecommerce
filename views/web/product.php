<?php
include '../../Classes/admin/category.php';
include '../../Classes/web/product.php';
include_once '../../lib/session.php';
Session::init();
$product = new product();
$category = new category();
?>


<body>
    <div class="app">
        <?php
        include '../../inc/web/header.php';
        include '../../inc/web/sidebar.php';
        ?>
        <div class="app__container">
            <div class="grid wide">
                <div class="row sm-gutter app__content">
                    <div class="col l-2 m-0 c-0">
                        <nav class="category">
                            <h3 class="category__heading">Danh mục</h3>

                            <ul class="category-list">
                                <?php
                                $listCategories = $category->get_category();
                                if ($listCategories) {
                                    foreach ($listCategories as $data) {
                                ?>
                                        <li class="category-item category-item--active">
                                            <a href="#<?php echo $data['IdCategory'] ?>" class="category-item__link"><?php echo $data['NameCategory'] ?></a>
                                        </li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                            <script>
                                $(document).ready(function() {
                                    var page = 1;
                                    $(window).scroll(function() {
                                        if ($(window).scrollTop() + $(window).height() > $(document).height() - 1) {
                                            $.ajax({
                                                url: 'ajaxPaging.php',
                                                type: 'POST',
                                                dataType: 'html',
                                                data: {
                                                    'page': page
                                                }
                                            }).done(function(getHtml) {
                                                $('#listProduct').append(getHtml);
                                                if (page <= <?php echo $product->total_page() ?>)
                                                    page++;
                                            });
                                        }
                                    })
                                })
                                $(document).ready(function() {
                                    $('.category-item__link').click(function(e) {
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
                        </nav>
                    </div>

                    <div class="col l-10 m-12 c-12">
                        <div class="home-filter hide-on-mobile-tablet">
                            <span class="home-filter__label">Sắp xếp theo</span>
                            <button class="home-filter__btn btn">Phổ biến</button>
                            <button class="home-filter__btn btn btn--primary">Mới nhất</button>
                            <button class="home-filter__btn btn">Bán chạy</button>



                            <div class="select-input">
                                <span class="select-input__label">Giá</span>
                                <i class="select-input__icon fas fa-chevron-down"></i>

                                <!-- List options -->
                                <ul class="select-input__list">
                                    <li class="select-input__item">
                                        <a href="#ASC" class="select-input__link">Giá: Thấp đến cao</a>
                                    </li>
                                    <li class="select-input__item">
                                        <a href="#DESC" class="select-input__link">Giá: Cao đến thấp</a>
                                    </li>
                                </ul>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('.select-input__link').click(function(e) {
                                        e.preventDefault();
                                        var option = $(this).attr("href").substr(1)
                                        $.ajax({
                                            url: 'listProduct_by_price.php',
                                            type: 'POST',
                                            dataType: 'html',
                                            data: {
                                                'option': option
                                            }
                                        }).done(function(getHtml) {
                                            $('#listProduct').html(getHtml);
                                            page = null;
                                        });
                                    });
                                });
                            </script>
                            <!-- <div class="home-filter__page">
                                <span class="home-filter__page-num">
                                    <span class="home-filter__page-current">1</span>/14
                                </span>

                                <div class="home-filter__page-control">
                                    <a href="" class="home-filter__page-btn home-filter__page-btn--disabled">
                                        <i class="home-filter__page-icon fas fa-chevron-left"></i>
                                    </a>
                                    <a href="" class="home-filter__page-btn">
                                        <i class="home-filter__page-icon fas fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div> -->
                        </div>

                        <nav class="mobile-category">
                            <ul class="mobile-category__list">
                                <?php
                                $listCategories = $category->get_category();
                                if ($listCategories) {
                                    foreach ($listCategories as $data) {
                                ?>
                                        <li class="mobile-category__item">
                                            <a href="#<?php echo $data['IdCategory'] ?>" class="mobile-category__link">
                                                <?php echo $data['NameCategory'] ?>
                                            </a>
                                        </li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                            <script>
                                $(document).ready(function() {
                                    $('.mobile-category__link').click(function(e) {
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
                        </nav>

                        <div class="home-product">
                            <div class="row sm-gutter" id="listProduct">
                                <?php
                                $listProducts = $product->get_product();
                                if ($listProducts) {
                                    foreach ($listProducts as $data) {
                                ?>
                                        <div class="col l-2-4 m-4 c-6">
                                            <a class="product-item" href="product-detail.php?idProduct=<?php echo $data['IdProduct'] ?>&idCate=<?php echo $data['IdCategory'] ?>">
                                                <div class="product-item__img" style="background-image: url('<?php echo '../../public/web/img/products/' . $data['ProductImg1'] ?>');"></div>
                                                <h4 class="product-item__name"><?php echo $data['NameProduct'] ?></h4>
                                                <div class="product-item__price">
                                                    <?php if ($data['Percent'] != 0) {
                                                        echo '<span class="product-item__price-old"> ' . $data["Price"] . 'đ</span>';
                                                        echo '<span class="product-item__price-current">' . ($data['Price'] * (100 - $data['Percent'])) / 100 . 'đ</span>';
                                                    } else {
                                                        echo '<span class="product-item__price-current">' . $data['Price'] . 'đ</span>';
                                                    } ?>

                                                </div>
                                                <div class="product-item__action">
                                                    <span class="product-item__like product-item__like--liked">
                                                        <i class="product-item__like-icon--empty far fa-heart"></i>
                                                        <i class="product-item__like-icon--fill fas fa-heart"></i>
                                                    </span>
                                                    <div class="product-item__rating">
                                                        <i class="product-item__star--gold fas fa-star"></i>
                                                        <i class="product-item__star--gold fas fa-star"></i>
                                                        <i class="product-item__star--gold fas fa-star"></i>
                                                        <i class="product-item__star--gold fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>

                                                    <span class="product-item__sold">88 đã bán</span>
                                                </div>
                                                <div class="product-item__origin">
                                                    <span class="product-item__brand"><?php echo $data['NameSupplier'] ?></span>
                                                    <span class="product-item__origin-name">Việt Nam</span>
                                                </div>
                                                <div class="product-item__favorite">
                                                    <i class="fas fa-check"></i>
                                                    <span>Yêu thích</span>
                                                </div>
                                                <?php if ($data['Percent'] != 0) {
                                                    echo '
                                                    <div class="product-item__sale-off">
                                                        <span class="product-item__sale-off-percent">'.$data['Percent'].'%</span>
                                                        <span class="product-item__sale-off-label">GIẢM</span>
                                                    </div>';
                                                } ?>                     
                                            </a>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <!-- <ul class="pagination home-product__pagination">
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    <i class="pagination-item__icon fas fa-angle-left"></i>
                                </a>
                            </li>

                            <li class="pagination-item pagination-item--active">
                                <a href="" class="pagination-item__link">1</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">2</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">3</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">4</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">5</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">...</a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">14</a>
                            </li>

                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    <i class="pagination-item__icon fas fa-angle-right"></i>
                                </a>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>

        <?php
        include '../../inc/web/footer.php';
        ?>

        <script>
            let __protocol = document.location.protocol;
            let __baseUrl = __protocol + '//livechat.fpt.ai/v35/src';

            let prefixNameLiveChat = 'TFarm';
            let objPreDefineLiveChat = {
                    appCode: '4e3b61d8805ebe6397d25253426f77d1',
                    themes: '',
                    appName: prefixNameLiveChat ? prefixNameLiveChat : 'Live support',
                    thumb: '',
                    icon_bot: ''
                },
                appCodeHash = window.location.hash.substr(1);
            if (appCodeHash.length == 32) {
                objPreDefineLiveChat.appCode = appCodeHash;
            }

            let fpt_ai_livechat_script = document.createElement('script');
            fpt_ai_livechat_script.id = 'fpt_ai_livechat_script';
            fpt_ai_livechat_script.src = __baseUrl + '/static/fptai-livechat.js';
            document.body.appendChild(fpt_ai_livechat_script);

            let fpt_ai_livechat_stylesheet = document.createElement('link');
            fpt_ai_livechat_stylesheet.id = 'fpt_ai_livechat_script';
            fpt_ai_livechat_stylesheet.rel = 'stylesheet';
            fpt_ai_livechat_stylesheet.href = __baseUrl + '/static/fptai-livechat.css';
            document.body.appendChild(fpt_ai_livechat_stylesheet);

            fpt_ai_livechat_script.onload = function() {
                fpt_ai_render_chatbox(objPreDefineLiveChat, __baseUrl, 'livechat.fpt.ai:443');
            }
        </script>

    </div>
</body>

</html>