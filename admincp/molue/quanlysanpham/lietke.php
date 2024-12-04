<?php
    $sql_lietke_sanpham = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id ORDER BY id_sanpham DESC";
    $query_lietke_sanpham = mysqli_query($mysqli,$sql_lietke_sanpham);
?>
<p>Liet ke san pham</p>
<table border="1" style="width:100%" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Ten san pham</th>
    <th>Hinh anh</th>
    <th>Gia</th>
    <th>So luong</th>
    <th>Danh muc</th>
    <th>Ma sp</th>
    <th>Tom tat</th>
    <th>Trang thai</th>
    <th>Quan ly</th> 

  </tr>
  <?php
  $i=0;
  while($row = mysqli_fetch_array($query_lietke_sanpham)){
    $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><img src="molue/quanlysanpham/image/<?php echo $row['hinhanh'] ?>" style="width: 200px; heigh:300px"; ></td>
    <td><?php echo $row['gia'] ?></td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td><?php echo $row['maSp'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php if( $row['tinhtrang']==1){
        echo "Hien thi";
      }else{
        echo "An";
      } 
      ?>
    </td> 
    <td>
        <a href="molue/quanlysanpham/xuly.php?id_sanpham=<?php echo $row['id_sanpham']?>">Xoa</a> | <a href="index.php?action=quanlysanpham&query=sua&id_sanpham=<?php echo $row['id_sanpham']?>">Sua</a>
    </td>
  </tr>
  <?php
  }
  ?>  
</table>
