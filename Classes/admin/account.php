<?php
include '../../lib/session.php';
include_once '../../lib/database.php';
include_once '../../helpers/format.php';
?>

<?php
class account
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

    public function checkAccount($email)
    {
        $query = "SELECT * FROM `account` where Email= '$email'";
        $result = $this->db->select($query);
        return $result;
    }

    public function checkPassword($id, $oldPass)
    {
        $query = "SELECT * FROM `account` where idAccount= '$id' AND Pass='$oldPass' ";
        $result = $this->db->select($query);
        if ($result != false) {
            $value = $result->fetch_assoc();
            return $value['Pass'];
        }
    }

    public function insert_account($email, $pass, $role)
    {
        $email = $this->fm->validation($email);
        $pass = $this->fm->validation($pass);

        $email = mysqli_real_escape_string($this->db->link, $email);
        $pass = mysqli_real_escape_string($this->db->link, md5($pass));
        $role = mysqli_real_escape_string($this->db->link, $role);

        if (empty($email) || empty($pass)) {
            echo '<script language="javascript"> alert ("Không được để trống");</script> ';
        } else {
            $query = "INSERT INTO `account` (Email, Pass, RoleAcc) VALUES ('$email', '$pass', $role)";
            $result = $this->db->insert($query);

            if ($result)
                echo '<script language="javascript"> alert ("Thêm tài khoản thành công");</script> ';
            else
                echo '<script language="javascript"> alert ("Thêm tài khoản thất bại!!!");</script> ';
        }
    }

    public function updateAccount($data, $files, $idAccount)
    {
        // $idAccount = mysqli_real_escape_string($this->db->link, $data['idAccount']);
        $fullName = mysqli_real_escape_string($this->db->link, $data['fullName']);
        $phoneNumber = mysqli_real_escape_string($this->db->link, $data['phoneNumber']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $birthday = mysqli_real_escape_string($this->db->link, $data['birthday']);
        $gender = mysqli_real_escape_string($this->db->link, $data['gender']);

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

        try {
            if ($img == "") {
                $query = "UPDATE `account` SET Username='$fullName', PhoneNumber = '$phoneNumber', Gender='$gender', BirthDay = '$birthday', AddressAcc='$address' WHERE IdAccount = '$idAccount' ";
                $result = $this->db->update($query);
            } else {
                $query = "UPDATE `account` SET Username='$fullName', PhoneNumber = '$phoneNumber', Gender='$gender', BirthDay = '$birthday', AddressAcc='$address', Img='$img'  WHERE IdAccount = '$idAccount' ";
                $result = $this->db->update($query);
            }

            if ($result) {
                $alert = "<span style='color: #00CC00;'>Cập nhật tài khoản thành công</span>";
                Session::set('adminUser', $fullName);
                Session::set('img', $img);
                return $alert;
            } else {
                $alert = "<span style='color: red;'>Cập nhật tài khoản thất bại!!!</span>";
                return $alert;
            }
        } catch (Exception $e) {
        }
    }

    public function get_account()
    {
        $query = "SELECT * FROM `account`";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_account_customer()
    {
        $query = "SELECT * FROM `account` WHERE RoleAcc = '0' ORDER BY IdAccount DESC LIMIT 8";
        $result = $this->db->select($query);
        return $result;
    }

    public function quantity_account()
    {
        $query = "SELECT * FROM `account`";
        $result = $this->db->select($query);
        $rows = mysqli_num_rows($result);
        return $rows;
    }

    public function get_accountByID($id)
    {
        $query = "SELECT * FROM `account`  where IdAccount= '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function changePass($newPass, $id)
    {
        $newPass = $this->fm->validation($newPass);
        $newPass = mysqli_real_escape_string($this->db->link, $newPass);

        $query = "UPDATE `account` SET Pass='$newPass'  WHERE IdAccount = '$id' ";
        $result = $this->db->update($query);
        if ($result)
            echo '<script language="javascript"> alert ("Đổi mật khẩu thành công");</script> ';
        else
            echo '<script language="javascript"> alert ("Đổi mật khẩu thất bại!!!");</script> ';
    }

    public function delete_account($id)
    {
        $query = "DELETE FROM account WHERE IdAccount = '$id' ";
        $result = $this->db->delete($query);
        if ($result)
            echo '<script language="javascript"> alert ("Xóa tài khoản thành công");</script> ';
        else
            echo '<script language="javascript"> alert ("Xóa tài khoản thất bại!!!");</script> ';
    }
}
?>