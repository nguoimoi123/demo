<?php
include('../../admincp/connet/connet.php');
session_start();

// Kiểm tra nếu mã đơn hàng được truyền vào
if (isset($_GET['code']) && !empty($_GET['code'])) {
    $ma_cart = mysqli_real_escape_string($mysqli, $_GET['code']); // Bảo mật tham số

    // Lấy thông tin chi tiết đơn hàng
    $sql_get_details = "SELECT id_sanpham, soluongmua FROM tbl_cart_detail WHERE ma_cart = '$ma_cart'";
    $query_details = mysqli_query($mysqli, $sql_get_details);

    if ($query_details) {
        while ($row = mysqli_fetch_assoc($query_details)) {
            $id_sanpham = $row['id_sanpham'];
            $soluongmua = $row['soluongmua'];

            // Cập nhật số lượng trong bảng sản phẩm
            $sql_update_quantity = "UPDATE tbl_sanpham SET soluong = soluong + $soluongmua WHERE id_sanpham = '$id_sanpham'";
            mysqli_query($mysqli, $sql_update_quantity);
        }

        // Cập nhật trạng thái đơn hàng thành 4 (đơn hàng đã hủy)
        $sql_update = "UPDATE tbl_cart SET trangthai = 4 WHERE ma_cart = '$ma_cart'";
        $query_update = mysqli_query($mysqli, $sql_update);

        // Kiểm tra xem câu truy vấn có thành công không
        if ($query_update) {
            $_SESSION['message'] = "Đơn hàng đã được hủy thành công và số lượng sản phẩm đã được cập nhật.";
        } else {
            $_SESSION['message'] = "Hủy đơn hàng thất bại: " . mysqli_error($mysqli);
        }
    } else {
        $_SESSION['message'] = "Không thể lấy thông tin chi tiết đơn hàng: " . mysqli_error($mysqli);
    }

    // Chuyển hướng trở lại trang liệt kê đơn hàng
    header('Location: ../indexpage.php?quanly=dahuy');
    exit(); // Dừng thực thi để tránh in thêm thông tin
} else {
    echo "Mã đơn hàng không hợp lệ.";
}
?>
