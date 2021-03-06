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
            $alert = "<span style='color: #00CC00;'>C???p nh???t th??ng tin th??nh c??ng</span>";
            return $alert;
        } else {
            $alert = "<span style='color: red;'>C???p nh???t th??ng tin th???t b???i!!!</span>";
            return $alert;
        }
    }

    public function delete_logo($id)
    {
        $query = "UPDATE `infoweb` SET  logo =''  WHERE IdWeb = '$id'";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span style='color: #00CC00;'>X??a logo th??nh c??ng</span>";
            return $alert;
        } else {
            $alert = "<span style='color: red;'>X??a logo th???t b???i!!!</span>";
            return $alert;
        }
    }

    public function delete_favicon($id)
    {
        $query = "UPDATE `infoweb` SET  favicon = ''   WHERE IdWeb = '$id'";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span style='color: #00CC00;'>X??a favicon th??nh c??ng</span>";
            return $alert;
        } else {
            $alert = "<span style='color: red;'>X??a favicon th???t b???i!!!</span>";
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
            echo '<script language="javascript"> alert ("Kh??ng ???????c ????? tr???ng");</script> ';
        } else {
            $query = "INSERT INTO imglandingpage(Img, Title) VALUES ('$img1', '$title')";
            $result = $this->db->insert($query);

            if ($result)
                echo '<script language="javascript"> alert ("Th??m ???nh th??nh c??ng");</script> ';
            else
                echo '<script language="javascript"> alert ("Th??m ???nh th???t b???i!!!");</script> ';
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
            echo '<script language="javascript"> alert ("X??a h??nh ???nh th??nh c??ng");</script> ';
        else
            echo '<script language="javascript"> alert ("X??a h??nh ???nh th???t b???i!!!");</script> ';
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
            $alert = "<span style='color: red;'>T??n danh m???c kh??ng ???????c ????? tr???ng!!!</span>";
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
                $alert = "<span style='color: #00CC00;'>C???p nh???t danh m???c th??nh c??ng</span>";
                return $alert;
            } else {
                $alert = "<span style='color: red;'>C???p nh???t danh m???c th???t b???i!!!</span>";
                return $alert;
            }
        }
    }
}
?>