<?php
    include_once './ketnoi.php';
    if(isset($_GET['id_sp'])){
        $sql = "DELETE FROM sanpham WHERE id_sp = '".$_GET['id_sp']."'";
        mysqli_query($conn, $sql);
    }
    header('location:./quantri.php?page_layout=danhsachsp');
?>