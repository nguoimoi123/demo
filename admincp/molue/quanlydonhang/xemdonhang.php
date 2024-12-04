<p>chi tiet don hang</p>
<?php
    $code=$_GET['code'];
    $sql_lietke_dh = "SELECT * FROM tbl_cart_detail,tbl_sanpham WHERE tbl_cart_detail.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_detail.ma_cart='".$code."' ORDER BY tbl_cart_detail.id_cart_detail DESC";
    $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<table border="1" style="width:100%" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Ma don hang</th>
    <th>Ten san pham</th>
    <th>So luong</th>
    <th>Gia</th>
    <th>Tong</th>

  </tr>
  <?php
  $i=0;
  $tongtien=0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
    $i++;
    $thanhtien=$row['gia']*$row['soluongmua'];
    $tongtien+=$thanhtien;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['ma_cart'] ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo $row['gia'] ?></td>
    <td><?php echo $thanhtien ?></td>
  </tr>
  <?php
  }
  ?> 
  <tr>
    <td colspan="6">
        <p>Gia tat ca san pham: <?php echo $tongtien?></p>
    </td>
  </tr> 
</table>
