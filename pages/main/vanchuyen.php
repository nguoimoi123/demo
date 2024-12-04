<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step done"> <span> <a href="indexpage.php?quanly=dathang" >Gio hang</a></span> </div>
    <div class="step current"> <span><a href="indexpage.php?quanly=vanchuyen" >Van chuyen</a></span> </div>
    <div class="step"> <span><a href="indexpage.php?quanly=hinhthucthanhtoan" >Hinh thuc thanh toan</a><span> </div>
    <div class="step"> <span><a href="indexpage.php?quanly=lichsu" >Lich su don hang</a><span> </div>
  </div>
  <h4>Thong tin van chuyen</h4>
  <?php
  if(isset($_POST['themvanchuyen'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $adress=$_POST['adress'];
    $note=$_POST['note'];
    $id_dangky=$_SESSION['id_user'];
    $sql_them_vanchuyen = mysqli_query($mysqli, "INSERT INTO tbl_shipping (name, phone, adress, note, id_dangky) VALUES('$name', '$phone', '$adress', '$note','$id_dangky')");
    if($sql_them_vanchuyen){
        echo '<script>alert("Them thanh cong")</script>';
    }
  }elseif(isset($_POST['capnhatvanchuyen'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $adress=$_POST['adress'];
    $note=$_POST['note'];
    $id_dangky=$_SESSION['id_user'];
    $sql_update_vanchuyen = mysqli_query($mysqli, "UPDATE tbl_shipping SET name='$name', phone='$phone', adress='$adress', note='$note', id_dangky='$id_dangky'WHERE id_dangky='$id_dangky'");
    if($sql_update_vanchuyen){
        echo '<script>alert("Cap nhap thanh cong")</script>';
    }
  }
  ?>
  <div class="row">
    <?php
    $id_dangky=$_SESSION['id_user'];
    $sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky'LIMIT 1");
    $count=mysqli_num_rows($sql_get_vanchuyen);
    if($count>0){
        $row_get_vanchuyen= mysqli_fetch_array($sql_get_vanchuyen);
        $name=$row_get_vanchuyen['name'];
        $phone=$row_get_vanchuyen['phone'];
        $adress=$row_get_vanchuyen['adress'];
        $note=$row_get_vanchuyen['note'];
    }else{
      $sql_get_user = mysqli_query($mysqli, "SELECT * FROM tbl_user WHERE id_user='$id_dangky' LIMIT 1");
      $row_get_user = mysqli_fetch_array($sql_get_user);
      $name = $row_get_user['hovaten'];
      $phone = $row_get_user['SDT'];
      $adress =$row_get_user['diachi'];
      $note = '';  
    }
    ?>
    <div class="col-md-12">
  <form action="" autocomplete="off" method="post">
  <div class="form-groupp">
    <label >Ho va ten</label>
    <input type="text" name ="name" value="<?php echo $name?>"class="form-control" >
  </div>
  <div class="form-groupp">
    <label for="email">SDT</label>
    <input type="text" name ="phone"value="<?php echo $phone?> "class="form-control" >
  </div>
  <div class="form-groupp">
    <label for="email">Dia chi</label>
    <input type="text" name ="adress" value="<?php echo $adress?> "class="form-control" >
  </div>
  <div class="form-groupp">
    <label for="email">Ghi chu</label>
    <input type="text" name ="note" value=""class="form-control" >
  </div>
  <?php
  if($name==''&&$phone==''){
  ?>
  <button type="submit" name="themvanchuyen" class="btn btn-primary">Them phuc thuc van chuyen</button>
  <?php
  }elseif($name!=''&&$phone!=''){?>
  <button type="submit" name="capnhatvanchuyen" class="btn btn-primary" >Cap nhat</button>
  <?php
  }
  ?>
</form> 
    </div>
    <table style="width:100%; text-align: center;border-collapse:collapse;" border="1px";>
  <tr>
    <th>ID</th>
    <th>Ma sp</th>
    <th>Ten sp</th>
    <th>Hinh anh</th>
    <th>So luong</th>
    <th>Gia</th>
    <th>Tong</th>
  </tr>
  <?php
  if(isset($_SESSION['cart'])) {
    $i=0;
    $all_sum=0;
    foreach($_SESSION['cart'] as $cart_item){
        $sum = $cart_item['soluong']*$cart_item['gia'];
        $all_sum=$all_sum+$sum;
        $i++;
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $cart_item['maSp'];?></td>
    <td><?php echo $cart_item['tensanpham'];?></td>
    <td><img src="../admincp/molue/quanlysanpham/image/<?php echo $cart_item['hinhanh'];?>" width="100px"></td>
    <td> 
        <?php echo $cart_item['soluong'];?>
    </td>
    <td><?php echo number_format($cart_item['gia']).'$';?></td>
    <td><?php echo number_format($sum).'$';?></td>
  </tr>
  <?php
    }
    ?>
    <tr>
        <td colspan="8">
            <p>Tong tien: <?php echo number_format($all_sum).'$';?></p>
            <div style="clear: both;"></div>
              <p><a href="indexpage.php?quanly=hinhthucthanhtoan">Thanhtoan</a></p>
        </td>
    <tr>
    <?php      
    }
    ?>
</table>
  </div>
</div>