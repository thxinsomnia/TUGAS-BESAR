<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'tab_admin';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('gagal terhubung ke database');
    ?>