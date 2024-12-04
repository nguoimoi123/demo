<?php
    if(isset($_POST['tim'])){
        $timkiem = $_POST['timkiem'];
    }else{
        $timkiem='';
    }
    $sql_product = "SELECT * FROM tbl_sanpham, tbl_danhmuc  WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id AND tbl_sanpham.tensanpham LIKE '%".$timkiem."%'";
    $query_product = mysqli_query($mysqli, $sql_product);
?>
<h3><?php echo $_POST['timkiem']?></h3>
    <ul class="product_list">
        <?php
        while ($row = mysqli_fetch_array($query_product)){
        ?>
        <li>
            <a href="indexpage.php?quanly=chitietsanpham&id=<?php
                    echo $row['id_sanpham']?>">
            <img src="../admincp/molue/quanlysanpham/image/<?php echo $row['hinhanh']?>">
            <p class="title_product">Ten san pham: <?php echo $row['tensanpham']?></p>
            <p class="price_product">Gia: <?php echo number_format($row['gia']).'$'?></p>
            <p class="cate_product">Danh muc:<?php echo $row['tendanhmuc']?></p>
            </a>
        </li>
        <?php
        }
        ?>
    </ul>    
                        