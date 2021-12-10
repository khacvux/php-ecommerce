<?php
include_once '../../lib/database.php';
include_once '../../helpers/format.php';
?>

<?php
class web
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

    // Get Info website
    public function get_web()
    {
        $query = "SELECT * FROM infoweb";
        $result = $this->db->select($query);
        return $result;
    }

    // Info Website
    public function update_web($data, $files)
    {
        $id = 1;
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phoneNumber = mysqli_real_escape_string($this->db->link, $data['phoneNumber']);
        $fanPage = mysqli_real_escape_string($this->db->link, $data['fanPage']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $title = mysqli_real_escape_string($this->db->link, $data['editor1']);

        $width = 500;
        $height = 500;
        if (isset($fanPage)) {
            $url = "https://chart.googleapis.com/chart?cht=qr&chs={$width}x{$height}&chl={$fanPage}&chld=<L>|<1>";
        }

        $target_dir = "../../public/admin/Image/web/";
        //IMG1
        $img1 = "";
        $div = explode('.', $_FILES["img1"]["name"]);
        $file_ext = strtolower(end($div));
        $unique_file = $this->randomName() . '.' . $file_ext;
        $target_file = $target_dir . $unique_file;
        $status_upload = move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file);

        if ($status_upload) {
            $img1 = $unique_file;
        }

        //IMG2
        $img2 = "";
        $div = explode('.', $_FILES["img2"]["name"]);
        $file_ext = strtolower(end($div));
        $unique_file = $this->randomName() . '.' . $file_ext;
        $target_file = $target_dir . $unique_file;
        $status_upload = move_uploaded_file($_FILES["img2"]["tmp_name"], $target_file);

        if ($status_upload) {
            $img2 = $unique_file;
        }

        $data = array(
            'webname' => $name,
            'email' => $email,
            'title' => $title,
            'phoneNumber' => $phoneNumber,
            'fanpage' => $fanPage,
            'addressWeb' => $address,
            'logo' => $img1,
            'favicon' => $img2,
            'QRCode' => $url,
        );
        if ($img1 == "") {
            unset($data['logo']);
        }
        if ($img2 == "") {
            unset($data['favicon']);
        }

        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");
        $query = "UPDATE `infoweb` SET  $v   WHERE IdWeb = '$id'";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span style='color: #00CC00;'>Cập nhật thông tin thành công</span>";
            return $alert;
        } else {
            $alert = "<span style='color: red;'>Cập nhật thông tin thất bại!!!</span>";
            return $alert;
        }
    }

    public function delete_logo($id)
    {
        $query = "UPDATE `infoweb` SET  logo =''  WHERE IdWeb = '$id'";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span style='color: #00CC00;'>Xóa logo thành công</span>";
            return $alert;
        } else {
            $alert = "<span style='color: red;'>Xóa logo thất bại!!!</span>";
            return $alert;
        }
    }

    public function delete_favicon($id)
    {
        $query = "UPDATE `infoweb` SET  favicon = ''   WHERE IdWeb = '$id'";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span style='color: #00CC00;'>Xóa favicon thành công</span>";
            return $alert;
        } else {
            $alert = "<span style='color: red;'>Xóa favicon thất bại!!!</span>";
            return $alert;
        }
    }

    // End Info Website

    // Img Landing Page
    public function insert_Img($data, $files)
    {
        $title = mysqli_real_escape_string($this->db->link, $data['title']);

        $target_dir = "../../public/admin/Image/web/";
        //IMG1
        $img1 = "";
        $div = explode('.', $_FILES["img1"]["name"]);
        $file_ext = strtolower(end($div));
        $unique_file = $this->randomName() . '.' . $file_ext;
        $target_file = $target_dir . $unique_file;
        $status_upload = move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file);

        if ($status_upload) {
            $img1 = $unique_file;
        }

        if ($title == '' || $img1 == '') {
            echo '<script language="javascript"> alert ("Không được để trống");</script> ';
        } else {
            $query = "INSERT INTO imglandingpage(Img, Title) VALUES ('$img1', '$title')";
            $result = $this->db->insert($query);

            if ($result)
                echo '<script language="javascript"> alert ("Thêm ảnh thành công");</script> ';
            else
                echo '<script language="javascript"> alert ("Thêm ảnh thất bại!!!");</script> ';
        }
    }
    public function get_img()
    {
        $query = "SELECT * FROM imglandingpage";
        $result = $this->db->select($query);
        return $result;
    }
    public function delete_img($id)
    {
        $query = "DELETE FROM `imglandingpage` WHERE IdImg = '$id' ";
        $result = $this->db->delete($query);
        if ($result)
            echo '<script language="javascript"> alert ("Xóa hình ảnh thành công");</script> ';
        else
            echo '<script language="javascript"> alert ("Xóa hình ảnh thất bại!!!");</script> ';
    }
    public function get_imgById($id)
    {
        $query = "SELECT * FROM `imglandingpage` WHERE IdImg = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_img($data, $files, $id)
    {
        $description = mysqli_real_escape_string($this->db->link, $data['description']);
        $description = $this->fm->validation($description);

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

        if (empty($description)) {
            $alert = "<span style='color: red;'>Tên danh mục không được để trống!!!</span>";
            return $alert;
        } else {
            if ($img == '') {
                $query = "UPDATE `imglandingpage` SET Title='$description' WHERE IdImg = '$id' ";
                $result = $this->db->update($query);
            } else {
                $query = "UPDATE `imglandingpage` SET Title='$description', Img='$img' WHERE IdImg = '$id' ";
                $result = $this->db->update($query);
            }

            if ($result) {
                $alert = "<span style='color: #00CC00;'>Cập nhật danh mục thành công</span>";
                return $alert;
            } else {
                $alert = "<span style='color: red;'>Cập nhật danh mục thất bại!!!</span>";
                return $alert;
            }
        }
    }
}
?>