<?php
// Kiểm tra nếu người dùng đã đăng nhập
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('../admincp/connet/connet.php');

// Lấy ID người dùng từ phiên đăng nhập
if (isset($_SESSION['id_user'])) {
    $id_khachhang = $_SESSION['id_user'];


// Lấy các đơn hàng có trạng thái 0 cho người dùng hiện tại
$sql_donhang = "SELECT * FROM tbl_cart WHERE trangthai = 0 AND id_khachhang = '$id_khachhang'";
$query_donhang = mysqli_query($mysqli, $sql_donhang);
?>

<p>Chi tiết sản phẩm trong đơn hàng đang chờ xử lý:</p>

<table style="width:100%; text-align: center; border-collapse:collapse;" border="1">
    <tr>
        <th>Mã Đơn Hàng</th>
        <th>Tên Sản Phẩm</th>
        <th>Số Lượng</th>
        <th>Giá</th>
        <th>Tổng</th>
        <th>Quản lý</th> <!-- Thêm cột Quản lý -->
    </tr>

    <?php
    if (mysqli_num_rows($query_donhang) > 0) {
        while ($row_donhang = mysqli_fetch_array($query_donhang)) {
            $ma_cart = $row_donhang['ma_cart'];
            
            // Truy vấn chi tiết sản phẩm của đơn hàng
            $sql_chitiet = "SELECT tbl_cart_detail.*, tbl_sanpham.tensanpham, tbl_sanpham.gia 
                            FROM tbl_cart_detail 
                            JOIN tbl_sanpham ON tbl_cart_detail.id_sanpham = tbl_sanpham.id_sanpham 
                            WHERE tbl_cart_detail.ma_cart = '$ma_cart'";
            $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
            
            while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
                $tong = $row_chitiet['soluongmua'] * $row_chitiet['gia'];
                ?>
                <tr>
                    <td><?php echo $ma_cart; ?></td>
                    <td><?php echo htmlspecialchars($row_chitiet['tensanpham']); ?></td>
                    <td><?php echo $row_chitiet['soluongmua']; ?></td>
                    <td><?php echo number_format($row_chitiet['gia']) . ' VND'; ?></td>
                    <td><?php echo number_format($tong) . ' VND'; ?></td>
                    <td>
                        <a href="main/huydon.php?code=<?php echo $ma_cart; ?>" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?');">Hủy Đơn</a>
                    </td>
                </tr>
                <?php
            }
        }
    } else {
        echo "<tr><td colspan='7'>Bạn chưa có đơn hàng nào đang chờ xử lý.</td></tr>";
    }
}else {
    echo 'ban can dang nhap de xem chi tiet don hang';
}
    ?>
</table>
