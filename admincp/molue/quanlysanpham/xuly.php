<?php
include('../../connet/connet.php');


$tensanpham = $_POST['tensanpham'];  
$maSp = $_POST['maSp'];  
$gia = $_POST['gia'];
$soluong = $_POST['soluong'];
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh; 
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$id_danhmuc = $_POST['id_danhmuc'];

if (isset($_POST['themsanpham'])) {
    $sql_them = "INSERT INTO tbl_sanpham (tensanpham, maSp, gia, soluong, hinhanh, tomtat, noidung, tinhtrang, id_danhmuc) 
                 VALUES ('$tensanpham', '$maSp', '$gia', '$soluong', '$hinhanh', '$tomtat', '$noidung', '$tinhtrang','$id_danhmuc')";
    
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp, 'image/'.$hinhanh);
    header('Location: ../../index.php?action=quanlysanpham&query=them');
    
}elseif (isset($_POST['suasanpham'])) {

    if($hinhanh!="") {
    move_uploaded_file($hinhanh_tmp, 'image/'.$hinhanh);
    $sql_sua = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."', maSp='".$maSp."', gia='".$gia."', soluong='".$soluong."', hinhanh='".$hinhanh."', tomtat='".$tomtat."', noidung='".$noidung."', tinhtrang='".$tinhtrang."',id_danhmuc='".$id_danhmuc."' WHERE id_sanpham='$_GET[id_sanpham]'";
    $sql= "SELECT* FROM tbl_sanpham WHERE id_sanpham='$_GET[id_sanpham]' LIMIT 1"; 
    $query=mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)){
        unlink('image/'.$row['hinhanh']);
    }
    } else {
    $sql_sua = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."', maSp='".$maSp."', gia='".$gia."', soluong='".$soluong."', tomtat='".$tomtat."', noidung='".$noidung."', tinhtrang='".$tinhtrang."',id_danhmuc='".$id_danhmuc."' WHERE id_sanpham='$_GET[id_sanpham]'";
    }
    mysqli_query($mysqli, $sql_sua);
    header('Location: ../../index.php?action=quanlysanpham&query=them'); 
    
} else {

    $id = $_GET['id_sanpham']; 
    $sql= "SELECT* FROM tbl_sanpham WHERE id_sanpham='$id' LIMIT 1"; 
    $query=mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)){
        unlink('image/'.$row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'"; 
    mysqli_query($mysqli, $sql_xoa) ;
    header('Location: ../../index.php?action=quanlysanpham&query=them');   
    
}
?>
