<div class="clear"></div>
<div class="main">
    <?php
    if(isset($_GET['action']) ){
        $temp=$_GET['action'];
        $query = isset($_GET['query']) ? $_GET['query'] :'';
    }else{
        $temp='';
    }
    if($temp=='quanlydanhmuc' && $query=='them'){
        include("molue/quanlydanhmucsp/them.php");
        include("molue/quanlydanhmucsp/lietke.php");
    }elseif($temp=='quanlydanhmuc' && $query=='sua'){
        include("molue/quanlydanhmucsp/sua.php");
    }elseif($temp=='quanlysanpham'&& $query=='them'){
        include("molue/quanlysanpham/them.php");
        include("molue/quanlysanpham/lietke.php");
    }elseif($temp=='quanlysanpham'&& $query=='sua'){
        include("molue/quanlysanpham/sua.php");
    }elseif($temp=='quanlydonhang'&& $query=='lietke'){
            include("molue/quanlydonhang/lietke.php");
    }elseif($temp=='donhang'&& $query=='xemdonhang'){
            include("molue/quanlydonhang/xemdonhang.php");
    }elseif($temp=='dangxuat'){
            if(isset($_SESSION['role']))unset($_SESSION['role']);
            header('Location: ../pages/login/loginamin.php'); 
    }else{
        include("molue/dasboard.php");
    }
    ?>
</div>