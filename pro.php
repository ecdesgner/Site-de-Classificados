<?php

    include "config.php";

    if(isset($_POST['pro'])){

        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $query = "SELECT * FROM usuario_pro WHERE email = '$email'";
        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_array($result);

            $id = $row['id'];
            
        
            $token = uniqid();
            $token_insert = mysqli_query($connect, "UPDATE usuario_pro SET token = '$token' WHERE email = '$email'");

            //Informações para enviar pro email da pessoa
            $email_to = $email;
            $subject = "PlanoPRO agora você já pode publicar seu anuncio PRO clique no link abaixo";

            $mensagem = "Olá agora você ja pode fazer anuncios PRO no EyCvenda\n\n";
            $mensagem = "www.eccompraronline.com/php/publicarAnuncioPro.php?user=".$row['email']."&token=".$token."&id=".$id."\n\n";
            



        }

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="js/pro.js"></script>
    <title>Anuncios PRO</title>
</head>
<body>
    
<div class="container p-4" >
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
        <form action="" method="POST">
        <div class="form-group" >
        <a href="index.php"><button type="button" class="btn btn-info">Voltar</button></a>
        <h5 style="text-align:center; margin-top:5%;">Compre seu anuncio PRO</h5>
        <p style="text-align:center;">Como funciona o anuncioPRO ?</p>
        <small style="margin-top:5%;" id="emailHelp" class="form-text text-muted">
            Certifique-se que antes de comprar o plano, tenha seus anuncios já publicados!
             Seus anuncios ficaram no topo da pagina principal e da sua região!    
        </small><br><hr>
        <p style="color:red;">Importante</p>
        <small style="margin-top:2%;" id="emailHelp" class="form-text text-muted">Lembre-se que no momento de fazer a compra, utilize o mesmo email que utiliza em nossa pagina</small>
        </div>
        <hr>
        <div style="text-align:center">
         <!-- INICIO DO BOTAO PAGSEGURO --><a href="https://pag.ae/7V-_Pmcg9/button" target="_blank" title="Pagar com PagSeguro"><img src="//assets.pagseguro.com.br/ps-integration-assets/botoes/pagamentos/95x45-pagar.gif" alt="Pague com PagSeguro - é rápido, grátis e seguro!" /></a><!-- FIM DO BOTAO PAGSEGURO -->
        </div>
        <small style="margin-top:5%;" id="emailHelp" class="form-text text-muted">*Na hora da compra utilize o mesmo email que você utilizar em nossa plataforma! Qualquer enventualidade ou duvida, entrar em contato com nosso suporte!</small>
        </form>
        </div>
        </div>
        </div>
        </div>
    

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>