<?php
session_start();
if(isset($_GET['id_sp'])&&$_GET['id_sp']!=0){
    unset($_SESSION['giohang'][$_GET['id_sp']]);
} else {
    unset($_SESSION['giohang']);
}
header('location:../../index.php?page_layout=giohang');
?>