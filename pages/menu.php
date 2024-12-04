<?php
session_start();
//session_destroy();
include_once('../admincp/connet/connet.php');
include_once('../admincp/connet/user.php');
?>
<div class="menungang">
                <ul class="list-menu">
                    <li><a href="indexpage.php">Trang chu</a></li>
                    <li><a href="indexpage.php?quanly=sanpham">San pham</a></li>
                    <li><a href="indexpage.php?quanly=giohang">Gio hang</a></li>
                    <li><a href="indexpage.php?quanly=lienhe">Lien he</a></li>
                    <?php   
                        if(isset($_SESSION['user']) && ($_SESSION['user']!="")){
                            echo '<li><a href="indexpage.php?quanly=user">'.$_SESSION['user'].'</a></li>';
                            echo '<li><a href="indexpage.php?quanly=thoat">Dang xuat</a></li>';
                        }else {   
                    ?>
                    <li><a href="indexpage.php?quanly=login">Dang nhap</a></li>
                    <li><a href="indexpage.php?quanly=resiger">Dang ky</a></li>
                    <?php
                        }
                    ?>
                    <form action="indexpage.php?quanly=timkiem" method="post">
                    <p style="float:right ; margin-top:12px"><input style="margin-left:5px ;height: 25px ;border-radius:5px" type="submit" name="tim" value="🔍"></p>
                    <p style="float:right ; margin-top:12px"><input style="border-radius:5px"  type="text" name="timkiem" ></p>
                    </form>
                </ul>
            </div>
