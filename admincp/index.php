<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <title>BT</title>
</head>
    <body>
        <h3 class="title">DANH SACH SAN PHAM</h3>
        <div class="wrapper">
            <?php
                session_start();
            if (isset(($_SESSION['role']))&&($_SESSION['role']==1)){
        
                include ("connet/connet.php");
                include ("molue/header.php");
                include ("molue/menu.php");
                include ("molue/trangchu.php");
                include ("molue/footer.php");
            }else{
                header('Location: ../pages/login/loginamin.php');
                exit();
            }
            ?>
        </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('tomtat');
        CKEDITOR.replace('noidung');
    </script>
    </body>
</head>
</html>
