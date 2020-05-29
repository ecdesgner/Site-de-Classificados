<?php

    include "config.php";


    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM anuncios WHERE id = $id";
        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_array($result);

            $foto = $row['foto'];
            $titulo = $row['titulo'];
            $descricao = $row['descricao'];
            $pais = $row['pais'];
            $region = $row['region'];
            $comuna = $row['comuna'];
            $valor = $row['valor'];
            $telefone = $row['telefone'];
        }
    }


    if(isset($_POST['update'])) {
        
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $pais = $_POST['paisnome'];
        $region = $_POST['region'];
        $comuna = $_POST['comuna'];
        $valor = $_POST['valor'];
        $telefone = $_POST['telefone'];

        $query = "UPDATE anuncios set titulo = '$titulo', descricao = '$descricao', pais = '$pais', region = '$region', comuna = '$comuna', valor = '$valor', telefone = '$telefone' WHERE id = '$id'";
       

        mysqli_query($connect, $query);
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Datos actualizado con suceso!')
        window.location.href='publicarAnuncio.php';
        </SCRIPT>");


    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar seu anuncio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="js/editaAnuncio.js"></script>
</head>

<body>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
        <form action="editarAnuncio.php?id=<?php echo $_GET['id']; ?>" method="POST">

        <div class="form-group" >
            <h2 style="text-align:center; color:#13BDEB; margin-bottom:10%;" >Atualizar datos</h2>
            <label for="exampleInputEmail1">Titulo</label>
            <input type="text" class="form-control" name="titulo" value="<?php echo $titulo; ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Descrição</label>
            <input type="text" class="form-control"  name="descricao" value="<?php echo $descricao; ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Estado</label>
            <input type="text" class="form-control"  name="paisnome" value="<?php echo $pais; ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Cidade</label>
            <input type="text" class="form-control"  name="region" value="<?php echo $region; ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Região
            </label>
            <input type="text" class="form-control"  name="comuna" value="<?php echo $comuna; ?>">
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">Valor</label>
            <input type="text" class="form-control"  name="valor" value="<?php echo $valor; ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Telefone</label>
            <input type="text" class="form-control"  name="telefone" value="<?php echo $telefone; ?>">
        </div>
        
        
        <button type="submit" class="btn btn-primary" name="update">Actualizar dados</button>
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

