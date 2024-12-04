<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//session_destroy();
include('../../admincp/connet/connet.php');
// Tăng số lượng sản phẩm
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    $product = array(); 


    $sql = "SELECT soluong FROM tbl_sanpham WHERE id_sanpham = '" . $id . "' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    $soluong_tonkho = $row['soluong']; 

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = $cart_item; 
        } else {
            $tangsoluong = $cart_item['soluong'] + 1;

            
            if ($tangsoluong <= $soluong_tonkho) {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'],
                    'id' => $cart_item['id'],
                    'soluong' => $tangsoluong,
                    'gia' => $cart_item['gia'],
                    'hinhanh' => $cart_item['hinhanh'],
                    'maSp' => $cart_item['maSp']
                );
            } else {
                
                $product[] = $cart_item;
                echo "<script>alert('Số lượng sản phẩm trong giỏ hàng đã vượt quá số lượng tồn kho!');</script>";
            }
        }
    }

    $_SESSION['cart'] = $product; 
    header('Location:../indexpage.php?quanly=giohang');
}


// Giảm số lượng sản phẩm
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    $product = array(); 

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = $cart_item;
        } else {
            $tangsoluong = $cart_item['soluong'] - 1;
            if ($cart_item['soluong'] > 1) {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'],
                    'id' => $cart_item['id'],
                    'soluong' => $tangsoluong,
                    'gia' => $cart_item['gia'],
                    'hinhanh' => $cart_item['hinhanh'],
                    'maSp' => $cart_item['maSp']
                );
            } else {
                $product[] = $cart_item; 
            }
        }
    }
    $_SESSION['cart'] = $product; 
    header('Location:../indexpage.php?quanly=giohang');
}

// Xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $product = array(); 

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = $cart_item; 
        }
    }

    $_SESSION['cart'] = $product; 
    header('Location:../indexpage.php?quanly=giohang');
}

// Xóa toàn bộ giỏ hàng
if (isset($_GET['xoatatca']) && $_GET['xoatatca']) {
    unset($_SESSION['cart']);
    header('Location:../indexpage.php?quanly=giohang');
}

// Thêm sản phẩm vào giỏ hàng
if (isset($_POST['themgiohang'])) {
    $id = $_GET['idsanpham'];
    $soluong = 1;


    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        $new_product = array(array(
            'tensanpham' => $row['tensanpham'],
            'id' => $id,
            'soluong' => $soluong,
            'gia' => $row['gia'],
            'hinhanh' => $row['hinhanh'],
            'maSp' => $row['maSp']
        ));

        if (isset($_SESSION['cart'])) {
            $found = false;
            $product = array(); 

            foreach ($_SESSION['cart'] as $cart_item) {
                if ($cart_item['id'] == $id) {
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id'],
                        'soluong' => $cart_item['soluong'] + 1,
                        'gia' => $cart_item['gia'],
                        'hinhanh' => $cart_item['hinhanh'],
                        'maSp' => $cart_item['maSp']
                    );
                    $found = true;
                } else {
                    $product[] = $cart_item; 
                }
            }

            if ($found == false) {
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }

    header('Location:../indexpage.php?quanly=giohang');
}
?>
