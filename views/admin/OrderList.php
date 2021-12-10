<?php
include '../../Classes/admin/order.php';
?>

<?php
$order = new order();

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $deleteSupplier = $supplier->delete_supplier($id);
}
?>

<?php
include '../../inc/admin/header.php';
?>

<body>
  <?php
  include '../../inc/admin/sidebar.php';
  ?>
  <div class="container">
    <div class="grid">
      <div class="OrderList-wrap">
        <div class="row m-gutter">
          <div class="col l-12 m-12 c-12">
            <div class="OrderList">
              <div class="OrderList-heading">
                <h4 class="OrderList-heading__title">
                  Danh sách đơn hàng
                </h4>
                <div class="OrderList-heading-action">
                  <select id="chon" onChange="ajax();" class="OrderList-heading-action__select">
                    <option value="">Tất cả</option>
                    <option value="1">Chưa duyệt</option>
                    <option value="2">Đang giao</option>
                    <option value="4">Đã hủy</option>
                    <option value="3">Hoàn thành</option>
                  </select>
                  <button class="btn--delete">
                    <i class='bx bx-minus-circle'></i>
                    Xóa
                  </button>
                  <script>
                    function ajax() {
                      var obj = document.getElementById("OrderList");
                      // obj.style.display = "block";
                      value = document.getElementById("chon").value;
                      var xml = new XMLHttpRequest();

                      xml.onreadystatechange = function() {
                        if (xml.readyState == 4)
                          obj.innerHTML = xml.responseText;
                      }
                      url = '../../Classes/admin/OrderDetail.php?chon=' + value;
                      xml.open('GET', url, false);
                      xml.send();
                    }
                  </script>
                </div>
              </div>
              <div class="OrderList-body">
                <!-- <div class="productList__body-heading">
                  <div class="productList__body-length">
                    Hiển thị
                    <input class="productList__body-length-input" type="number" min="5" step="5" value="5" max="20">
                    mục
                  </div>
                  <div class="productList__body-search">
                    <input type="text" class="productList__body-search-input" placeholder="Tìm kiếm">
                  </div>
                </div>
                <div class="OrderList-content">
                  <div class="OrderList-content-row">
                    <div class="OrderList-content-row-check">
                      <input type="checkbox" onClick="toggle(this)" name="check" id="">
                    </div>
                    <div class="OrderList-content-row__td">
                      <span class="span-heading">Tên khách hàng</span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span class="span-heading">Tổng tiền</span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span class="span-heading">Địa chỉ</span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span class="span-heading">Số điện thoại</span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span class="span-heading">Ngày đặt</span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span class="span-heading">Trạng thái</span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span class="span-heading">Hoạt động</span>
                    </div>
                  </div>
                  <div class="OrderList-content-row">
                    <div class="OrderList-content-row-check">
                      <input type="checkbox" name="check" id="" class="OrderList-content-row-checkbox">
                    </div>
                    <div class="OrderList-content-row__td">
                      <span>Nguyễn Khắc Vũ</span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span>6,900,000VNĐ</span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span>Xóm 1, xã Hưng Xá, huyện Hưng Nguyên, tỉnh Nghệ An</span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span>0123456789</span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span>2020-10-22 08:05:50</span>
                    </div>
                    <div class="OrderList-content-row__td">
                      <span>Đang xử lí</span>
                    </div>
                    <div class="body-action">
                      <a href="#" title="Xem chi tiết" class="icon"><i class='action__icon--eye js-action__icon--eye bx bx-low-vision'></i></a>
                      <a href="" title="Xóa" class="icon"><i class='action__icon--delete bx bxs-trash'></i></a>
                    </div>
                  </div>
                </div>
                <ul class="pagination">
                  <li class="pagination-item">
                    <i class='bx bx-chevron-left'></i>
                  </li>
                  <li class="pagination-item">
                    <a href="" class="pagination--active">1</a>
                  </li>
                  <li class="pagination-item">
                    <i class='bx bx-chevron-right'></i>
                  </li>
                </ul> -->

                <table id="table_id" class="table-bordered display" style="width:100%">
                  <thead>
                    <tr>
                      <td style='font-weight: 500; font-size:1.6rem'>ID</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Tên khách hàng</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Tổng tiền</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Địa chỉ</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Số điện thoại</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Thời gian</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Trạng thái</td>
                      <td style='font-weight: 500; font-size:1.6rem'>Hoạt động</td>
                    </tr>
                  </thead>
                  <tbody id='OrderList'>
                    <?php
                    $show_order = $order->get_order();
                    if ($show_order) {
                      foreach ($show_order as $result) {
                    ?>
                        <tr>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $result['IdOrder'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $result['Username'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $result['Total'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $result['AddressOrder'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $result['PhoneOrder'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $result['DateOrder'] ?></td>
                          <td style='font-size:1.4rem; color: var(--text-color)'>
                            <?php
                            if ($result['StatusOrder'] == 1)
                              echo 'Chưa duyệt';
                            else if ($result['StatusOrder'] == 2)
                              echo 'Đang giao';
                            else if ($result['StatusOrder'] == 3)
                              echo 'Giao thành công';
                            else if ($result['StatusOrder'] == 4)
                              echo 'Đã hủy';
                            ?>
                          </td>
                          <td>
                            <a href="EditOrder.php?orderId=<?php echo $result['IdOrder'] ?>" title="Xem chi tiết" class="icon"><i class='action__icon--eye bx bx-low-vision'></i></a>
                            <a href="?delete=<?php echo $result['IdOrder'] ?>" onClick="return confirm('Bạn có muốn xóa không?')" title="Xóa" class="icon"><i class='action__icon--delete bx bxs-trash'></i></a>
                          </td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
    include '../../inc/admin/footer.php';
    ?>

  <!-- <script>
    $(function() {
      $("button").click(function() {
        var id = $(this).text();
      });

    });
  </script> -->

  <script src="../../public/admin/js/script.js"></script>
  <!-- <script src="../../public/admin/js/orderList.js"></script> -->
  <script>
    $(document).ready(function() {
      $('#table_id').DataTable({
        "pageLength": 10,
        "lengthMenu": [10, 15, 20, 30]
      });
    });
  </script>

</body>

</html>