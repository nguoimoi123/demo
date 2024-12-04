<?php
    if(isset($_GET['trang'])){
        $page=$_GET['trang'];
    }else{
        $page=1;
    }
    if($page==''||$page== 1){
        $begin = 0;
    }else{
        $begin = ($page*6)-6;
    }
    $sql_product = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,6";
    $query_product = mysqli_query($mysqli, $sql_product);
?>
<h3>Tat ca san pham</h3>
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

    <div style="clear:both"></div>
    
    
    <?php
    $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
    $row_count = mysqli_num_rows($sql_trang);
    $trang=ceil($row_count/6)
    ?>
    <p>Trang:<?php echo $page?>/<?php echo $trang ?></p>
    <ul class="list-trang">
        <?php
        for($i=1;$i<=$trang;$i++){
        ?>
        <li <?php if($i==$page){echo'style="background: brown;"';}else{echo'';}?>><a href="indexpage.php?quanly=sanpham&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php
        }
        ?>
    </ul>   