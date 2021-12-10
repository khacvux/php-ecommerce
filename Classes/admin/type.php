<?php
    include_once '../../lib/database.php';
    include_once '../../helpers/format.php';
?>

<?php
    class type
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_type($nameType, $mass)
        {
            $nameType = $this->fm->validation($nameType);
            $mass = $this->fm->validation($mass);

            $nameType = mysqli_real_escape_string($this->db->link, $nameType);
            $mass = mysqli_real_escape_string($this->db->link, $mass);

            if(empty($nameType) || empty($mass)){
                echo '<script language="javascript"> alert ("Không được để trống");</script> ';
            }
            else
            {
                $query = "INSERT INTO `type`(NameType, Mass) VALUES ('$nameType', '$mass')";
                $result = $this->db->insert($query);

                if($result)
                    echo '<script language="javascript"> alert ("Thêm loại sản phẩm thành công");</script> ';
                else
                    echo '<script language="javascript"> alert ("Thêm loại sản phẩm thất bại!!!");</script> ';
            }
        }

        public function get_type()
        {
            $query = "SELECT * FROM `type`";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_typeById($id)
        {
            $query = "SELECT * FROM `type` WHERE IdType = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_type($nameType, $mass, $id)
        {
            $nameType = $this->fm->validation($nameType);
            $mass = $this->fm->validation($mass);
            
            $nameType = mysqli_real_escape_string($this->db->link, $nameType);
            $mass = mysqli_real_escape_string($this->db->link, $mass);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($nameType) || empty($mass))
            {
                $alert = "<span style='color: red;'>Tên nhà cung cấp và địa chỉ không được để trống!!!</span>";
                return $alert;
            }
            else
            {
                $query = "UPDATE `type` SET NameType='$nameType', Mass='$mass' WHERE IdType = '$id' ";
                $result = $this->db->update($query);

                if($result){
                    $alert = "<span style='color: #00CC00;'>Cập nhật thông tin loại sản phẩm thành công</span>";
                    return $alert;
                } else{
                    $alert = "<span style='color: red;'>Cập nhật thông tin loại sản phẩm thất bại!!!</span>";
                    return $alert;
                }
            } 
        }

        public function delete_type($id)
        {
            $query = "DELETE FROM `type` WHERE IdType = '$id' ";
            $result = $this->db->delete($query);
            if($result)
                echo '<script language="javascript"> alert ("Xóa loại sản phẩm thành công");</script> ';
            else
                echo '<script language="javascript"> alert ("Xóa loại sản phẩm thất bại!!!");</script> ';
        }
        public function search($a)
        {
            $query = "SELECT * FROM `type` WHERE Mass like '%$a%'";
            $result = $this->db->select($query);
            $num = mysqli_num_rows($result);
            if($num > 0)
            {
                while ($row = mysqli_fetch_array($result)){
                    echo '<div class="Type-content-row list">';
                    echo    '<div class="OrderList-content-row-check">';
                    echo       '<input type="checkbox" name="check" id="" class="OrderList-content-row-checkbox">';
                    echo    '</div>';
                    echo   '<div class="OrderList-content-row__td">';
                    echo        '<span><?php echo $data["IdType"] ?></span>';
                    echo    '</div>';
                    echo   ' <div class="OrderList-content-row__td">';
                    echo       '<span><?php echo $data["NameType"] ?></span>';
                    echo  '</div>';
                    echo   '<div class="OrderList-content-row__td">';
                    echo       '<span><?php echo $data["Mass"] . "kg" ?></span>';
                    echo    '</div>';
                    echo    '<div class="body-action">';
                    echo      '<a href="EditTypes.php?typeId=<?php echo  $data["IdType"] ?>" title="Chỉnh sửa" class="icon"><i class="action__icon--edit bx bx-edit"></i></a>';
                    echo       '<a href="?delete=<?php echo $data["IdType"] ?>" onClick="return confirm("Bạn có muốn xóa không?")" title="Xóa" class="icon"><i class="action__icon--delete bx bxs-trash"></i></a>';
                    echo   '</div>';
                    echo '</div>';
                }
            }
        }

    }
?>