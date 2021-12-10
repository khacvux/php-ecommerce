<?php
    include_once '../../lib/database.php';
    include_once '../../helpers/format.php';
?>

<?php
    class sale
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_sale($saleName, $description, $discount)
        {
            $saleName = $this->fm->validation($saleName);
            $discount = $this->fm->validation($discount);

            $saleName = mysqli_real_escape_string($this->db->link, $saleName);
            $description = mysqli_real_escape_string($this->db->link, $description);
            $discount = mysqli_real_escape_string($this->db->link, $discount);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time =  date('Y-m-d H:i:s');

            if(empty($saleName) || empty($description) || empty($discount)){
                echo '<script language="javascript"> alert ("Các nội dung không được để trống");</script> ';
            }
            else
            {
                $query = "INSERT INTO `sale`(NameSale, DescripSale, Percent, DateStart) VALUES ('$saleName', '$description', '$discount', '$time')";
                $result = $this->db->insert($query);

                if($result)
                    echo '<script language="javascript"> alert ("Thêm khuyến mãi thành công");</script> ';
                else
                    echo '<script language="javascript"> alert ("Thêm khuyến mãi thất bại!!!");</script> ';
            }
        }

        public function get_sale()
        {
            $query = "SELECT * FROM sale";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_saleById($id)
        {
            $query = "SELECT * FROM sale WHERE IdSale = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_sale($nameSale, $discount, $description, $id)
        {
            $nameSale = $this->fm->validation($nameSale);
            $discount = $this->fm->validation($discount);
            
            $nameSale = mysqli_real_escape_string($this->db->link, $nameSale);
            $discount = mysqli_real_escape_string($this->db->link, $discount);
            $id = mysqli_real_escape_string($this->db->link, $id);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time =  date('Y-m-d H:i:s');

            if(empty( $nameSale) || empty($discount) || empty($description))
            {
                $alert = "<span style='color: red;'>Không được để trống!!!</span>";
                return $alert;
            }
            else
            {
                $query = "UPDATE `sale` SET NameSale='$nameSale', DescripSale='$description', Percent='$discount', DateStart='$time' WHERE IdSale = '$id' ";
                $result = $this->db->update($query);

                if($result){
                    $alert = "<span style='color: #00CC00;'>Cập nhật khuyến mãi thành công</span>";
                    return $alert;
                } else{
                    $alert = "<span style='color: red;'>Cập nhật khuyến mãi thất bại!!!</span>";
                    return $alert;
                }
            } 
        }

        public function delete_sale($id)
        {
            $query = "DELETE FROM sale WHERE IdSale = '$id' ";
            $result = $this->db->delete($query);
            if($result)
                echo '<script language="javascript"> alert ("Xóa khuyến mãi thành công");</script> ';
            else
                echo '<script language="javascript"> alert ("Xóa khuyến mãi thất bại!!!");</script> ';
        }
    }
?>