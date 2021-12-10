<?php
    include_once '../../Classes/web/userOrder.php';
    include_once '../../Classes/web/cart.php';


    $buyAgain = new listOrder();
    $add = new cart();

    if (isset($_GET['IdOrder'])) {
        $IdOrder = filter_input(INPUT_GET, 'IdOrder');
        $listIdProduct = $buyAgain->buy_again($IdOrder);
        if($listIdProduct){
            echo "<prE>";
            foreach($listIdProduct as $data){
                $id = $data['IdProduct'];
                $add->add_cartItem($id, 1);
            }
            header("Location: ../../views/web/cart.php");
        }
        else{
            echo 'Lỗi....?';
        }
    }
?>
