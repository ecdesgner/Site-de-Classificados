<?php
include_once "config.php";
    session_start();
    //Comando abaixo para mostrar oque a sessão esta retornando
    //print_r($_SESSION);
    //Se não existe essa session então reenvia para index ou login
    
	if(empty($_SESSION['active'])){
		header('location: index.php');
    }else{

    if(!empty($_POST)){
            
        if(empty($_POST['titulo']) || empty($_POST['descricao']) || empty($_POST['valor']) || empty($_POST['region']) || empty($_POST['comuna'])){
            echo "<script>alert('Llene todos los campos');</script>";

        }else{

      
            
            //Metodo para guardar fotos nos banco de dados
            $nom = $_REQUEST['txtnom'];
            $foto = $_FILES['foto']['name'];
            $ruta = $_FILES['foto']['tmp_name'];
            $destino = "images/".$foto;
            copy($ruta,$destino);

            //Dados dos anuncios
            $id_usuario = $_SESSION['id'];
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $pais = $_POST['paisnome'];
            $id_pais = $_POST['pais'];
            $region = $_POST['region'];
            $comuna = $_POST['comuna'];
            $valor = $_POST['valor'];  
            $telefone = $_SESSION['telefone'];
            

            
            

         

           
            //Inserção dos anuncios no banco de dados
            $result_anuncios = mysqli_query($connect, "INSERT INTO anuncios(id_usuario, id_pais, nome_foto, foto, titulo, descricao, pais, region, comuna, valor, telefone,hora) VALUES('$id_usuario', '$id_pais', '$nom', '$destino', '$titulo', '$descricao', '$pais', '$region', '$comuna', '$valor','$telefone', now())");
           
            

            //Alerta para o resultado da inserção
            if($result_anuncios){
                echo "<script>alert('sucesso');</script>";
            }else{
                echo "<script>alert('Erro:');</script>";
            }


           


        }
   }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/publicarAnuncio.css">
    <script src="publicarAnuncio.js"></script>
    <script src="https://kit.fontawesome.com/6c8c0396d5.js" crossorigin="anonymous"></script>
    <title>Anunciar</title>
</head>


<body>
<header>
    <div class="container" >
        <div class="row">
            <div class="col-md-8" style="margin-top:12px;">
                <img id="logo" src="imgIndex/logo.png">
                <span class="user" id="bemvindo">Bem vindo <?php echo $_SESSION['nome']; ?></span>
            </div>  
            <div class="col-md-4" style="margin-top:2%; text-align:left;">
                <div class="btnInicio" >
                <button type="button" class="btn btn-danger"><a style="color:white;" href="sair.php">Sair</a></button>
                </div>    
            </div>
        </div>
    </div>
    </header>


    <div class="modal" tabindex="-1" role="dialog" id="anuncio">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Publicar seu anuncio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
    
      <div class="container">
      <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <input type="hidden" class="form-control" id="exampleInputtitulo1" aria-describedby="emailHelp" name="id_usuario">
            </div>

            <div class="form-group">
                <label for="titulo" style="margin-top:2%;">Titulo</label>
                <input type="text" class="form-control" id="exampleInputtitulo1" aria-describedby="emailHelp" name="titulo" placeholder="Titulo">
            </div>

         
            <div class="form-group">
                <label for="descricao" style="margin-top:2%;">Descrição</label><br>
                <input type="text"  class="form-control" id="exampleInputdescricao1" aria-describedby="emailHelp"  name="descricao" placeholder="Descriptión">
            </div>

            <div class="form-group">
                <label for="descricao" style="margin-top:2%;">Estado</label><br>
                <input type="text"  class="form-control" id="exampleInputdescricao1" aria-describedby="emailHelp"  name="paisnome" placeholder="Estado">
            </div>


         
          <?php 
            $query_pais = mysqli_query($connect, "SELECT * FROM pais");
            $resul_pais = mysqli_num_rows($query_pais);
          ?>
                <select value="pais" name="pais">
          <?php
            if($resul_pais > 0){
                while($respais=mysqli_fetch_array($query_pais)){?>
                   
                        <option value="<?php echo $respais['id']; ?>"><?php echo $respais['pais']; ?></option>
                  
        <?php }
            }
        ?>

            </select>

            <div class="form-group">
            <label for="region" style="margin-top:2%;">Cidade</label><br>
                <input type="text" class="form-control" id="exampleInputdescricao1" aria-describedby="emailHelp" name="region" placeholder="Cidade">
                <small id="emailHelp" class="form-text text-muted">Exemplo: Ribeirão Preto</small>
            </div>

            <div class="form-group">
            <label for="comuna"  style="margin-top:2%;">Região</label><br>
                <input type="text" class="form-control" id="exampleInputdescricao1" aria-describedby="emailHelp" name="comuna" placeholder="Região da cidade">
                <small id="emailHelp" class="form-text text-muted">Exemplo: Centro, nome do bairro</small>
            </div>


  


            
            <div class="form-group">
            <label type="hidden" for="descricao" style="margin-top:2%;">Foto</label>
            <input type="hidden" class="form-control" id="exampleInputdescricao1" aria-describedby="emailHelp" name="txtnom">
            <input type="file" style="padding-bottom:8%;" class="form-control" id="exampleInputdescricao1" aria-describedby="emailHelp" name="foto">
            <small id="emailHelp" class="form-text text-muted">*Foto obrigatório caso contrario será eliminado</small>
            </div>

            <div class="form-group">
                <label for="valor" style="margin-top:3%;">Preço</label>
                <input type="text" class="form-control" id="exampleInputdescricao1" aria-describedby="emailHelp" name="valor" placeholder="Preço">
            </div>        
            <button type="submit" class="btn btn-primary" style="margin-bottom:2%;">Publicar</button>
            </form></div>
    </div>  
  </div>
</div>





<div class="container" style="margin-top:8%; ">
<div class="row">
    <div class="col-3" id="tituloPublicar"><h3>Publica seu anuncio</h3>
    <button id="btnpublicar" type="button" class="btn btn-success" data-toggle="modal" data-target="#anuncio">Publica seu anuncio</button>
</div>

<div class="col-md-9" id="tabela" style="overflow-y:scroll;">
    <div class="row">
           <table id="tabela2">
                <thead class="table table-bordered" >
                    <h3>Seus anuncios</h3>
                    <tr >
                        <th>Foto</th>
                        <th>Titulo</th>
                        <th>Descrição</th>
                        <th>Pais</th>
                        <th>Estado</th>
                        <th>Cidade</th>
                        <th>Preço</th>
                        <th>Telefono</th>
                        <th>Ações</th>
                     </tr>

                </thead>
                <tbody >
                <?php
                    require "config.php";
                    include "deletarAnuncio.php";
                    $id_usuario = $_SESSION['id'];

                    $sql = mysqli_query($connect, "SELECT * FROM anuncios WHERE id_usuario = '$id_usuario' ORDER BY hora DESC ");
                   

               
                    while($res=mysqli_fetch_array($sql)){?>
                       
                            <tr >
                                <td><?php echo '<img src ="'.$res["foto"].'" width="100px" heigth="100px">'; ?></td>
                                <td><?php echo $res['titulo'] ?></td>
                                <td style="word-wrap:break-word;"><?php echo $res['descricao'] ?><br></td>
                                <td style="word-wrap:break-word;"><?php echo $res['pais'] ?><br></td>
                                <td style="word-wrap:break-word;"><?php echo $res['region'] ?><br></td>
                                <td style="word-wrap:break-word;"><?php echo $res['comuna'] ?><br></td>
                                <td style="word-wrap:break-word;">$<?php echo $res['valor'] ?></td>
                                <td><?php echo $res['telefone'] ?></td>
                                
                                <td>
                                    <a href="deletarAnuncio.php?id=<?php echo $res['id'] ?>" class="btn btn-danger" ><i class="fas fa-trash-alt"></i></a>
                                    <a href="editarAnuncio.php?id=<?php echo $res['id'] ?>"  class="btn btn-primary" ><i class="fas fa-edit"></i></a>
                                   
                                </td>
                            </tr>
                        
                <?php } ?>
                  <tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
 </div>







<!--<div class="titulo_anuncio" style="text-align:center;">-->
    <!--</*?php
         require "config.php";

         $sql = mysqli_query($connect, "SELECT * FROM anuncios");
         while($res=mysqli_fetch_array($sql)){
         echo $res['titulo'];
        }
    ?>-->


  
      
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>