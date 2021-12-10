<?php
    include '../../lib/session.php';
    Session::checkLoginUser();
    include '../../lib/database.php';
    include '../../helpers/format.php';
?>

<?php
    class userLogin
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function login_user($user_email, $user_pass)
        {
            $user_email = $this->fm->validation($user_email);
            $user_pass = $this->fm->validation($user_pass);

            $user_email = mysqli_real_escape_string($this->db->link, $user_email);
            $user_pass = mysqli_real_escape_string($this->db->link, $user_pass);

            if(empty($user_email) || empty($user_pass)){
                $alert = "Tài khoản và mật khẩu không được trống";
                return $alert;
            }
            else
            {
                $query = "SELECT * FROM `account` WHERE Email = '$user_email' AND Pass = '$user_pass' ";
                $result = $this->db->select($query);

                if($result != false)
                {
                    $value = $result->fetch_assoc();
                    if($value['RoleAcc'] == 1){
                        $alert = "Không có tài khoản!";
                        return $alert;
                    }
                    else{
                        Session::set('userLogin', true);
                        Session::set('userId', $value['IdAccount']);
                        Session::set('userEmail', $value['Email']);
                        Session::set('img', $value['Img']);
                        Session::set('role', $value['Role']);
                        Session::set('Username', $value['Username']);
                        Session::set('Pass', $value['Pass']);
                        Session::set('numberPhone', $value['Phone']);
                        Session::set('Gender', $value['Gender']);
                        Session::set('Birthday', $value['BirthDay']);

                        header('Location:product.php');
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