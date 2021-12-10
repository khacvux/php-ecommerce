<?php
    include_once '../../helpers/format.php';
    include_once '../../lib/database.php';
    include '../../lib/session.php';
    Session::init();

    class cart
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function add_cartItem($id, $quantity){
            // $query = "SELECT * FROM `product`  WHERE IdProduct = '$id' ";
            $query = "SELECT `IdProduct`, 
                            `NameProduct`, 
                            `Price`, 
                            `ProductImg1`, 
                            `Percent` 
                        FROM `product` p 
                        JOIN `sale` s 
                        ON p.IdSale = s.IdSale  
                        WHERE IdProduct = '$id' ";

            $result = $this->db->select($query);
            $value = mysqli_fetch_row($result);
            $price = ($value[2]*(100-$value[4])/100);
    
            if( $result != false){
                if(!isset($_SESSION["cart"])){
                    $cart[$id] = array(
                            'idProduct' => $value[0],
                            'name' => $value[1],
                            'price' => $price,
                            'img' => $value[3],
                            'quantity' => $quantity,
                            
                    );
                }
                else{
                    $cart = $_SESSION["cart"];
                        $cart[$id] = array(
                            'idProduct' => $value[0],
                            'name' => $value[1],
                            'price' => $price,
                            'img' => $value[3],
                            'quantity' => $quantity,
                            
                    );
                }
            }
            $_SESSION["cart"] = $cart;
        }

        public function delete_cartItem($id){
            unset($_SESSION['cart'][$id]);  
        }
    }


?>