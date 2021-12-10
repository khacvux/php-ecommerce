<?php
include '../../Classes/admin/category.php';
include_once '../../Classes/web/product.php';
include '../../lib/session.php';
include '../../Classes/web/payOrder.php';
Session::init();

$product = new product();
$pay = new payOrder();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alert = $pay->pay();
}
?>


<body>
    <div class="app">
        <?php
        include '../../inc/web/header.php';
        ?>

        <div class="app__container app__container__Tablet">
            <div class="grid wide">
                <div class="row sm-gutter">
                    <!-- <div class="col l-12 m-12 c-12">
                        <div class="nav-cart-mobile">
                            <div class="nav-cart-mobile__back">
                                <a href="" class="nav-cart-mobile__back-link">
                                    <i class="nav-cart-mobile__back-icon fas fa-arrow-left"></i>
                                </a>
                            </div>
                            <div class="nav-cart-mobile__title">
                                <span>Giỏ hàng</span>
                            </div>
                            <div class="nav-cart-mobile__action">
                                <span class="nav-cart-mobile__action-edit js-nav-cart-mobile__action-edit">Sửa</span>
                                <span class="nav-cart-mobile__action-complete js-nav-cart-mobile__action-complete">Hoàn thành</span>
                            </div>
                        </div>
                    </div> -->
                    <div class="col l-12 m-12 c-12 empty-cart" style="display: <?php if (Session::get('cart') == true) echo "none" ?>">
                        <img src="../../public/web/img/no-cart.png">
                        <a href="../../views/web/product-detail.php">Tiếp tục mua sắm</a>
                    </div>
                    <div class="col l-12 m-12 c-12" style="display: <?php if (Session::get('cart') == false) echo "none" ?>">
                        <div class="cart">
                            <div class="cart__header">
                                <div class="cart__header-tick">
                                    <input type="checkbox" onClick="toggle(this)" name="check" class="cart__header-tick-input">
                                </div>
                                <div class="cart__header-column">
                                    Sản Phẩm
                                </div>
                                <div class="cart__header-column">
                                </div>
                                <div class="cart__header-column">
                                    Đơn Giá
                                </div>
                                <div class="cart__header-column">
                                    Số Lượng
                                </div>
                                <div class="cart__header-column">
                                    Số Tiền
                                </div>
                                <div class="cart__header-column">
                                    Thao Tác
                                </div>
                            </div>

                            <div class="cart__container" id="cartContainer">
                                <?php foreach (Session::get('cart') as $data) : ?>
                                    <div class="cart__header-item">
                                        <div class="cart__header-tick">
                                            <input type="checkbox" name="check" class="cart__header-tick-input">
                                        </div>
                                        <div class="cart__header-column">
                                            <img src="../../public/web/img/products/<?php echo $data['img'] ?>" class="cart__product-img">
                                        </div>
                                        <div class="cart__header-column">
                                            <a href="product-detail.php?idProduct=<?php echo $data['idProduct'] ?>" class="cart__product-name"><?php echo $data['name'] ?></a>
                                            <div class="cart__product-type">Khối lượng: 0.5kg</div>
                                        </div>
                                        <div class="cart__header-column--center">
                                            <span class="cart__product-price--old"></span>
                                            <span class="cart__product-price--new"><?php echo $data['price'] ?> đ</span>
                                        </div>
                                        <div class="cart__header-column--center">
                                            <div class="cart__header-column__action">
                                                <button class="cart__product-quantity--sub" onmousedown="decrement(this);" onclick="addCart(<?php echo $data['idProduct']; ?>, this)">-</button>
                                                <input class="cart__product-quantity-input" value="<?php echo $data['quantity'] ?>"></input>
                                                <button class="cart__product-quantity--add" onmousedown="increment(this);" onclick="addCart(<?php echo $data['idProduct']; ?>, this)">+</button>
                                            </div>
                                        </div>
                                        <div class="cart__header-column--center">
                                            <span class="cart__product-price--sum"><?php echo $data['quantity'] * $data['price'] ?> đ</span>
                                        </div>
                                        <div class="cart__header-column--center">
                                            <a href="#" class="cart__product-action" onclick="deleteCart(<?php echo $data['idProduct']; ?>, this);">Xóa</a>
                                        </div>
                                    </div>
                                    <div class="cart__hr"></div>
                                <?php endforeach ?>

                                <script>
                                    function increment(Object) {
                                        var input = Object.parentElement.children[1]
                                        var oldValue = parseInt(input.value);
                                        var priceProduct = parseInt(Object.parentElement.parentElement.parentElement.children[3].children[1].innerText);
                                        var divTotal = Object.parentElement.parentElement.parentElement.children[5].children[0];
                                        var total = parseInt(divTotal.innerText);

                                        if (oldValue < 100) {
                                            input.setAttribute('value', oldValue + 1)
                                            total = (oldValue + 1) * priceProduct;
                                            divTotal.innerHTML = total + ' đ';
                                        }
                                    }

                                    function decrement(Object) {
                                        var input = Object.parentElement.children[1]
                                        var oldValue = parseInt(input.value);
                                        var priceProduct = parseInt(Object.parentElement.parentElement.parentElement.children[3].children[1].innerText);
                                        var divTotal = Object.parentElement.parentElement.parentElement.children[5].children[0];
                                        var total = parseInt(divTotal.innerText);


                                        if (oldValue > 1) {
                                            input.setAttribute('value', oldValue - 1)
                                            total = (oldValue - 1) * priceProduct;
                                            divTotal.innerHTML = total + ' đ';
                                        }
                                    }

                                    function addCart(id, object) {
                                        var quantity = parseInt(object.parentElement.children[1].value);
                                        $.ajax({
                                            url: 'ajaxCart.php',
                                            type: 'POST',
                                            dataType: 'html',
                                            data: {
                                                'id': id,
                                                'quantity': quantity,
                                                'act': 'add'
                                            }
                                        }).done(function(getHtml) {
                                            item = getHtml.split("-");
                                            $('#sumOrder').text(item[0]);
                                            $('#sum_Order').text(item[1]);
                                            $('#totalPay').text(item[2]);
                                            $('#listCart').html(item[3])
                                        });
                                    }



                                    function deleteCart(id, Object) {
                                        $.ajax({
                                            url: 'ajaxCart.php',
                                            type: 'POST',
                                            dataType: 'html',
                                            data: {
                                                'id': id,
                                                'act': 'delete'
                                            }
                                        }).done(function(getHtml) {
                                            item = getHtml.split("-");
                                            $('#sumOrder').text(item[0]);
                                            $('#sum_Order').text(item[1]);
                                            $('#totalPay').text(item[2]);
                                            $('#listCart').html(item[3])
                                        });

                                        const cartContainer = document.getElementById('cartContainer');
                                        var cartItem = Object.parentElement.parentElement;
                                        var hrItem = Object.parentElement.parentElement.nextElementSibling;

                                        console.log(cartItem);
                                        cartContainer.removeChild(cartItem);
                                        cartContainer.removeChild(hrItem);
                                    }

                                    function toggle(source) {
                                        checkboxes = document.getElementsByName('check');
                                        for (var i = 0, n = checkboxes.length; i < n; i++) {
                                            checkboxes[i].checked = source.checked;
                                            if (checkboxes[i].checked == true) {
                                                checkboxes[i].value = 1;
                                                console.log('true');
                                            } else if (checkboxes[i].checked == false) {
                                                checkboxes[i].value = 0;
                                                console.log('false');
                                            }
                                        }
                                    }
                                </script>
                            </div>

                            <div class="cart-pay__discount-code js-cart-pay__discount-code">
                                <label for="discountCode" class="cart-pay__discount-code-title">Nhập mã giảm giá:</label>
                                <input id="discountCode" type="text" class="cart-pay__discount-code-input">
                            </div>
                            <div class="cart-pay-bottom">
                                <div class="cart-pay-bottom-wrap-left">
                                    <div class="cart__header-tick">
                                        <input id="select_all" onClick="toggle(this)" name="check" type="checkbox" class="cart__header-tick-input">
                                    </div>
                                    <div class="cart-pay-bottom__select">
                                        <label for="select_all" class="cart-pay-bottom__select-all">Chọn tất cả</label>
                                    </div>
                                    <div class="cart-pay-bottom__delete">
                                        <a href="" class="cart-pay-bottom__delete-all">Xóa</a>
                                    </div>
                                </div>

                                <div class="cart-pay-bottom-wrap-right">
                                    <div class="cart-pay-bottom__sum-product">
                                        <p>
                                            Tổng thanh toán
                                            (<span id="sum_Order">
                                                <?php
                                                foreach (Session::get('cart') as $data) {
                                                    $sumOrder = 0;
                                                    foreach ($cart as $data) {
                                                        $sumOrder += $data['quantity'];
                                                    }
                                                }
                                                echo $sumOrder;
                                                ?>
                                            </span> sản phẩm):
                                        </p>
                                    </div>

                                    <div class="cart-pay-bottom__sum-product-wrap js-cart-pay-bottom__sum-product-wrap">
                                        <div class="cart-pay-bottom__sum-product-mobile">
                                            <span>Tổng:</span>
                                        </div>
                                        <?php
                                        $total = 0;
                                        foreach (Session::get('cart') as $value) {
                                            $total += (int)$value["price"] * (int)$value["quantity"];
                                        }

                                        ?>

                                        <div class="cart-pay-bottom__total-pay" id="totalPay">
                                            <?php echo $total ?> đ
                                        </div>
                                    </div>
                                    <form action="cart.php" method="POST">
                                        <button class="cart-pay-bottom__button-pay js-cart-pay-bottom__button-pay" type="submit">
                                            Mua hàng
                                        </button>
                                    </form>
                                    <button class="cart-pay-bottom__button-delete js-cart-pay-bottom__button-delete">
                                        Xóa
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="cart-mobile">
                            <div class="cart__container" id="cartMobile">
                                <?php foreach (Session::get('cart') as $data) : ?>
                                    <div class="cart__header-item__mobile">
                                        <div class="cart__header-tick">
                                            <input type="checkbox" name="check" class="cart__header-tick-input">
                                        </div>
                                        <div class="cart__header-column">
                                            <img src="../../public/web/img/products/<?php echo $data['img'] ?>" class="cart__product-img">
                                        </div>
                                        <div class="cart__header-column-mobile__wrap">
                                            <div class="cart__header-column">
                                                <a href="" class="cart__product-name"><?php echo $data['name'] ?></a>
                                                <div class="cart__product-type">Khối lượng: 0.5kg</div>
                                            </div>
                                            <div class="cart__header-column">
                                                <span class="cart__product-price--old"><?php echo $data['price'] . 'đ' ?></span>
                                                <span class="cart__product-price--new"><?php echo $data['price'] . 'đ' ?></span>
                                            </div>
                                            <div class="cart__header-column">
                                                <div class="cart__header-column__action">
                                                    <button class="cart__product-quantity--sub" onmousedown="decrement2(this);" onclick="addCart2(<?php echo $data['idProduct']; ?>, this)">-</button>
                                                    <input class="cart__product-quantity-input" value="<?php echo $data['quantity'] ?>"></input>
                                                    <button class="cart__product-quantity--add" onmousedown="increment2(this);" onclick="addCart2(<?php echo $data['idProduct']; ?>, this)">+</button>
                                                </div>
                                            </div>
                                            <div class="cart__header-column">
                                                <span class="cart__product-price--sum"><?php echo $data['quantity'] * $data['price'] ?> đ</span>
                                            </div>
                                            <div class="cart__header-column">
                                                <a href="#" class="cart__product-action" onclick="deleteCart2(<?php echo $data['idProduct']; ?>, this);">Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart__hr"></div>
                                <?php endforeach ?>
                            </div>

                            <script>
                                function increment2(Object) {
                                    var input = Object.parentElement.children[1]
                                    var oldValue = parseInt(input.value);
                                    var priceProduct = parseInt(Object.parentElement.parentElement.parentElement.children[1].children[1].innerText);
                                    var divTotal = Object.parentElement.parentElement.parentElement.children[3].children[0];
                                    var total = parseInt(divTotal.innerText);

                                    if (oldValue < 100) {
                                        input.setAttribute('value', oldValue + 1)
                                        total = (oldValue + 1) * priceProduct;
                                        divTotal.innerHTML = total + ' đ';
                                    }
                                }

                                function decrement2(Object) {
                                    var input = Object.parentElement.children[1]
                                    var oldValue = parseInt(input.value);
                                    var priceProduct = parseInt(Object.parentElement.parentElement.parentElement.children[1].children[1].innerText);
                                    var divTotal = Object.parentElement.parentElement.parentElement.children[3].children[0];
                                    var total = parseInt(divTotal.innerText);


                                    if (oldValue > 1) {
                                        input.setAttribute('value', oldValue - 1)
                                        total = (oldValue - 1) * priceProduct;
                                        divTotal.innerHTML = total + ' đ';
                                    }
                                }

                                function addCart2(id, object) {
                                    var quantity = parseInt(object.parentElement.children[1].value);
                                    $.ajax({
                                        url: 'ajaxCart.php',
                                        type: 'POST',
                                        dataType: 'html',
                                        data: {
                                            'id': id,
                                            'quantity': quantity,
                                            'act': 'add'
                                        }
                                    }).done(function(getHtml) {
                                        item = getHtml.split("-");
                                        $('#sumOrder').text(item[0]);
                                        $('#sum_OrderMobile').text(item[1]);
                                        $('#totalPayMobile').text(item[2]);
                                        $('#listCart').html(item[3])
                                    });
                                }

                                function deleteCart2(id, Object) {
                                    $.ajax({
                                        url: 'ajaxCart.php',
                                        type: 'POST',
                                        dataType: 'html',
                                        data: {
                                            'id': id,
                                            'act': 'delete'
                                        }
                                    }).done(function(getHtml) {
                                        item = getHtml.split("-");
                                        $('#sumOrder').text(item[0]);
                                        $('#sum_OrderMobile').text(item[1]);
                                        $('#totalPayMobile').text(item[2]);
                                        $('#listCart').html(item[3])
                                    });

                                    const cartMobile = document.getElementById('cartMobile');
                                    var cartMobileItem = Object.parentElement.parentElement.parentElement;
                                    var hrMobileItem = Object.parentElement.parentElement.parentElement.nextElementSibling;

                                    console.log(cartMobileItem);
                                    cartMobile.removeChild(cartMobileItem);
                                    cartMobile.removeChild(hrMobileItem);
                                }
                            </script>

                            <div class="cart-pay__discount-code js-cart-pay__discount-code">
                                <label for="discountCode" class="cart-pay__discount-code-title">Nhập mã giảm giá:</label>
                                <input id="discountCode" type="text" class="cart-pay__discount-code-input">
                            </div>
                            <div class="cart-pay-bottom">
                                <div class="cart-pay-bottom-wrap-left">
                                    <div class="cart__header-tick">
                                        <input id="select_all" onClick="toggle(this)" name="check" type="checkbox" class="cart__header-tick-input">
                                    </div>
                                    <div class="cart-pay-bottom__select">
                                        <label for="select_all" class="cart-pay-bottom__select-all">Chọn tất cả</label>
                                    </div>
                                    <div class="cart-pay-bottom__delete">
                                        <a href="" class="cart-pay-bottom__delete-all">Xóa</a>
                                    </div>
                                </div>

                                <div class="cart-pay-bottom-wrap-right">
                                    <div class="cart-pay-bottom__sum-product">
                                        <span>Tổng thanh toán(<span id="sum_OrderMobile">
                                                <?php
                                                foreach (Session::get('cart') as $data) {
                                                    $sumOrder = 0;
                                                    foreach ($cart as $data) {
                                                        $sumOrder += $data['quantity'];
                                                    }
                                                }
                                                echo $sumOrder;
                                                ?>
                                            </span> sản phẩm):</span>
                                    </div>

                                    <div class="cart-pay-bottom__sum-product-wrap js-cart-pay-bottom__sum-product-wrap">
                                        <div class="cart-pay-bottom__sum-product-mobile">
                                            <span>Tổng:</span>
                                        </div>

                                        <div class="cart-pay-bottom__total-pay" id="totalPayMobile">
                                            <?php
                                            $total = 0;
                                            foreach (Session::get('cart') as $value) {
                                                $total += (int)$value["price"] * (int)$value["quantity"];
                                            }
                                            echo $total  . 'đ'
                                            ?>
                                        </div>
                                    </div>
                                    <form action="cart.php" method="POST">
                                        <<button class="cart-pay-bottom__button-pay js-cart-pay-bottom__button-pay" type="submit">
                                            Mua hàng
                                            </button>
                                    </form>
                                    <button class="cart-pay-bottom__button-delete js-cart-pay-bottom__button-delete">
                                        Xóa
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col l-12 m-12 c-12">
                        <div class="cart__favorite">
                            <h4 class="cart__favorite-title">
                                CÓ THỂ BẠN CŨNG THÍCH
                            </h4>

                            <div class="cart__favorite-form">
                                <div class="row sm-gutter">
                                    <?php
                                    $recommend = $product->get_product_Limit6();
                                    if ($recommend) {
                                        foreach ($recommend as $data) {
                                    ?>
                                            <div class="col l-2 m-4 c-6">
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
                                                                <span class="product-item__sale-off-percent">' . $data['Percent'] . '%</span>
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
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php
        include '../../inc/web/footer.php';
        ?>


    </div>
    <script src="../../public/web/js/cart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>