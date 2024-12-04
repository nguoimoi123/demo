<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('../admincp/connet/connet.php');
if (isset($_SESSION['dangnhap'])) {
    echo 'Đăng nhập thành công! Chào mừng, ' . $_SESSION['dangnhap'];
    $id=$_SESSION['dangnhap'];
}
?> 
<div class="menudoc">
    <ul class="list-menud">
        <?php
        $sql_thongtin = "SELECT*FROM tbl_user ORDER BY id_user DESC LIMIT 1";
        $query_thongtin = mysqli_query($mysqli, $sql_thongtin);
        while($row_thongtin = mysqli_fetch_array($query_thongtin)){
        ?>
        <li><a href="indexpage.php?quanly=khachhang&id_user=<?php echo $row_thongtin['id_user']?>"><?php echo $row_thongtin['hovaten'] ?></a></li>
        <li><a href="indexpage.php?quanly=khachhang&id_user=<?php echo $row_thongtin['id_user']?>"><?php echo $row_thongtin['email'] ?></a></li>
        <li><a href="indexpage.php?quanly=khachhang&id_user=<?php echo $row_thongtin['id_user']?>"><?php echo $row_thongtin['diachi']?></a></li>
        <li><a href="indexpage.php?quanly=khachhang&id_user=<?php echo $row_thongtin['id_user']?>"><?php echo $row_thongtin['SDT'] ?></a></li>
        <?php
        }
        ?>
    </ul>
 </div>

