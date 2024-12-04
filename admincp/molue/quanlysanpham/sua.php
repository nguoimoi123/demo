<?php

    $sql_sua_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[id_sanpham]' LIMIT 1";  
    $query_sua_sanpham = mysqli_query($mysqli, $sql_sua_sanpham);

?>

<p>Sua san pham</p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <?php
    while($row= mysqli_fetch_array($query_sua_sanpham)){
    ?>
    <form method="POST" action="molue/quanlysanpham/xuly.php?id_sanpham=<?php echo $row['id_sanpham'] ?>" enctype="multipart/form-data" >
        <tr>
            <td>Ten san pham </td>
            <td><input type="text" value="<?php echo $row['tensanpham']?>" name="tensanpham" style="width: 100%;"></td>
        </tr> 
        <tr>
            <td>Ma san pham</td>
            <td><input type="text" value="<?php echo $row['maSp']?>" name="maSp" style="width: 100%;"></td>
        </tr>
        <tr>
            <td>Gia</td>
            <td><input type="text" value="<?php echo $row['gia']?>" name="gia" style="width: 100%;"></td>
        </tr>
        <tr>
            <td>So luong</td>
            <td>
                <input type="text" value="<?php echo $row['soluong']?>" name="soluong" style="width: 100%;">    
            </td>
        </tr>
        <tr>
            <td>Hinh anh</td>
            <td><input type="file" name="hinhanh" style="width: 100%;">
            <img src="molue/quanlysanpham/image/<?php echo $row['hinhanh'] ?>" style="width: 200px; heigh:300px"; >
            </td>
        </tr>
        <tr>
            <td>Tom tat</td>
            <td><textarea rows="5" name="noidung"  style="width: 100%;"><?php echo $row['tomtat']?></textarea></td>
        </tr>
        <tr>
            <td>Noi dung</td>
            <td><textarea rows ="5"name="tomtat" style="width: 100%;"><?php echo $row['noidung']?></textarea></td>
        </tr>
        <tr>
            <td>Danh muc san pham</td>
            <td>
                <select name="id_danhmuc">
                    <?php
                    $sql_danhmuc = "SELECT*FROM tbl_danhmuc ORDER BY id DESC";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                        if($row_danhmuc['id']==$row['id_danhmuc']){
                    ?>
                    <option selected value="<?php echo $row_danhmuc['id']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
                    <?php
                        }else{       
                    ?>
                    <option value="<?php echo $row_danhmuc['id']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
                    <?php        
                        }
                    }
                    ?>
                </select>
            </td>
        </tr> 
        <tr>
            <td>Tinh trang</td>
            <td>
                <select name="tinhtrang">
                    <?php
                    if ($row['tinhtrang']==1){
                    ?>
                    <option value="1" selected>Hien thi</option>
                    <option value="0">An</option>
                    <?php
                    }else{  
                    ?>
                    <option value="1">Hien thi</option>
                    <option value="0" selected>An</option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
            <input type="submit" name="suasanpham" value="Sua san pham">
            </td>
        </tr>
    </form> 
    <?php
    }
    ?>   
</table>
