<?php


    include "config.php";
    if(isset($_GET['user']) AND isset($_GET['token'])){

        $email = mysqli_real_escape_string($connect, $_GET['user']);
        $token = mysqli_real_escape_string($connect, $_GET['token']); 

        $sql = "SELECT tooken FROM usuarios WHERE email = '$email'";
        $resul_sql = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($resul_sql);

        if(isset($_POST['cambio'])){
            if($row['tooken'] == $token){
                if(empty($_POST['sena'])){
                    echo "Ponga una contraseña";
                }else{
                $senha = mysqli_real_escape_string($connect, $_POST['sena']);
                $senha = md5($senha);
                $act = mysqli_query($connect, "UPDATE usuarios SET senha = '$senha', tooken = '' WHERE email = '$email'");

                if($act){
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Cambiaste tu contraseña con exito!')
                    window.location.href='index.php';
                    </SCRIPT>");
                }else{
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Error al cambiar la contraseña, solicite nuevo intento!')
                    window.location.href='index.php';
                    </SCRIPT>");
                }
            }

        }else{
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Intento inválido, o credenciales inválidas en el sistema!')
            window.location.href='index.php';
            </SCRIPT>");
        }

        }

    }else if (!isset($_GET['token']) AND !isset($_GET['user'])) {
        header("Location: index.php");
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="js/index.js"></script>
    <title>Nueva Contraseña</title>
</head>
<body>
    
<div class="container p-4" >
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
        <form action="" method="POST">
        
        <div class="form-group" >
        <h5 style="text-align:center;">Nueva contraseña</h5>
            <label for="exampleInputEmail1">Contraseña</label>
            <input  type="password" class="form-control" id="senhaForca" onkeyup="validarSenhaForca()"  name="sena" placeholder="Su nueva contraseña">
            <div id="errorsenha"></div>
        </div>
        <button type="submit" class="btn btn-primary" name="cambio" value="cambio">Confirmar</button>
        </form>
        </div>
        </div>
        </div>
        </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>