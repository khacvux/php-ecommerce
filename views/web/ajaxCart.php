<?php
    include '../../Classes/web/cart.php';

    $classCart = new cart();
    if(isset($_POST['act'])){
        $act = filter_input(INPUT_POST, 'act');
        if($act == 'add'){
            if(isset($_POST['id']) && isset($_POST['quantity'])){
                $id = filter_input(INPUT_POST, 'id');
                $quantity = filter_input(INPUT_POST, 'quantity');
                $classCart->add_cartItem($id, $quantity);

            }
        }
        else if($act == 'delete'){
            if(isset($_POST['id'])){
                $id = $_POST['id'];
                unset($_SESSION['cart'][$id]);        
            }
        }

        $cart = Session::get('cart');
        $sumProduct = count($cart);
        $sumOrder = 0;
        $total = 0;
        foreach($cart as $data){
            $sumOrder += $data['quantity'];
            $total += $data['price']*$data['quantity'];
        }

        $postHtml = "";
        $postHtml .= $sumProduct;
        $postHtml .= "-";
        $postHtml .= $sumOrder;
        $postHtml .= "-";
        $postHtml .= $total;
        $postHtml .= " đ";
        $postHtml .= "-";

        echo $postHtml;
    }
?>
<?php foreach ($cart as $data): ?>
    <li class="header__cart-item">
        <img src="../../public/web/img/products/<?php echo $data['img'] ?>" alt="cart-product" class="header__cart-img">
        <div class="header__cart-item-info">
            <div class="header__cart-item-head">
                <h5 class="header__cart-item-name"><?php echo $data['name'] ?></h5>
                <div class="header__cart-price-wrap">
                    <span class="header__cart-item-price"><?php echo $data['price']?> đ</span>
                    <span class="header__cart-item-multiply">x</span>
                    <span class="header__cart-item-quantity"><?php echo $data['quantity'] ?></span>
                </div>
            </div>
            <div class="header__cart-item-body">
                <span class="header__cart-item-description">1kg</span>
                <span class="header__cart-item-remove">Xóa</span>
            </div>
        </div>
    </li>
<?php endforeach ?>
</ul>