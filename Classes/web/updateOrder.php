<?php
    include '../../lib/session.php';
    include '../../Classes/web/userOrder.php';
    Session::checkSessionUser();
    $class = new listOrder();

    if(isset($_POST['idOrder']) && isset($_POST['act'])){
        $idOrder = filter_input(INPUT_POST, 'idOrder');
        $act = filter_input(INPUT_POST, 'act');

        if($act == 'cancel'){
            $class->setOrder_canceled($idOrder);
        }
        elseif($act == 'delivered'){
            $result = $class->setOrder_delivered($idOrder);
            if($result ==true){
                echo 'success';
            }
            else{
                echo 'error';
            }
        }
    }
?>