<?php
include('../../connet/connet.php');

if (isset($_GET['code'])) {
    $ma_cart = $_GET['code'];

    // Lấy trạng thái hiện tại của đơn hàng
    $sql_get_status = "SELECT trangthai FROM tbl_cart WHERE ma_cart = '" . $ma_cart . "'";
    $query_get_status = mysqli_query($mysqli, $sql_get_status);
    $row = mysqli_fetch_array($query_get_status);

    // Tăng trạng thái nếu nhỏ hơn 2 (đang giao)
    if ($row['trangthai'] < 3) {
        $new_status = $row['trangthai'] + 1;

        // Cập nhật trạng thái mới vào cơ sở dữ liệu
        $sql_update = "UPDATE tbl_cart SET trangthai = '" . $new_status . "' WHERE ma_cart = '" . $ma_cart . "'";
        mysqli_query($mysqli, $sql_update);
    }

    // Chuyển hướng trở lại trang liệt kê đơn hàng
    header('Location: ../../index.php?action=quanlydonhang&query=lietke');
}
?>
