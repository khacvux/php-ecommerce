<?php
require "../../lib/PHPMailer-master/src/PHPMailer.php";
require "../../lib/PHPMailer-master/src/SMTP.php";
require '../../lib/PHPMailer-master/src/Exception.php';
?>

<?php
class Email
{

    public function __construct()
    {
    }

    public function sendEmail($data, $files)
    {
        $recipients =$data['email'];
        $title =$data['title'];
        $editor = $data['editor1'];

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->CharSet  = "utf-8";
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $nguoigui = 'tuanle37372000@gmail.com';
            $matkhau = 'tuanhoa373737';
            $tennguoigui = 'Lê Tuấn';
            $mail->Username = $nguoigui;
            $mail->Password = $matkhau;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom($nguoigui, $tennguoigui);
            $to_name = "Tuấn Lê";
            $email_array = explode(",", $recipients);
            foreach ($email_array as $email) {
                $to      =  $email;
                $mail->addAddress($to, $to_name);
            }

            // $mail->addAddress($to, $to_name); 
            $mail->isHTML(true);
            $mail->Subject = $title;
            $noidungthu = ' <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><b>Xin chào ' . $to_name . '</b></h5>
                                <h6 class="card-subtitle mb-2 text-muted"></h6>
                                <p class="card-text">' . $editor. '</p>
                            </div>
                            </div> ';
            $mail->Body =  $noidungthu;
            if (isset($_FILES['file']['name'])) {
                $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['file']['name']));
                if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
                    $mail->addAttachment($uploadfile, $_FILES['file']['name']);
            }
            $mail->smtpConnect(array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
            if ($mail->send()) {
                $alert = "<span style='color: #00CC00; font-size: 1.4rem;'>Gửi thành công</span>";
                return $alert;
            } else{
                $alert = "<span style='color: red; font-size: 1.4rem;'>Gửi thất bại</span>";
                return $alert;
            }
        } catch (Exception $e) {
            echo "Mail can't be sent. Error:", $mail->ErrorInfo;
        }
    }
}
?>