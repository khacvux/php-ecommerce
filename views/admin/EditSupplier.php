<?php
  include '../../Classes/admin/supplier.php';
?>

<?php
include '../../inc/admin/header.php';
?>

<body>
  <?php
    include '../../inc/admin/sidebar.php';
  ?>
  <?php 
    $supplier= new Supplier();
    if(!isset($_GET['supplierId']) || $_GET['supplierId'] == NULL)
      echo "<script>window.location = 'Supplier.php'</script> ";
    else
      $id = filter_input(INPUT_GET, 'supplierId');

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $nameSupplier = filter_input(INPUT_POST, 'nameProduct');
      $addressSupplier = filter_input(INPUT_POST, 'addressProduct');
      $linkWeb = filter_input(INPUT_POST, 'linkWeb');
      $width = 200;
      $height = 200;
      if(isset($linkWeb)){
        $url = "https://chart.googleapis.com/chart?cht=qr&chs={$width}x{$height}&chl={$linkWeb}";
        $updateSupplier = $supplier->update_supplier($nameSupplier, $addressSupplier, $linkWeb, $url, $id);
      }
    }
  ?>

  <div class="container">
    <div class="grid">
        <div class="row no-gutters">
            <div class="col l-o-3 l-6 m-12 c-12">
                <div class="editForm">
                  <div class="modal-container__heading">
                    <h4 class="modal-container-category__heading-title">
                      Sửa thông tin nhà cung cấp
                    </h4>
                  </div>
                  <?php
                    $get_supplier_name = $supplier->get_supplierById($id);
                    if($get_supplier_name)
                    {
                      foreach($get_supplier_name as $data)
                      {
                  ?>
                  <form action="" method="post">
                    <div class="modal-container-category__body">
                      <div class="modal-container__body-wrap">
                          <label for="idProduct" class="modal-container__body-span" >ID:</label>
                          <input value="<?php echo $data['IdSupplier'] ?> " id="idProduct" name="idProduct" type="text" class="modal-container__body-input" disabled>
                        </div>
                      <div class="modal-container__body-wrap">
                        <label for="nameProduct" class="modal-container__body-span" >Tên nhà cung cấp:</label>
                        <input value="<?php echo $data['NameSupplier'] ?>" id="nameProduct"  name="nameProduct" type="text" class="modal-container__body-input">
                      </div>
                      <div class="modal-container__body-wrap">
                          <label for="addressProduct" class="modal-container__body-span" >Địa chỉ:</label>
                          <input value="<?php echo $data['AddressSupplier'] ?>" id="addressProduct"  name="addressProduct" type="text" class="modal-container__body-input">
                      </div>
                      <div class="modal-container__body-wrap">
                          <label for="linkWeb" class="modal-container__body-span" >Website:</label>
                          <input value="<?php echo $data['linkWebsite'] ?>" id="linkWeb"  name="linkWeb" type="text" class="modal-container__body-input">
                      </div>
                      <div class="modal-container__body-wrap">
                      <?php 
                        if(isset($updateSupplier))
                        {
                          echo $updateSupplier;
                        }
                      ?>
                      </div>
                      <div class="modal-container__body-action">
                        <a href="Supplier.php" class="btn btn--close">
                          Trở về
                        </a>
                        <input type="submit" value="Sửa" class="btn btn--primary"/>
                      </div>
                    </div>
                  </form>
                  <?php
                      }
                    }
                  ?>
                </div>
            </div>
        </div>
    </div>
  </div>
  <?php
    include '../../inc/admin/footer.php';
    ?>

  <script src="../../public/admin/js/script.js"></script>

</body>
</html>
