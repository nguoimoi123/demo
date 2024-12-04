<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}   
include('../admincp/connet/connet.php');
?>

    <div class="wrapper">
        <form action="main.php?quanly=login"  method="post" class="form-login">
            <h1 class="form-heading">Dang nhap</h1>
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
            <div>
                <ul class="form-dk">
                    <li><a href="#">Quen mat khau?</a></li>
                    <li><a href="indexpage.php?quanly=resiger">Dang ky</a></li>
                </ul>
                </div>
            <input type="submit" name="dangnhap" value="Dang nhap"  class="form-submit">
        </form>
    </div>
    

