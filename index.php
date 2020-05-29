<?php include "login.php"?>
<?php include "registrar.php"?>
<?php include "includes/header.php" ?>
<?php

  sleep(1);

  

    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;


    include "config.php";
    $sql = mysqli_query($connect, "SELECT * FROM anuncios ORDER BY hora DESC" );


    //Contar anuncios
    $total_anuncios = mysqli_num_rows($sql);

    //Setar quantidade de anuncios por pagina
    $quantidade_pagina = 50;

    //Calcular o numero de paginas necessarias para aprensentar os anuncios 
    $num_paginas = ceil($total_anuncios/$quantidade_pagina);

    //Calcular o inicio da visualização
    $inicio = ($quantidade_pagina*$pagina)-$quantidade_pagina;

    //Selecionar os anuncios a serem apresentados na página 
    $result_anuncio = "SELECT * FROM anuncios ORDER BY hora DESC limit $inicio, $quantidade_pagina";
    $resultado_anuncios = mysqli_query($connect, $result_anuncio);
    $total_anuncios = mysqli_num_rows($resultado_anuncios );


?>


<!---Anuncios PRO--->
<?php
  include "config.php";
  $sql_pro = "SELECT * FROM anuncios WHERE id_usuario = 2";
  $result_pro = mysqli_query($connect, $sql_pro);

while($pro=mysqli_fetch_array($result_pro)){?>


<?php }?>

<!--Fim anuncios Pro-->



<!---Categoria---->
<?php
      include "config.php";
      $sql_categoria = mysqli_query($connect, "SELECT * FROM categorias");
      $sql_pais = mysqli_query($connect, "SELECT * FROM pais");
?>
<div class="container" >
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  </div>
  <div class="btn-group" style="margin-top:2%;">
  <button style="color:white;" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Todo Brasil
  </button>
  <div class="dropdown-menu" >
    <a class="dropdown-item" href="paginaPaises/acre.php">Acre</a>
    <a class="dropdown-item" href="paginaPaises/alagoas.php">Alagoas</a>
    <a class="dropdown-item" href="paginaPaises/amapa.php">Amapá</a>
    <a class="dropdown-item" href="paginaPaises/amazonas.php">Amazonas</a>
    <a class="dropdown-item" href="paginaPaises/bahia.php">Bahia</a>
    <a class="dropdown-item" href="paginaPaises/ceara.php">Ceará</a>
    <a class="dropdown-item" href="paginaPaises/brasilia.php">Brasilia</a>
    <a class="dropdown-item" href="paginaPaises/espirito.php">Espirito Santo</a>
    <a class="dropdown-item" href="paginaPaises/goias.php">Goiás</a>
    <a class="dropdown-item" href="paginaPaises/maranhao.php">Maranhão</a>
    <a class="dropdown-item" href="paginaPaises/matog.php">Mato Grosso</a>
    <a class="dropdown-item" href="paginaPaises/matos.php">Mato Grosso do Sul</a>
    <a class="dropdown-item" href="paginaPaises/minas.php">Minas Gerais</a>
    <a class="dropdown-item" href="paginaPaises/para.php">Pará</a>
    <a class="dropdown-item" href="paginaPaises/paraiba.php">Paraiba</a>
    <a class="dropdown-item" href="paginaPaises/parana.php">Paraná</a>
    <a class="dropdown-item" href="paginaPaises/pernambuco.php">Pernambuco</a>
    <a class="dropdown-item" href="paginaPaises/piaui.php">Piauí</a>
    <a class="dropdown-item" href="paginaPaises/rion.php">Rio Grande do Norte</a>
    <a class="dropdown-item" href="paginaPaises/sios.php">Rio Grande do Sul</a>
    <a class="dropdown-item" href="paginaPaises/rioj.php">Rio de Janeiro</a>
    <a class="dropdown-item" href="paginaPaises/rondônia.php">Rondônia</a>
    <a class="dropdown-item" href="paginaPaises/roraima.php">Roraima</a>
    <a class="dropdown-item" href="paginaPaises/santa.php">Santa Catarina</a>
    <a class="dropdown-item" href="paginaPaises/sao.php">São Paulo</a>
    <a class="dropdown-item" href="paginaPaises/sergipe.php">Sergipe</a>
    <a class="dropdown-item" href="paginaPaises/tocantins.php">Tocantins</a>
  </div>
</div>
</div>    
</div>
</div>

<div class="container" style="margin-bottom:2%;">
<small class="text-muted">Busque os anuncios de todo o Brasil<br> Filtre melhor seus anuncios</small>
</div>


<!----Fim Categoria---->

<!--Anuncios PROS-->

<div class="container">
<div class="row">

