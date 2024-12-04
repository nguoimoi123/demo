<?php
    $sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<p>Liet ke danh muc san pham</p>
<table border="1" style="width:100%" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Ten danh muc</th>
    <th>Thu tu</th>
    <th>Quanly</th>

  </tr>
  <?php
  $i=0;
  while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
    $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td><?php echo $row['thutu'] ?></td>
    <td>
        <a href="molue/quanlydanhmucsp/xuly.php?id=<?php echo $row['id']?>">Xoa</a> | <a href="index.php?action=quanlydanhmuc&query=sua&id=<?php echo $row['id']?>">Sua</a>
    </td>
  </tr>
  <?php
  }
  ?>  
</table>
