<?php
include_once '../../lib/database.php';
include_once '../../helpers/format.php';
?>

<?php
class website
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    // Get Info website
    public function get_web()
    {
        $query = "SELECT * FROM infoweb";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_img_product()
    {
        $query = "SELECT * FROM `product` LIMIT 8";
        $result = $this->db->select($query);
        return $result;
    }


    public function get_img($title)
    {
        $query = "SELECT * FROM imglandingpage where title='$title'";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_imgById($id)
    {
        $query = "SELECT * FROM `imglandingpage` WHERE IdImg = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
}
?>