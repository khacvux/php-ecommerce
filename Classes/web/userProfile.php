<?php
include '../../lib/database.php';
include '../../helpers/format.php';

class userProfile
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

    public function user_updateProfile($data, $files)
    {
        $userName = mysqli_real_escape_string($this->db->link, $data['userName']);
        $birthday = mysqli_real_escape_string($this->db->link, $data['birthday']);
        $gender = mysqli_real_escape_string($this->db->link, $data['gender']);

        $userId = Session::get('userId');
        $oldEmail = Session::get('userEmail');

        if ($birthday == 0) {
            echo '
                <script type="text/javascript">
                    console.log("dsad");
                </script>
                ';
        }

        // IMG
        $target_dir = "../../public/admin/Image/accountImg/";
        $img = "";
        $div = explode('.', $_FILES["img"]["name"]);
        $file_ext = strtolower(end($div));
        $unique_file = $this->randomName() . '.' . $file_ext;
        $target_file = $target_dir . $unique_file;
        $status_upload = move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

        if ($status_upload) {
            $img = $unique_file;
        }

        if ($img == "") {
            $query = "UPDATE `account` SET `Username` = '$userName', `Gender` = '$gender', `Birthday` = '$birthday' WHERE `account`.`IdAccount` = '$userId' AND `account`.`Email` = '$oldEmail' ";
            $result = $this->db->update($query);
        } else {
            $query = "UPDATE `account` SET `Username` = '$userName', `Gender` = '$gender', `Birthday` = '$birthday', `Img` = '$img' WHERE `account`.`IdAccount` = '$userId' AND `account`.`Email` = '$oldEmail' ";
            $result = $this->db->update($query);
        }
        if ($result) {
            $alert = "<span style='color: #00CC00;'>Cập nhật tài khoản thành công</span>";
            Session::set('Username', $userName);
            Session::set('Gender', $gender);
            Session::set('Birthday', $birthday);
            Session::set('img', $img);
            return $alert;
        } else {
            $alert = "<span style='color: red;'>Cập nhật tài khoản thất bại!!!</span>";
            return $alert;
        }
    }

    public function get_accountByID()
    {
        $id = Session::get('userId');
        $query = "SELECT * FROM `account`  where IdAccount= '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
}
