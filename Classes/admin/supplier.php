<?php
    include_once '../../lib/database.php';
    include_once '../../helpers/format.php';
?>

<?php
    class Supplier
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_supplier($supplierName, $supplierAddress,$linkWeb, $url)
        {
            $supplierName = $this->fm->validation($supplierName);
            $supplierAddress = $this->fm->validation($supplierAddress);

            $supplierName = mysqli_real_escape_string($this->db->link, $supplierName);
            $supplierAddress = mysqli_real_escape_string($this->db->link, $supplierAddress);

            if(empty($supplierName) || empty($supplierAddress) || empty($url)){
                echo '<script language="javascript"> alert ("Tên và địa chỉ nhà cung cấp không được để trống");</script> ';
            }
            else
            {
                $query = "INSERT INTO supplier(NameSupplier, AddressSupplier,linkWebsite, QRCode) VALUES ('$supplierName', '$supplierAddress','$linkWeb', '$url')";
                $result = $this->db->insert($query);

                if($result)
                    echo '<script language="javascript"> alert ("Thêm nhà cung cấp thành công");</script> ';
                else
                    echo '<script language="javascript"> alert ("Thêm nhà cung cấp thất bại!!!");</script> ';
            }
        }

        public function get_supplier()
        {
            $query = "SELECT * FROM supplier";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_supplierById($id)
        {
            $query = "SELECT * FROM supplier WHERE IdSupplier = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_supplier($nameSupplier, $addressSupplier, $linkWeb, $url, $id)
        {
            $nameSupplier = $this->fm->validation($nameSupplier);
            $addressSupplier = $this->fm->validation($addressSupplier);
            $linkWeb = $this->fm->validation($linkWeb);
            
            $nameSupplier = mysqli_real_escape_string($this->db->link, $nameSupplier);
            $addressSupplier = mysqli_real_escape_string($this->db->link, $addressSupplier);
            $linkWeb = mysqli_real_escape_string($this->db->link, $linkWeb);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($nameSupplier) || empty($addressSupplier) || empty($url))
            {
                $alert = "<span style='color: red;'>Tên nhà cung cấp và địa chỉ không được để trống!!!</span>";
                return $alert;
            }
            else
            {
                $query = "UPDATE `supplier` SET NameSupplier='$nameSupplier', AddressSupplier='$addressSupplier',linkWebsite='$linkWeb', QRCode = '$url' WHERE IdSupplier = '$id' ";
                $result = $this->db->update($query);

                if($result){
                    $alert = "<span style='color: #00CC00;'>Cập nhật thông tin nhà cung cấp thành công</span>";
                    return $alert;
                } else{
                    $alert = "<span style='color: red;'>Cập nhật thông tin nhà cung cấp thất bại!!!</span>";
                    return $alert;
                }
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