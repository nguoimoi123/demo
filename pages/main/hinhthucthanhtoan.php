<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step done"> <span> <a href="indexpage.php?quanly=dathang">Giỏ hàng</a></span> </div>
    <div class="step done"> <span><a href="indexpage.php?quanly=vanchuyen">Vận chuyển</a></span> </div>
    <div class="step current"> <span><a href="indexpage.php?quanly=hinhthucthanhtoan">Hình thức thanh toán</a></span> </div>
    <div class="step"> <span><a href="indexpage.php?quanly=lichsu">Lịch sử đơn hàng</a></span> </div>
  </div>

  <form action="main/thanhtoan.php" method="post">
    <div class="row">
      <div class="col-md-8">
        <?php
        $id_dangky = $_SESSION['id_user'];
        $sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
        $count = mysqli_num_rows($sql_get_vanchuyen);
        
        if ($count > 0) {
            $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
            $name = $row_get_vanchuyen['name'];
            $phone = $row_get_vanchuyen['phone'];
            $adress = $row_get_vanchuyen['adress'];
            $note = $row_get_vanchuyen['note'];
        } else {
          $sql_get_user = mysqli_query($mysqli, "SELECT * FROM tbl_user WHERE id_user='$id_dangky' LIMIT 1");
          $row_get_user = mysqli_fetch_array($sql_get_user);
          $name = $row_get_user['hovaten'];
          $phone = $row_get_user['SDT'];
          $adress =$row_get_user['diachi'];
          $note = '';  
        }
        ?>
        <div class="form-group">
          <label>Ho va ten: </label>
          <span><?php echo $name ?></span>
        </div>
        <div class="form-group">
          <label>SDT: </label>
          <span><?php echo $phone ?></span>
        </div>
        <div class="form-group">
          <label>Đia chi: </label>
          <span><?php echo $adress ?></span>
        </div>
        <div class="form-group">
          <label>Ghi chu: </label>
          <span><?php echo $note ?></span>
        </div>
        
        <table style="width:100%; text-align: center; border-collapse: collapse;" border="1">
          <tr>
            <th>ID</th>
            <th>Ma SP</th>
            <th>Ten SP</th>
            <th>Hinh anh</th>
            <th>So luong</th>
            <th>Gia</th>
            <th>Tong</th>
          </tr>
          <?php
          if(isset($_SESSION['cart'])) {
            $i = 0;
            $all_sum = 0;
            foreach($_SESSION['cart'] as $cart_item){
                $sum = $cart_item['soluong'] * $cart_item['gia'];
                $all_sum += $sum;
                $i++;
          ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $cart_item['maSp']; ?></td>
            <td><?php echo $cart_item['tensanpham']; ?></td>
            <td><img src="../admincp/molue/quanlysanpham/image/<?php echo $cart_item['hinhanh']; ?>" width="100px"></td>
            <td><?php echo $cart_item['soluong']; ?></td>
            <td><?php echo number_format($cart_item['gia']).'$'; ?></td>
            <td><?php echo number_format($sum).'$'; ?></td>
          </tr>
          <?php
            }
            ?>
          <?php      
          }
          ?>
        </table>
      </div>

      <!-- Phần hình thức thanh toán -->
      <div class="col-md-4">
        <div class="hinhthucthanhtoan">
          <h4>Hình thức thanh toán</h4>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="payment" id="paymentCash" value="tienmat" checked>
            <label class="form-check-label" for="paymentCash">Tien mat</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="payment" id="paymentTransfer" value="chuyenkhoan">
            <label class="form-check-label" for="paymentTransfer">Chuyen khoan</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="payment" id="paymentVNPay" value="vnpay">
            <label class="form-check-label" for="paymentVNPay">VN-Pay</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="payment" id="paymentMomo" value="momo">
            <label class="form-check-label" for="paymentMomo">Momo</label>
          </div>
          <p>Tong tien can thanh toan: <?php echo number_format($all_sum).'$'; ?></p>
          <input type="submit" name="checkout" value="Thanh toan ngay" class="btn btn-danger">
        </div>
      </div>
    </div>
  </form>
</div>

