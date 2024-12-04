<h3>Chi tiết sản phẩm</h3>
<?php
    $sql_chitiet = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
<div class="wrapper_chitiet">
<div class="hinhanhsanpham">
    <img width="50%"src="../admincp/molue/quanlysanpham/image/<?php echo $row_chitiet['hinhanh'] ?>">
</div>
<form method="POST" action="main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>">
    <div class="chitietsanpham">
        <h3><?php echo $row_chitiet['tensanpham']?></h3>
        <p>Ten san pham :<?php echo $row_chitiet['tensanpham']?></p>
        <p>Ma san pham :<?php echo $row_chitiet['maSp']?></p>
        <p>Gia : <?php echo number_format($row_chitiet['gia']).'$'?></p>
        <p>So luong :<?php echo $row_chitiet['soluong']?></p>
        <p>Danh muc :<?php echo $row_chitiet['tendanhmuc']?></p>
        <p><input class="input" name="themgiohang" type="submit" value="Them gio hang"></p>
    </div>
</form>
</div>
<div class="clear"></div>
<div class="tabs">
  <ul id="tabs-nav">
    <li><a href="#tab1">Thong so ky thuat</a></li>
    <li><a href="#tab2">Chi tiet san pham</a></li>
    <li><a href="#tab3">Hinh anh</a></li>
  </ul> <!-- END tabs-nav -->
  <div id="tabs-content">
    <div id="tab1" class="tab-content">
    <?php echo $row_chitiet['tomtat']?>
    </div>
    <div id="tab2" class="tab-content">
    <?php echo $row_chitiet['noidung']?>
    </div>
    <div id="tab3" class="tab-content">
    <img width="50%"src="../admincp/molue/quanlysanpham/image/<?php echo $row_chitiet['hinhanh'] ?>">
  </div> <!-- END tabs-content -->
</div> <!-- END tabs -->
<?php
    }
?>
