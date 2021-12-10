<?php
    include '../../lib/session.php';
    Session::checkLogin();
    include '../../lib/database.php';
    include '../../helpers/format.php';
?>

<?php
    class adminLogin
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function login_admin($admin_email, $admin_pass)
        {
            $admin_email = $this->fm->validation($admin_email);
            $admin_pass = $this->fm->validation($admin_pass);

            $admin_email = mysqli_real_escape_string($this->db->link, $admin_email);
            $admin_pass = mysqli_real_escape_string($this->db->link, $admin_pass);

            if(empty($admin_email) || empty($admin_pass)){
                $alert = "Tài khoản và mật khẩu không được trống";
                return $alert;
            }
            else
            {
                $query = "SELECT * FROM `account` WHERE Email = '$admin_email' AND Pass = '$admin_pass' ";
                $result = $this->db->select($query);

                if($result != false)
                {
                    $value = $result->fetch_assoc();
                    if($value['RoleAcc'] == 0){
                        $alert = "Không có tài khoản!";
                        return $alert;
                    } else{
                        Session::set('adminLogin', true);
                        Session::set('adminId', $value['IdAccount']);
                        Session::set('admin_email', $value['Email']);
                        Session::set('img', $value['Img']);
                        Session::set('role', $value['RoleAcc']);
                        Session::set('adminUser', $value['Username']);
                        header('Location:index.php');
                    }
                }
                else
                {
                    $alert ="Tài khoản hoặc mật khẩu không chính xác";
                    return $alert;
                }
            }
        }

    }
?>