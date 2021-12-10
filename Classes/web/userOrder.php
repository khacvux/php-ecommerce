<?php
    include_once '../../lib/database.php';
    include_once '../../helpers/format.php';


    class listOrder
    {   
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }
        public function getListOrder_all($idAccount){
            $query="SELECT `IdOrder`,`Total`,`StatusOrder`
                    FROM `order` 
                    WHERE `IdAccount` = '$idAccount'";
            $result = $this->db->select($query);

            if($result == true){
                foreach($result as $data){
                    $queryDetailOrder = "SELECT 
                        o.`IdProduct`, 
                        `NameProduct`,
                        `ProductImg1`,
                        `QuantityOrder`, 
                        `SumOrder` 
                        FROM `orderdetail` o 
                        JOIN `product` p 
                        ON `o`.`IdProduct` = `p`.`IdProduct`
                        WHERE `IdOrder` = '" . $data['IdOrder'] . "'";

                    $resultDetailOrder = $this->db->select($queryDetailOrder);
                    if($resultDetailOrder == true){
                        $listDetail[$data['IdOrder']] = array(
                            'listDetail' =>  $resultDetailOrder
                        );
                    }
                }
            }

            if($result == true){
                return array(
                    'listOrder' => $result,
                    'listDetailOrder' => $listDetail,
                );
            } else{
                return array(
                    'listOrder' => '',
                    'listDetailOrder' => '',
                );
            }

        }

        public function getListOrder_where($idAccount, $status){
            $query="SELECT `IdOrder`,`Total`,`StatusOrder`
                    FROM `order` 
                    WHERE `IdAccount` = '$idAccount'
                    AND `StatusOrder` = '$status'";
            $result = $this->db->select($query);

            if($result == true){
                foreach($result as $data){
                    $queryDetailOrder = "SELECT 
                        o.`IdProduct`, 
                        `NameProduct`,
                        `ProductImg1`,
                        `QuantityOrder`, 
                        `SumOrder` 
                        FROM `orderdetail` o 
                        JOIN `product` p 
                        ON `o`.`IdProduct` = `p`.`IdProduct`
                        WHERE `IdOrder` = '" . $data['IdOrder'] . "'";

                    $resultDetailOrder = $this->db->select($queryDetailOrder);
                    if($resultDetailOrder == true){
                        $listDetail[$data['IdOrder']] = array(
                            'listDetail' =>  $resultDetailOrder
                        );
                    }
                }
            }

            if($result == true){
                return array(
                    'listOrder' => $result,
                    'listDetailOrder' => $listDetail,
                );
            } else{
                return array(
                    'listOrder' => '',
                    'listDetailOrder' => '',
                );
            }

        }

        public function setOrder_canceled($idOrder){
            $query = "UPDATE `order` 
                SET `StatusOrder` = '4' 
                WHERE `order`.`IdOrder` = $idOrder;
            ";
            $this->db->update($query);
        }
        
        public function setOrder_delivered($idOrder){
            $query = "UPDATE `order` 
                SET `StatusOrder` = '3' 
                WHERE `order`.`IdOrder` = '$idOrder';
            ";
            $this->db->update($query);
        }

        public function buy_again($idOrder){
            $query = "SELECT `IdProduct` FROM `orderdetail` WHERE IdOrder = '$idOrder'";
            return $this->db->select($query);
            
        }
       
    }
?>