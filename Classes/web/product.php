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

    public function get_product()
    {
        $query = "SELECT * FROM `product` p JOIN `supplier` s ON p.IdSupplier = s.IdSupplier JOIN `sale` g ON p.IdSale = g.IdSale ORDER BY `IdProduct` ASC LIMIT 0, 5";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_product_Limit6()
    {
        $limit = 6;
        $quantityProduct = $this->quantity_Product();
        $from = mt_rand(0, $quantityProduct-$limit);
        $query = "SELECT * FROM `product` p JOIN supplier s ON p.IdSupplier = s.IdSupplier JOIN `sale` g ON p.IdSale = g.IdSale ORDER BY `IdProduct` ASC LIMIT $from, $limit";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_productById($id)
    {
        $query = "SELECT * FROM product  p JOIN supplier s ON p.IdSupplier = s.IdSupplier JOIN `sale` g ON p.IdSale = g.IdSale WHERE IdProduct = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_productByIdCategory($idCategory)
    {
        $query = "SELECT * FROM product  p JOIN supplier s ON p.IdSupplier = s.IdSupplier JOIN `sale` g ON p.IdSale = g.IdSale WHERE IdCategory = '$idCategory' LIMIT 5";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_topProduct()
    {
        $query = "SELECT COUNT(IdProduct), IdProduct FROM `orderdetail` GROUP BY IdProduct ORDER BY COUNT(IdProduct) DESC LIMIT 4";
        $result = $this->db->select($query);
        if($result){
            foreach($result as $data){
                $sql = "SELECT * FROM `product` p JOIN `supplier` s ON p.IdSupplier = s.IdSupplier JOIN `sale` g ON p.IdSale = g.IdSale WHERE IdProduct =  ". $data['IdProduct'] ."  ";
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

    public function get_listProductByCategory($idCategory)
    {
        $query = "SELECT * FROM `product` p JOIN supplier s ON p.IdSupplier = s.IdSupplier JOIN `sale` g ON p.IdSale = g.IdSale WHERE `idCategory` = '$idCategory'";
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

    public function total_page()
    {
        $quantityProduct = $this->quantity_Product();
        $limit = 5;
        $totalPage = ceil($quantityProduct / $limit);
        return $totalPage;
    }

    public function ajaxPaging($page)
    {   
        $totalPage = $this->total_page();
        $limit = 5;
        if($page <= $totalPage){
            $from = ($page - 1) * $limit+5; 
            $query = "SELECT * FROM `product` p JOIN supplier s ON p.IdSupplier = s.IdSupplier  JOIN `sale` g ON p.IdSale = g.IdSale
                ORDER BY `IdProduct` ASC LIMIT $from, $limit";
            $result = $this->db->select($query);
            return $result;
        }
    }

    public function ajaxSearch($input){
        $query = "SELECT * 
            FROM `product` p 
            JOIN supplier s 
            ON p.IdSupplier = s.IdSupplier 
            JOIN `sale` g ON p.IdSale = g.IdSale
            WHERE `NameProduct` 
            LIKE '". $input ."%'
        ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getProduct_by_price($option)
    {
        if($option == 'ASC')
            $query = "SELECT * FROM `product` p JOIN supplier s ON p.IdSupplier = s.IdSupplier JOIN `sale` g ON p.IdSale = g.IdSale ORDER BY Price ASC";
        else if($option == 'DESC')
            $query = "SELECT * FROM `product` p JOIN supplier s ON p.IdSupplier = s.IdSupplier  JOIN `sale` g ON p.IdSale = g.IdSale ORDER BY Price DESC";
        $result = $this->db->select($query);
        return $result;
    }



    // public function get_CategoryById($id)
    // {
    //     $query = "SELECT IdCategory FROM product WHERE IdProduct = '$id' ";
    //     $result = $this->db->select($query);
    //     return $result;
    // }


}
?>