<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<p>Dat hang</p>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step current"> <span> <a href="indexpage.php?quanly=dathang" >Gio hang</a></span> </div>
    <div class="step"> <span><a href="indexpage.php?quanly=vanchuyen" >Van chuyen</a></span> </div>
    <div class="step"> <span><a href="indexpage.php?quanly=hinhthucthanhtoan" >Hinh thuc thanh toan</a><span> </div>
    <div class="step"> <span><a href="indexpage.php?quanly=lichsu" >Lich su don hang</a><span> </div>
  </div>
</div>
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
        <?php echo $cart_item['soluong'];?>
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
            <div style="clear: both;"></div>
              <p><a href="indexpage.php?quanly=vanchuyen">Van chuyen</a></p>
        </td>
    <tr>
    <?php      
    }
    ?>
</table>