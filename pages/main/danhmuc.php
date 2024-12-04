<?php
    $sql_cate = "SELECT tendanhmuc FROM tbl_danhmuc WHERE id = '$_GET[id]'";
    $query_cate = mysqli_query($mysqli, $sql_cate);
    $row_cate = mysqli_fetch_array($query_cate);
?>
<h3>Danh muc:<?php echo $row_cate['tendanhmuc'] ?></h3>
<?php
    $sql_product = "SELECT * FROM tbl_sanpham WHERE id_danhmuc = '$_GET[id]' ORDER BY id_sanpham DESC";
    $query_product = mysqli_query($mysqli, $sql_product);
?>
    <ul class="product_list">
        <?php
        while($row_product = mysqli_fetch_array($query_product)){
        ?>
        <li>
            <a href="indexpage.php?quanly=chitietsanpham&id=<?php
                    echo $row_product['id_sanpham']?>">
            <img src="../admincp/molue/quanlysanpham/image/<?php echo $row_product['hinhanh']?>">
            <p class="title_product">Ten san pham: <?php echo $row_product['tensanpham']?></p>
            <p class="price_product">Gia: <?php echo number_format($row_product['gia']).'$'?></p>
            </a>
        </li>
        <?php
        }
        ?>
    </ul>
             