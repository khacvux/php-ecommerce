<?php
    include '../../lib/session.php';
    Session::checkLoginUser();
    include '../../lib/database.php';
    include '../../helpers/format.php';
?>

<?php
    class userRegister
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function checkAccount($email)
        {
            $query = "SELECT * FROM `account` where Email= '$email'";
            $result = $this->db->select($query);
            return $result;
        }

        public function user_Register($new_email, $create_pass, $conf_pass)
        {
            $new_email = $this->fm->validation($new_email);
            $create_pass = $this->fm->validation($create_pass);
            $conf_pass = $this->fm->validation($conf_pass);

            $new_email = mysqli_real_escape_string($this->db->link, $new_email);
            $create_pass = mysqli_real_escape_string($this->db->link, $create_pass);
            $conf_pass = mysqli_real_escape_string($this->db->link, $conf_pass);

            if(empty($new_email) || empty($create_pass) || empty($conf_pass)){
                $alert = "Tài khoản và mật khẩu không được trống";
                return $alert;
            }
            else
            {
                
                $query = "INSERT INTO `account` (`Email`, `Pass`, `Gender`,`RoleAcc`) 
                VALUES ('$new_email', '$create_pass','1' ,'0');";
                $result = $this->db->insert($query);
                if($result){
                    header('Location:login.php'); 
                }
                else{
                    $alert = "Đăng kí thất bại";
                    return $alert;
                }
                
                            
            }
        }

    }
?>