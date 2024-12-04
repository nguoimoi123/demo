<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<p>Gio hang</p>
  <?php
    if (isset($_SESSION['dangnhap'])) {
      echo 'Chào mừng, ' . $_SESSION['dangnhap'] . '!';
      //echo $_SESSION['id_user'];
    } else {
      echo 'Bạn chưa đăng nhập.';
    }
  ?>
<?php
    if(isset($_SESSION['cart'])){
       
    }
?>
<table style="width:100%; text-align: center;border-collapse:collapse;" border="1px";>
  <tr>
    <th>ID</th>
    <th>Ma sp</th>
    <th>Ten sp</th>
    <th>Hinh anh</th>
    <th>So luong</th>
    <th>Gia</th>
    <th>Tong</th>
    <th>Quan ly</th>
  </tr>
  <?php
  if(isset($_SESSION['cart'])) {
    $i=0;
    $all_sum=0;
    foreach($_SESSION['cart'] as $cart_item){
        $sum = $cart_item['soluong']*$cart_item['gia'];
        $all_sum=$all_sum+$sum;
        $i++;
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $cart_item['maSp'];?></td>
    <td><?php echo $cart_item['tensanpham'];?></td>
    <td><img src="../admincp/molue/quanlysanpham/image/<?php echo $cart_item['hinhanh'];?>" width="100px"></td>
    <td>
        <a style="text-decoration: none;" href="main/themgiohang.php?cong=<?php echo $cart_item['id']?>">+</a>
        <?php echo $cart_item['soluong'];?>
        <a style="text-decoration: none;" href="main/themgiohang.php?tru=<?php echo $cart_item['id']?>">-</a>
    </td>
    <td><?php echo number_format($cart_item['gia']).'$';?></td>
    <td><?php echo number_format($sum).'$';?></td>
    <td><a href="main/themgiohang.php?xoa=<?php echo $cart_item['id']?>">Xoa</a></td>
  </tr>
  <?php
    }
    ?>
    <tr>
        <td colspan="8">
            <p>Tong tien: <?php echo number_format($all_sum).'$';?></p>
            <p style="float:right"><a href="main/themgiohang.php?xoatatca=1">Xoa tat ca</a></p>
            <div style="clear: both;"></div>
            <?php
              if(isset($_SESSION['dangnhap'])){
                ?>
                  <p><a href="indexpage.php?quanly=dathang">Dat hang</a></p>
              <?php  
              }else{
                ?>
                <p><a href="indexpage.php?quanly=login">Dang nhap de mua hang</a></p>
              <?php
              }  
            ?>
        </td>
    <tr>
    <?php      
    }else {
    ?>
    <tr>
        <td colspan="8"><p>Chua mua gi het</p></td>
     <tr>
<?php
}
?>
</table>