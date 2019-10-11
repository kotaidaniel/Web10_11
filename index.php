<?php
    $username = "root";
    $password = "";
    $dbname = "webshop";
    $servername = "localhost";

    $conn = mysqli_connect($servername, $password, $dbname, $servername);

    if($conn ->connect_error){
        die("fail".$conn->connect_error);
    }

    $sql = "SELLECT * from products";
    $result = $conn->query($sql);
    var_dump($result);

?>
