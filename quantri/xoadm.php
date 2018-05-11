<?php
    include_once './ketnoi.php';
    if(isset($_GET['id_dm'])){
        $sql = "DELETE FROM dmsanpham WHERE id_dm = '".$_GET['id_dm']."'";
        mysqli_query($conn, $sql);
    }
    header('location:./quantri.php?page_layout=danhsachdm');
?>