<div class="col-md-4">
   
    <div class="card" style="padding:5%;">
    <h1 style="color:green;">Anuncios PRO</h1>
      <p class="card-text">Porque ter anuncios pro? Os anuncios pros, sempre apareceram em primeiro lugar na pagina
        principal e na pagina de seu estado e região! Lhe garante mais visibilidade para as pessoas, fazendo com que venda mais rapido!
        Aproveite a oportunidade de Vender online! com ECC!
      </p>
    </div>
</div>

<div class="col-md-8">

<?php 
  $sql_pro = "SELECT * FROM anuncios WHERE id_usuario IN (2) ";
  
  $sql_pro_result = mysqli_query($connect, $sql_pro);

  while($pro=mysqli_fetch_array($sql_pro_result)){?>
    
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
        
          <div class="col-md-4">
               <?php echo '<img  class="card-img" src ="'.$pro["foto"].'" width="300px" heigth="100px">'; ?>
               <p style="color:green; margin-left:5%; font-weight:bold;">PRO</p>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?php echo $pro['titulo']; ?></h5>
              <p class="card-text"><?php echo $pro['descricao']; ?></p>
              <p class="card-text"><?php echo $pro['region']; ?></p>
              <p class="card-text"><?php echo $pro['comuna']; ?></p>
              <p class="card-text"><small class="text-muted"><?php echo $pro['hora']; ?></small></p>
              <a  href="detallesAnuncio.php?id=<?php echo $pro['id'] ?>"  class="btn btn-primary" >Detalhes</a>
            </div>
          </div>
  </div>
</div>
 
<?php } ?>
</div>
</div>
</div>
</div>
</div>
<hr>








<!---Mostrando anuncios--->
<div class="row">
   <div class="col-md-4">
          <div style="margin-left: 15%;" class="card text-white bg-primary mb-3" style="max-width: 25rem;">
            <div class="card-header"></div>
          <div class="card-body">
          <h5 class="card-title">Vender online com ECC</h5>
        <p class="card-text">Em EyC é muito facil anunciar e rapido, você pode anunciar para todo o pais, tente agora mesmo, regristre-se e começe a vender online!</p>
        </div>
      </div>
          

      <div style="margin-left:5%;" class="card text-white bg-warning mb-3" style="max-width: 25rem;">
            <div class="card-header"></div>
          <div class="card-body">
          <h5 class="card-title">Como funciona ?</h5>
        <p class="card-text">Entre em contato com o anunciante e faça um bom negocio!</p>
        </div>
      </div>

      </div>
      <div class="col-md-8">

  
      <?php  
      //Mostrando anuncios na pagina principal

    while($res=mysqli_fetch_array($resultado_anuncios)){?>
  <div class="container" style="text-align:center;" >
    <div class="row">
    <div class="card mb-3" style="max-width: 450px;">
  <div class="row no-gutters" >
  <div class="col-md-8" >
      <div style="padding:10px;"><?php echo '<img src ="'.$res["foto"].'" width="300px" heigth="100px">'; ?></div>
      <p style="padding:10px;" class="card-text"><small class="text-muted"><?php echo $res['hora'] ?></small></p>
    </div>
    <div class="col-md-4" style="padding:10px;">
      <div class="card-body">
        <h5 class="card-title"><?php echo $res['titulo'] ?></h5>
        <hr>
        <p class="card-text"><i class="fas fa-dollar-sign"></i><?php echo $res['valor'] ?></p>
        <hr>
        <p class="card-text"></i><?php echo $res['pais'] ?></p>
        <p class="card-text"></i><?php echo $res['region'] ?></p>
        <p class="card-text"></i><?php echo $res['comuna'] ?></p>
        <hr>
        <a  href="detallesAnuncio.php?id=<?php echo $res['id'] ?>"  class="btn btn-primary" >Detalhes</a>
      </div>
    </div>
  </div>
</div>
  </div> 
</div>

<?php } ?>
 </div>
</div>
<!--Fim mostrando anuncios--->   



 
      

  

     
      
      


      <!---Sistema de paginação---->
      <?php 
        $pagina_anterior = $pagina - 1;
        $pagina_posterior = $pagina +1;
      ?>

        <nav aria-label="Page navigation example" class="pagination justify-content-center">
      <ul class="pagination" >
        <li class="page-item">
          <?php
              if($pagina_anterior != 0){?>
                <a class="page-link" href="index.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>

              <?php } else{?>
                  
             <?php } ?>
         </li>
          <?php
            //Apresentar paginação
              for($i=1; $i < $num_paginas + 1; $i++){?>
                <li class="page-item"><a class="page-link" href="index.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                <?php }?>
          <li class="page-item">
          <?php
              if($pagina_posterior <= $num_paginas){?>
                <a class="page-link" href="index.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
                <span aria-hidden="true">&raquo;</span>
              </a>
              <?php } else{?>
                  
             <?php } ?>
          </li>
      </ul>
    </nav>
<!---Fim do sistema de paginação---->
<?php include "includes/footer.php" ?>



