<?php
    include_once '../../lib/database.php';
    include_once '../../helpers/format.php';
?>

<?php
    class feedback
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        // public function get_countFeedback($id)
        // {
        //     $query = "SELECT COUNT(IdProduct) FROM `feedback` WHERE IdProduct = '$id'";
        //     $result = $this->db->select($query);
        //     return $result;
        // }

        public function get_totalCommentsByIdAccount($id)
        {
            $query = "SELECT COUNT(IdAccount) FROM `feedback` WHERE IdAccount = '$id'";
            $result = $this->db->select($query);
            foreach($result as $data){
                $count = $data['COUNT(IdAccount)'];
            }
            return $count;
        }

        public function get_feedbackByIdProduct($id)
        {
            $query = "SELECT * FROM `feedback` f JOIN `account` a ON f.IdAccount = a.IdAccount WHERE IdProduct = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function quantity_feedback($id)
        {
            $query = "SELECT * FROM `feedback` WHERE IdProduct = '$id' ";
            $result = $this->db->select($query);
            $rows = mysqli_num_rows($result);
            return $rows;
        }

        public function get_totalRate($id)
        {
            $query = "SELECT * FROM `feedback` f JOIN `account` a ON f.IdAccount = a.IdAccount WHERE IdProduct = '$id' ";
            $result = $this->db->select($query);
            $sum = 0;
            if($result){
                foreach($result as $data){
                    $sum += $data['Rate'];
                }
            }
            $quantity_feedback = $this->quantity_feedback($id);
            return round($sum/$quantity_feedback, 1);
        }

        public function get_feedbackRate($id)
        {
            $query = "SELECT * FROM `feedback` f JOIN `account` a ON f.IdAccount = a.IdAccount WHERE IdProduct = '$id' ";
            $result = $this->db->select($query);
            $five = 0;
            $four = 0;
            $three = 0;
            $two = 0;
            $one = 0;
            if($result){
                foreach($result as $data){
                    if($data['Rate']==5)
                        $five++;
                    else if($data['Rate']==4)
                        $four++;
                    else if($data['Rate']==3)
                        $three++;
                    else if($data['Rate']==2)
                        $two++;
                    else if($data['Rate']==1)
                        $one++;
                }
            }
            $array = array(
                'five' => $five,
                'four' => $four,
                'three' => $three,
                'two' => $two,
                'one' => $one,
            );
            return $array;
        }

    }
?>