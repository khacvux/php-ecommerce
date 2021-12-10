<?php

    $conn =  mysqli_connect('localhost', 'root', '', 'webnongsan');

    if(isset($_REQUEST["term"])){
        $sql = "SELECT `IdProduct`,`NameProduct` 
            FROM `product` 
            WHERE `NameProduct` LIKE ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            $param_term = $_REQUEST["term"] . '%';
            mysqli_stmt_bind_param($stmt, "s", $param_term);
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                if(mysqli_num_rows($result) > 0){
                    while($value = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo '<li class="header__search-history-item">
                                <a href="../../views/web/product-detail.php?idProduct='. $value['IdProduct'] .'" class="header__search-history-item"> '
                                    .$value['NameProduct']
                                .'</a>
                            </li>';
                    }


                } 
                else{
                    echo '<li class="header__search-history-item">
                            <a href="#">Không tìm thấy kết quả nào</a>
                        </li>';
                }
            } else{
        echo "ERROR: Không thể thực thi câu lệnh $sql. " . mysqli_error($conn);
            } 

        }

        mysqli_stmt_close($stmt); 
    }
    mysqli_close($conn); 
?>
