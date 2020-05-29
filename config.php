<?php



    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'classificados';

    $connect = @mysqli_connect($host, $user, $pass,$dbname);

    if(!$connect){
        echo "error";
    }


?>