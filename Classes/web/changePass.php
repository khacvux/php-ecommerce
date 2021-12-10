<?php
    include '../../lib/session.php';
    Session::checkSessionUser();
    include '../../lib/database.php';
    include '../../helpers/format.php';

    class userChangePass{
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function user_changePass($conf_oldPass, $newPass, $conf_newPass){
            $newPass = $this->fm->validation($newPass);
            $conf_oldPass = $this->fm->validation($conf_oldPass);

            $newPass = mysqli_real_escape_string($this->db->link, $newPass);
            $conf_oldPass = mysqli_real_escape_string($this->db->link, $conf_oldPass);

            $oldPass = Session::get('Pass');
            $userId = Session::get('userId');
            $user_email = Session::get('userEmail');



            if($conf_oldPass != $oldPass){
                $alert = "Mật khẩu hiện tại không đúng!";
                return $alert;
            }
            elseif($conf_newPass != $newPass){
                $alert = "Nhập lại mật khẩu không đúng!";
                return $alert;
            }
            elseif($conf_newPass == $oldPass){
                $alert = "Hãy sử dụng mật khẩu mới!";
                return $alert;
            }
            else{
                $query = "UPDATE `account` 
                    SET `Pass` = '$newPass' 
                    WHERE `account`.`IdAccount` = $userId 
                    AND `account`.`Email` = '$user_email';";
                $result = $this->db->update($query);

                if($result == true){                
                    $alert = '<p style="color: green">Đổi mật khẩu thành công</p>';
                    return $alert;

                    unset($oldPass);
                    Session::set('Pass', $newPass);
                }
            }
        }
    }



?>

