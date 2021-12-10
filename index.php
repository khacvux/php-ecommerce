<?php
$mod = isset($_POST['act']) ? $_POST['act'] : 'home';

switch ($mod){
    case 'home':
        header("Location:views/web/index.php");
        break;
}
?>
