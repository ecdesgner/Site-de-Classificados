
<?php
    include "config.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM anuncios WHERE id = $id";
        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) === 1){  

            $row = mysqli_fetch_array($result);

            $titulo = $row['titulo'];
            $descricao = $row['descricao'];
            $valor = $row['valor'];
            $telefone = $row['telefone'];
        
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6c8c0396d5.js" crossorigin="anonymous"></script>
    <script src="js/detallesAnuncio.js"></script>
    <title>Detalhes do anuncio</title>
</head>
<body>
    
<div class="container p-4">
    <button onclick="goBack()" type="button" class="btn btn-info">Voltar</button>
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
        <form>
        <div class="form-group" >
            <h2 style="text-align:center; color:#13BDEB; margin-bottom:10%;" >Detalhes do anuncio</h2>

            <?php 
                $sql = mysqli_query($connect, "SELECT * FROM anuncios WHERE id = '$id'");
              

       
                while($res=mysqli_fetch_array($sql)){?>

                <div class="text-center">
                    <?php echo '<img src ="'.$res["foto"].'" width="300px" heigth="300px">'; ?>
                    <?php echo $res['hora']; ?>
                    <hr/>
                        <h2><?php echo $res['titulo']; ?></h2>
                    <hr/>
                        <p><i class="fas fa-dollar-sign"></i><?php echo $res['valor']; ?></p>
                    <hr/>
                        <h5>Descrição</h5>
                    <?php echo $res['descricao']; ?><br>
                    <hr/>
                        <h5>Local</h5>
                    <?php echo $res['pais']; ?>    
                    <?php echo $res['region']; ?>
                    <?php echo $res['comuna']; ?>
                    <hr/>
                    <?php echo $res['telefone']; ?>
                    
                </div>
            <?php }?>
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