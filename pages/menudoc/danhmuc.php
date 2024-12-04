<div class="menudoc">
    <ul class="list-menud">
        <?php
        include('../admincp/connet/connet.php');
        $sql_danhmuc = "SELECT*FROM tbl_danhmuc ORDER BY id DESC";
        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
        while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
        ?>
        <li><a href="indexpage.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id']?>"><?php echo $row_danhmuc['tendanhmuc']?></a></li>
        <?php
        }
        ?>
    </ul>
 </div>