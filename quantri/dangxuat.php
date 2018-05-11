<?php
    ob_start();
    session_start();
    if(isset($_SESSION['email'])){
        session_destroy();
    } else{
        setcookie('email', 'a', time()-30000);
        setcookie('mk', 'a', time()-30000);
    }
    header('location:index.php');
?>