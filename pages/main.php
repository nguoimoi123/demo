<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

include_once('../admincp/connet/user.php');        
?>
<div id="main">
      <?php
      if(isset($_GET['quanly'])){
        $temp = $_GET['quanly'];
      }else{
        $temp='';
      }
      if($temp=='giohang'){
        include("menudoc/danhmucgiohang.php");
      }elseif($temp=='dondadat'){
        include("menudoc/danhmucgiohang.php");
      }elseif($temp=='danggiao'){
        include("menudoc/danhmucgiohang.php");
      }elseif($temp=='dagiao'){
        include("menudoc/danhmucgiohang.php");
      }elseif($temp=='dahuy'){
        include("menudoc/danhmucgiohang.php");
      }elseif($temp=='user'){
          include("menudoc/menukhachhang.php");
      }elseif($temp=='lienhe'){
          include("menudoc/khong.php");
      }elseif($temp=='login'){
          include("menudoc/khong.php");
      }elseif($temp=='camon'){
          include("menudoc/khong.php");
      }elseif($temp=='resiger'){
          include("menudoc/khong.php");
      }elseif($temp=='dathang'){
          include("menudoc/khong.php");
      }elseif($temp=='vanchuyen'){
          include("menudoc/khong.php");
      }elseif($temp=='hinhthucthanhtoan'){
          include("menudoc/khong.php");
      }elseif($temp=='lichsu'){
          include("menudoc/danhmucgiohang.php");
      }else{
        include ("menudoc/danhmuc.php");
      }
    ?>     
                  <div class="main-content">
                  <?php
                  if(isset($_GET['quanly'])){
                    $temp = $_GET['quanly'];
                  }else{
                    $temp = '';
                  }
                 if($temp=='danhmucsanpham'){
                    include("main/danhmuc.php");
                  }elseif($temp =='sanpham'){
                     include("main/sanpham.php");
                  }elseif($temp =='giohang'){
                    include("main/giohang.php");
                  }elseif($temp =='chitietsanpham'){
                     include("main/chitietsanpham.php");
                  }elseif($temp =='user'){
                      include("main/khachhang.php");  
                  }elseif($temp =='resiger'){
                        include("login/resiger.php");
                  }elseif($temp =='login'){
                    if(isset($_POST['dangnhap']) && $_POST['dangnhap']){
                      $user=$_POST['user'];
                      $pass=md5($_POST['pass']);
                      $kq=getuserinfo($user,$pass);
                      $role=$kq[0]['role'];
                      //$sql= "SELECT * FROM tbl_users WHERE user='".$user."' AND pass='".$pass."' AND role='".$role."' LIMIT 1";
                      //$row =mysqli_query($mysqli,$sql);
                      //$count=mysqli_num_rows($row);
                      //echo $role;
                      if($kq==null){
                        header('location:indexpage.php?quanly=login');
                      }else{
                        if($role == 1){
                          $_SESSION['role'] = $role;
                          header('Location: ../admincp/index.php');
                          exit();
                        }else if($role == 0){
                          $_SESSION['role'] = $role;
                          $_SESSION['id_user'] = $kq[0]['id_user'];
                          $_SESSION['user'] = $kq[0]['user'];
                          $_SESSION['dangnhap']=$user;
                          $_SESSION['id_khachang']=$id_user;
                          header('Location: indexpage.php?quanly=user');
                        }
                      }
                    }
                    include("login/login.php");
                  }elseif ($temp == 'thoat') {   
                    unset($_SESSION['role']);
                    unset($_SESSION['id_user']);
                    unset($_SESSION['user']);
                    session_unset();
                    header('Location: indexpage.php');  
                  }elseif($temp =='thanhtoan'){
                    include("main/thanhtoan.php"); 
                  }elseif($temp =='timkiem'){
                    include("main/timkiem.php");
                  }elseif($temp =='lienhe'){
                      include("main/lienhe.php");
                  }elseif($temp =='camon'){
                      include("main/camon.php"); 
                  }elseif($temp =='dondadat'){
                      include("main/dondadat.php"); 
                  }elseif($temp =='danggiao'){
                      include("main/danggiao.php");
                  }elseif($temp =='dagiao'){
                      include("main/dagiao.php");  
                  }elseif($temp =='dahuy'){
                      include("main/dahuy.php");  
                  }elseif($temp =='dathang'){
                      include("main/dathang.php"); 
                  }elseif($temp =='vanchuyen'){
                      include("main/vanchuyen.php");  
                  }elseif($temp =='hinhthucthanhtoan'){
                      include("main/hinhthucthanhtoan.php");  
                  }elseif($temp =='lichsu'){
                      include("main/sanphamdadat.php");           
                  }else{
                    include("main/indexmain.php");
                  }
                  ?>   
                </div>
            </div>
           