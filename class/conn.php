<?php

 try {

        $con = new PDO('mysql:host=localhost;dbname=cari_magang', 'root', '', array(PDO::ATTR_PERSISTENT => true));
    } catch (PDOException $e) {

        echo $e->getMessage();
    }

    include_once 'php_oop.php';

    $user = new Oop($con);

?>

