<?php
    if(isset($_POST['dangky'])){
        $hovaten=$_POST['fullname'];
        $email=$_POST['email'];
        $diachi=$_POST['adress'];
        $SDT=$_POST['phonenumber'];
        $user=$_POST['user'];
        $pass=md5($_POST['pass']);
        $re_pass = md5($_POST['re-pass']);
        if ($pass != $re_pass) {
            echo '<p style="color:red">Mật khẩu không khớp. Vui lòng nhập lại.</p>';
        }else{    
            $sql_dangky=mysqli_query($mysqli,"INSERT INTO tbl_user(hovaten,email,diachi,SDT,user,pass) VALUES('".$hovaten."','".$email."','".$diachi."','".$SDT."','".$user."','".$pass."')");
        
            if($sql_dangky){
                echo '<p style="color:green">ban da dang ky thanh cong</p>';
                $_SESSION['dangky']=$hovaten;
                $_SESSION['id_user']= mysqli_insert_id($mysqli);
            }else{
                echo '<p style="color:red">da co loi xay ra, vui long thu lai</p>';
            }
        }    
    }
?>
    <div class="wrapper">
        <form action=""  method="post" class="form-login">
            <h1 class="form-heading">Dang ky</h1>
            <div class="form-group">
            <i class="fa-solid fa-signature"></i>
                <input type="text" class="form-input" placeholder="fullname" name="fullname" id="">
            </div>
            <div class="form-group">
                <i class="fa-regular fa-envelope"></i>
                <input type="text" class="form-input" placeholder="email" name="email" id="">
            </div>
            <div class="form-group">
            <i class="fa-solid fa-house"></i>
                <input type="text" class="form-input" placeholder="adress" name="adress" id="">
            </div>
            <div class="form-group">
            <i class="fa-solid fa-phone"></i>
                <input type="text" class="form-input" placeholder="phonenumber" name="phonenumber" id="">
            </div>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" placeholder="username" name="user" id="">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" placeholder="password" name="pass" id="">
                <div class="eye">
                <i class="far fa-eye"></i>
            </div>
            </div>
            <div class="form-group">
            <i class="fa-solid fa-bookmark"></i>
                <input type="re-password" class="form-input" placeholder="re-password" name="re-pass" id="">
                <div class="eye">
                <i class="far fa-eye"></i>
                </div>    
            </div>
            <input type="submit" name="dangky" value="Dang ky"  class="form-submit">  
        </form>
    </div>
    
