<?php
include '../../lib/config.php';
?>

<?php
$host   = DB_HOST;
$user   = DB_USER;
$pass   = DB_PASS;
$dbname = DB_NAME;
$conn =  mysqli_connect($host, $user, $pass, $dbname);

$data = $_GET["chon"];
// $data = filter_input(INPUT_POST, 'chon');
if ($data != '')
    $sql = "SELECT * FROM `order` o JOIN `account` a ON o.IdAccount = a.IdAccount WHERE StatusOrder = '$data'";
else
    $sql =  "SELECT * FROM `order` o JOIN `account` a ON o.IdAccount = a.IdAccount";
$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query);
if ($num > 0) {
    while ($row = mysqli_fetch_array($query)) {
?>
            <tr>
                <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $row['IdOrder'] ?></td>
                <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $row['Username'] ?></td>
                <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $row['Total'] ?></td>
                <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $row['AddressOrder'] ?></td>
                <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $row['PhoneOrder'] ?></td>
                <td style='font-size:1.4rem; color: var(--text-color)'><?php echo $row['DateOrder'] ?></td>
                <td style='font-size:1.4rem; color: var(--text-color)'>
                    <?php
                    if ($row['StatusOrder'] == 1)
                        echo 'Chưa duyệt';
                    else if ($row['StatusOrder'] == 2)
                        echo 'Đang giao';
                    else if ($row['StatusOrder'] == 3)
                        echo 'Giao thành công';
                    else if ($row['StatusOrder'] == 4)
                        echo 'Đã hủy';
                    ?>
                </td>
                <td>
                    <a href="EditOrder.php?orderId=<?php echo $row['IdOrder'] ?>" title="Xem chi tiết" class="icon"><i class='action__icon--eye bx bx-low-vision'></i></a>
                    <a href="?delete=<?php echo $row['IdOrder'] ?>" onClick="return confirm('Bạn có muốn xóa không?')" title="Xóa" class="icon"><i class='action__icon--delete bx bxs-trash'></i></a>
                </td>
            </tr>
<?php
    }
}
?>