<?php
    include_once '../../lib/database.php';
    include_once '../../helpers/format.php';
?>

<?php
    class Order
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function get_order()
        {
            $query = "SELECT * FROM `order` o JOIN `account` a ON o.IdAccount = a.IdAccount";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_OrderDetailById($id)
        {
            $query = "SELECT * FROM `orderdetail` o JOIN `product` p ON o.IdProduct = p.IdProduct WHERE IdOrder = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function quantity_order()
        {
            $query = "SELECT * FROM `order`";
            $result = $this->db->select($query);
            $rows = mysqli_num_rows($result);
            return $rows;
        }

        public function get_total()
        {
            $query = "SELECT * FROM `order`";
            $result = $this->db->select($query);
            $total = 0;
            foreach($result as $data){
                $total += $data['Total'];
            }
            return $total;
        }
    

        public function update_order($id)
        {
            $status = 2;
            $query = "UPDATE `order` SET StatusOrder ='$status' WHERE IdOrder = '$id' ";
            $result = $this->db->update($query);

            if($result){
                $alert = "<span style='color: #00CC00; font-size: 1.4rem;'>Duyệt đơn hàng thành công</span>";
                return $alert;
            } else{
                $alert = "<span style='color: red; font-size: 1.4rem'>Duyệt đơn hàng thất bại!!!</span>";
                return $alert;
            }
            
        }

        public function delete_supplier($id)
        {
            $query = "DELETE FROM supplier WHERE IdSupplier = '$id' ";
            $result = $this->db->delete($query);
            if($result)
                echo '<script language="javascript"> alert ("Xóa nhà cung cấp thành công");</script> ';
            else
                echo '<script language="javascript"> alert ("Xóa nhà cung cấp thất bại!!!");</script> ';
        }
    }
?>