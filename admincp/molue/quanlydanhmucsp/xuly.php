<?php
include('../../connet/connet.php');

$tendanhmuc = mysqli_real_escape_string($mysqli, $_POST['tendanhmuc']);  
$thutu = mysqli_real_escape_string($mysqli, $_POST['thutu']);                 


if (isset($_POST['themdanhmuc'])) {

    $sql_them = "INSERT INTO tbl_danhmuc (tendanhmuc, thutu) VALUES ('$tendanhmuc', '$thutu')";
    if (mysqli_query($mysqli, $sql_them)) {
        header('Location: ../../index.php?action=quanlydanhmuc&query=them');  
        exit();  
    } else {
        echo "Error: " . mysqli_error($mysqli);  
    }
} elseif (isset($_POST['suadanhmuc'])) {

    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $sql_sua = "UPDATE tbl_danhmuc SET tendanhmuc='".$tendanhmuc."', thutu='".$thutu."' WHERE id='$_GET[id]'";
    if (mysqli_query($mysqli, $sql_sua)) {
        header('Location: ../../index.php?action=quanlydanhmuc&query=them');  
        exit();     
    } else {
        echo "Error: " . mysqli_error($mysqli);  
    }
} else {

    $id = mysqli_real_escape_string($mysqli, $_GET['id']);  
    $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id='$id'"; 
    if (mysqli_query($mysqli, $sql_xoa)) {
        header('Location: ../../index.php?action=quanlydanhmuc&query=them');  
        exit();  
    } else {
        echo "Error: " . mysqli_error($mysqli);  
    }
}
?>

