<?php

    $sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id='$_GET[id]' LIMIT 1";  
    $query_sua_danhmucsp = mysqli_query($mysqli, $sql_sua_danhmucsp);

?>

<p>Sửa danh mục sản phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <form method="POST" action="molue/quanlydanhmucsp/xuly.php?id=<?php echo $_GET['id'] ?>">
        <?php
        while($row= mysqli_fetch_array($query_sua_danhmucsp)){
        ?>
        <tr>
            <th colspan="2">Điền danh mục sản phẩm</th>
        </tr>
        <tr>
            <td>Ten danh muc</td>
            <td><input type="text" name="tendanhmuc" value="<?php echo htmlspecialchars($row['tendanhmuc']); ?>" style="width: 100%;"></td>
        </tr> 
        <tr>
            <td>Giá</td>
            <td><input type="text" name="thutu" value="<?php echo htmlspecialchars($row['thutu']); ?>" style="width: 100%;"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" name="suadanhmuc" value="Cập nhật danh mục sản phẩm">
            </td>
        </tr>
        <?php
        }
        ?>
    </form>    
</table>
