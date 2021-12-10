<?php
include_once '../../lib/database.php';
include_once '../../helpers/format.php';
?>

<?php
class product
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

    public function insert_product($data, $files)
    {

        $name = mysqli_real_escape_string($this->db->link, $data['nameProduct']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $quantity = mysqli_real_escape_string($this->db->link, $data['quantity']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $sale = mysqli_real_escape_string($this->db->link, $data['sale']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $supplier = mysqli_real_escape_string($this->db->link, $data['supplier']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);
        $status = $data['checkStatus'];

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time =  date('Y-m-d H:i:s');

        $target_dir = "../../public/web/img/products/";
        //IMG1
        $Img1 = "";
        $div = explode('.', $_FILES["Img1"]["name"]);
        $file_ext = strtolower(end($div));
        $unique_file = $this->randomName() . '.' . $file_ext;
        $target_file = $target_dir . $unique_file;
        $status_upload = move_uploaded_file($_FILES["Img1"]["tmp_name"], $target_file);

        if ($status_upload) {
            $Img1 = $unique_file;
        }

        //IMG2
        $Img2 = "";
        $div = explode('.', $_FILES["Img2"]["name"]);
        $file_ext = strtolower(end($div));
        $unique_file = $this->randomName() . '.' . $file_ext;
        $target_file = $target_dir . $unique_file;
        $status_upload = move_uploaded_file($_FILES["Img2"]["tmp_name"], $target_file);

        if ($status_upload) {
            $Img2 = $unique_file;
        }

        //IMG3
        $Img3 = "";
        $div = explode('.', $_FILES["Img3"]["name"]);
        $file_ext = strtolower(end($div));
        $unique_file = $this->randomName() . '.' . $file_ext;
        $target_file = $target_dir . $unique_file;
        $status_upload = move_uploaded_file($_FILES["Img3"]["tmp_name"], $target_file);

        if ($status_upload) {
            $Img3 = $unique_file;
        }

        //IMG4
        $Img4 = "";
        $div = explode('.', $_FILES["Img4"]["name"]);
        $file_ext = strtolower(end($div));
        $unique_file = $this->randomName() . '.' . $file_ext;
        $target_file = $target_dir . $unique_file;
        $status_upload = move_uploaded_file($_FILES["Img4"]["tmp_name"], $target_file);

        if ($status_upload) {
            $Img4 = $unique_file;
        }

        //IMG5
        $Img5 = "";
        $div = explode('.', $_FILES["Img5"]["name"]);
        $file_ext = strtolower(end($div));
        $unique_file = $this->randomName() . '.' . $file_ext;
        $target_file = $target_dir . $unique_file;
        $status_upload = move_uploaded_file($_FILES["Img5"]["tmp_name"], $target_file);

        if ($status_upload) {
            $Img5 = $unique_file;
        }


        if ($name == '' || $price == '' || $quantity == '' || $type == '' || $category == '' || $supplier == '' || $description == '') {
            echo '<script language="javascript"> alert ("Không được để trống");</script> ';
        } else {
            $query = "INSERT INTO product(NameProduct, Price, QuantityProduct, ProductImg1, ProductImg2, ProductImg3, ProductImg4, ProductImg5, Descrip, IdSale, IdCategory, IdSupplier, IdType, StatusProduct, TimeAdd) VALUES ('$name', '$price', '$quantity', '$Img1', '$Img2', '$Img3', '$Img4', '$Img5', '$description', '$sale', '$category', '$supplier', '$type', '$status', '$time')";
            $result = $this->db->insert($query);

            if ($result)
                echo '<script language="javascript"> alert ("Thêm danh mục sản thành công");</script> ';
            else
                echo '<script language="javascript"> alert ("Thêm danh mục sản phẩm thất bại!!!");</script> ';
        }
    }

    public function update_product($data, $files, $id)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['nameProduct']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $quantity = mysqli_real_escape_string($this->db->link, $data['quantity']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $sale = mysqli_real_escape_string($this->db->link, $data['sale']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $supplier = mysqli_real_escape_string($this->db->link, $data['supplier']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);
        $status = $data['checkStatus'];

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time =  date('Y-m-d H:i:s');

        $target_dir = "../../public/web/img/products/";
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

        //IMG3
        $img3 = "";
        $div = explode('.', $_FILES["img3"]["name"]);
        $file_ext = strtolower(end($div));
        $unique_file = $this->randomName() . '.' . $file_ext;
        $target_file = $target_dir . $unique_file;
        $status_upload = move_uploaded_file($_FILES["img3"]["tmp_name"], $target_file);

        if ($status_upload) {
            $img3 = $unique_file;
        }

        //IMG4
        $img4 = "";
        $div = explode('.', $_FILES["img4"]["name"]);
        $file_ext = strtolower(end($div));
        $unique_file = $this->randomName() . '.' . $file_ext;
        $target_file = $target_dir . $unique_file;
        $status_upload = move_uploaded_file($_FILES["img4"]["tmp_name"], $target_file);

        if ($status_upload) {
            $img4 = $unique_file;
        }

        //IMG5
        $img5 = "";
        $div = explode('.', $_FILES["img5"]["name"]);
        $file_ext = strtolower(end($div));
        $unique_file = $this->randomName() . '.' . $file_ext;
        $target_file = $target_dir . $unique_file;
        $status_upload = move_uploaded_file($_FILES["img5"]["tmp_name"], $target_file);

        if ($status_upload) {
            $img5 = $unique_file;
        }

        $data= array(
            'NameProduct' => $name,
            'Price' =>    $price,
            'QuantityProduct' => $quantity,
            'ProductImg1'  =>   $img1,
            'ProductImg2' => $img2,
            'ProductImg3' => $img3,
            'ProductImg4' => $img4,
            'ProductImg5' => $img5,
            'Descrip' => $description,
            'IdSale' =>  $sale,
            'IdCategory' =>  $category,
            'IdSupplier' => $supplier,
            'IdType' =>  $type,
            'StatusProduct' => $status,
            'TimeAdd' => $time,
        );
        if ($img1 == "") {
            unset($data['ProductImg1']);
        }
        if ($img2 == "") {
            unset($data['ProductImg2']);
        }
        if ($img3 == "") {
            unset($data['ProductImg3']);
        }
        if ($img4 == "") {
            unset($data['ProductImg4']);
        }
        if ($img5 == "") {
            unset($data['ProductImg5']);
        }

        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");
        $query = "UPDATE `product` SET  $v   WHERE IdProduct = '$id'";
        $result = $this->db->update($query);
        if($result){
            $alert = "<span style='color: #00CC00;'>Cập nhật danh mục thành công</span>";
            return $alert;
        } else{
            $alert = "<span style='color: red;'>Cập nhật danh mục thất bại!!!</span>";
            return $alert;
        }
    }

    public function get_product()
    {
        $query = "SELECT * FROM `product` LIMIT 5";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_productById($id)
    {
        $query = "SELECT * FROM `product` WHERE IdProduct = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function quantity_Product()
    {
        $query = "SELECT * FROM `product`";
        $result = $this->db->select($query);
        $rows = mysqli_num_rows($result);
        return $rows;
    }

    public function get_page()
    {
        $total_product = $this->quantity_Product();
        $limit = 5;
        $totalPage = ceil($total_product / $limit);
        return $totalPage;
    }

    // public function get_bestsellerProduct()
    // {
    //     $query = "SELECT * FROM `product` p JOIN `category` c ON p.IdCategory = c.IdCategory LIMIT 8";
    //     $result = $this->db->select($query);
    //     return $result;
    // }

    public function get_bestsellerProduct()
    {
        $query = "SELECT COUNT(IdProduct), IdProduct FROM `orderdetail` GROUP BY IdProduct ORDER BY COUNT(IdProduct) DESC LIMIT 8";
        $result = $this->db->select($query);
        if($result){
            foreach($result as $data){
                $sql = "SELECT * FROM `product` p JOIN `category` c ON p.IdCategory = c.IdCategory WHERE IdProduct =  ". $data['IdProduct'] ."  ";
                $resultData = $this->db->select($sql);
                if($resultData){
                    $listTop[$data['IdProduct']] = array(
                        'listTop' =>  $resultData
                    );
                }   
            }
        }
  
        if($result == true){
            return array(
                'listTop' => $result,
                'listDetailTop' => $listTop,
            );
        } 
    }

    public function delete_product($id)
    {
        $query = "DELETE FROM product WHERE IdProduct = '$id' ";
        $result = $this->db->delete($query);
        if ($result)
            echo '<script language="javascript"> alert ("Xóa danh mục sản phẩm thành công");</script> ';
        else
            echo '<script language="javascript"> alert ("Xóa danh mục sản phẩm thất bại!!!");</script> ';
    }
}
?>