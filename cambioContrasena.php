<?php
    include_once "config.php";

     if(isset($_POST['cambiar'])){
        
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = mysqli_query($connect, $query);

        
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_array($result);
            $token = uniqid();
            $act = mysqli_query($connect, "UPDATE usuarios SET tooken = '$token' WHERE email = '$email'");

            $email_to = $email;
            $subject = "Cambio constraseña";
            
            $email_menssage = "Hola ".$row['email'].", has solicitado cambiar tu contraseña, accede al seguiente link\n\n";
            $email_menssage = "www.eccompraronline.com/php/nuevasena.php?user=".$row['email']."&token=".$token."\n\n";
            @mail($email_to,$subject,$email_menssage);

             echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Le enviamos un correo electrónico para cambiar su contraseña.')
                    </SCRIPT>");

        }else {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Email inválido')
            window.location.href='index.php';
            </SCRIPT>");
        }
        
        
     }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar senha</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="js/editaAnuncio.js"></script>
</head>

<body>

    <div class="container p-4" >
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
        <form action="cambioContrasena.php" method="POST">
        
        <div class="form-group" >
        <h5 style="text-align:center;">Confirme sua conta</h5>
            <label for="exampleInputEmail1">Email</label>
            <input  type="text" class="form-control"  name="email" placeholder="Confirme su email">
        </div>
        <button type="submit" class="btn btn-primary" name="cambiar">Confirmar</button>
        </form>
        </div>
        </div>
        </div>
        </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>