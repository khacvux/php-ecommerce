<?php
    include_once '../../lib/database.php';
    include_once '../../helpers/format.php';
?>

<?php
    class category
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        function randomName()
        {
            $possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            return substr(str_shuffle($possible), 0, 16);
        }

        public function insert_category($cateName, $description)
        {
            $cateName = $this->fm->validation($cateName);
            $cateName = mysqli_real_escape_string($this->db->link, $cateName);
            $description = mysqli_real_escape_string($this->db->link, $description);

            if(empty($cateName) || empty($description)){
                echo '<script language="javascript"> alert ("Hãy điền đầy đủ thông tin");</script> ';
            }
            else
            {
                $query = "INSERT INTO category(NameCategory, Title) VALUES ('$cateName', '$description')";
                $result = $this->db->insert($query);

                if($result)
                    echo '<script language="javascript"> alert ("Thêm danh mục sản thành công");</script> ';
                else
                    echo '<script language="javascript"> alert ("Thêm danh mục sản phẩm thất bại!!!");</script> ';
            }
        }

        public function get_category()
        {
            $query = "SELECT * FROM category";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_cateById($id)
        {
            $query = "SELECT * FROM category WHERE IdCategory = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_category($data, $files, $id)
        {
            $cateName = mysqli_real_escape_string($this->db->link, $data['cateName']);
            $cateName = $this->fm->validation($cateName);
            $description = mysqli_real_escape_string($this->db->link, $data['description']);

            // IMG
            $target_dir = "../../public/admin/Image/web/";
            $img = "";
            $div = explode('.', $_FILES["img"]["name"]);
            $file_ext = strtolower(end($div));
            $unique_file = $this->randomName() . '.' . $file_ext;
            $target_file = $target_dir . $unique_file;
            $status_upload = move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

            if ($status_upload) {
                $img = $unique_file;
            }

            if(empty($cateName))
            {
                $alert = "<span style='color: red;'>Tên danh mục không được để trống!!!</span>";
                return $alert;
            }
            else
            {
                if($img == ''){
                    $query = "UPDATE `category` SET NameCategory='$cateName', Title='$description' WHERE IdCategory = '$id' ";
                    $result = $this->db->update($query);
                } else{
                    $query = "UPDATE `category` SET NameCategory='$cateName', Title='$description', img='$img' WHERE IdCategory = '$id' ";
                    $result = $this->db->update($query);
                }

                if($result){
                    $alert = "<span style='color: #00CC00;'>Cập nhật danh mục thành công</span>";
                    return $alert;
                } else{
                    $alert = "<span style='color: red;'>Cập nhật danh mục thất bại!!!</span>";
                    return $alert;
                }
            } 
        }

        public function delete_category($id)
        {
            $query = "DELETE FROM category WHERE IdCategory = '$id' ";
            $result = $this->db->delete($query);
            if($result)
                echo '<script language="javascript"> alert ("Xóa danh mục sản phẩm thành công");</script> ';
            else
                echo '<script language="javascript"> alert ("Xóa danh mục sản phẩm thất bại!!!");</script> ';
        }
    }
?>