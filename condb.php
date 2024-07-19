<?php
    $conn = new mysqLi('127.0.0.1:3307','root','','banhang');
    if($conn) {
        mysqLi_query($conn,"SET NAMES 'UTF8'");
    }
    else {
        echo 'Ket noi that bai';
    }
?>