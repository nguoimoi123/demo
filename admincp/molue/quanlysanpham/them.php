<p>Them san pham</p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <form method="POST" action="molue/quanlysanpham/xuly.php" enctype="multipart/form-data" >
        <tr>
            <td>Ten san pham </td>
            <td><input type="text" name="tensanpham" style="width: 100%;"></td>
        </tr> 
        <tr>
            <td>Ma san pham</td>
            <td><input type="text" name="maSp" style="width: 100%;"></td>
        </tr>
        <tr>
            <td>Gia</td>
            <td><input type="text" name="gia" style="width: 100%;"></td>
        </tr>
        <tr>
            <td>So luong</td>
            <td><input type="text" name="soluong" style="width: 100%;"></td>
        </tr>
        <tr>
            <td>Hinh anh</td>
            <td><input type="file" name="hinhanh" style="width: 100%;"></td>
        </tr>
        <tr>
            <td>Tom tat</td>
            <td><textarea rows="10" name="noidung"  style="resize: none;"></textarea></td>
        </tr>
        <tr>
            <td>Noi dung</td>
            <td><textarea rows ="10"name="tomtat" style="resize:none"></textarea></td>
        </tr> 
        <tr>
            <td>Danh muc san pham</td>
            <td>
                <select name="id_danhmuc">
                    <?php
                    $sql_danhmuc = "SELECT*FROM tbl_danhmuc ORDER BY id DESC";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                    ?>
                    <option value="<?php echo $row_danhmuc['id']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tinh trang</td>
            <td>
                <select name="tinhtrang">
                    <option value="1">Hien thi</option>
                    <option value="0">An</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
            <input type="submit" name="themsanpham" value="Them san pham">
            </td>
        </tr>
    </form>    
</table>
