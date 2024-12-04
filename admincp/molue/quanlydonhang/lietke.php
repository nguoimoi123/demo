<p>Liet ke don hang</p>
<?php
$sql_lietke_dh = "SELECT tbl_cart.*, 
IFNULL(tbl_shipping.name, tbl_user.hovaten) AS hovaten, 
IFNULL(tbl_shipping.phone, tbl_user.SDT) AS SDT,
IFNULL(tbl_shipping.adress, tbl_user.diachi) AS diachi,
tbl_user.email,
tbl_shipping.note,
tbl_cart.trangthai,
tbl_cart.cart_date
FROM tbl_cart
INNER JOIN tbl_user ON tbl_cart.id_khachhang = tbl_user.id_user
LEFT JOIN tbl_shipping ON tbl_user.id_user = tbl_shipping.id_dangky
ORDER BY tbl_cart.id_cart DESC";
    $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<table border="1" style="width:100%" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Ma don hang</th>
    <th>Ten khach hang</th>
    <th>Email</th>
    <th>Dia chi</th>
    <th>SDT</th>
    <th>Tinh trang</th> 
    <th>Ngay dat</th>
    <th>Quanly</th>

  </tr>
  <?php
  $i=0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
    $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['ma_cart'] ?></td>
    <td><?php echo $row['hovaten'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['SDT'] ?></td>
    <td>
      <?php
        switch ($row['trangthai']) {
          case 0:
            echo '<a href="molue/quanlydonhang/xuly.php?code='.$row['ma_cart'].'">Don hang moi</a>';
            break;
          case 1:
            echo '<a href="molue/quanlydonhang/xuly.php?code='.$row['ma_cart'].'">Da xem</a>';
            break;
          case 2:
            echo '<a href="molue/quanlydonhang/xuly.php?code='.$row['ma_cart'].'">Dang giao</a>';
            break;
          case 3:
            echo 'Da giao';
            break;
          case 4:
            echo 'Da huy';
            break;
        }
      ?>
    </td>
    <td><?php echo $row['cart_date']?></td>
    <td>
        <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['ma_cart']?>">Xem don hang</a> 
    </td>
  </tr>
  <?php
  }
  ?>  
</table>
