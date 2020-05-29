<?php

    include "config.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM anuncios WHERE id = $id";
        $result = mysqli_query($connect, $query);
        if(!$result){
            die("Error ao deletar");
        }
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Deletado con sucesso')
        window.location.href='publicarAnuncio.php';
        </SCRIPT>");
           
    }
?>