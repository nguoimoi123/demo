<?php
    session_start();
    ob_start();
    include('../../admincp/connet/connet.php');
    include('../../admincp/connet/user.php');
    if((isset($_POST['dangnhap'])) && ($_POST['dangnhap'])){
        $user=$_POST['user'];
        $pass=md5($_POST['pass']);
        $role=checkuser($user,$pass);
        $_SESSION['role']=$role;
        if($role==1) header('Location:../../admincp/index.php');
        else header('Location:loginamin.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post" class="form-login">
            <h1 class="form-heading">Dang nhap AMIN</h1>
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
            <input type="submit" name="dangnhap" value="Dang nhap"  class="form-submit">
        </form>
    </div>
    
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" ></script>
<script src="../../js/login.js"></script>
</html>