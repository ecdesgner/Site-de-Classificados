<?php

    session_start();
    

    if(!empty($_SESSION['active'])){
        header('location: publicarAnuncio.php');

    }else {

    if(!empty($_POST['login'])){

        if(empty($_POST['email']) || empty($_POST['senha'])){

            echo "<script>alert('Todos los campos tiene que estar llenos');</script>";
            
        }else{
            include "config.php";
            
            $email = mysqli_real_escape_string($connect, $_POST['email']);

            $senha = md5(mysqli_real_escape_string($connect, $_POST['senha']));

            $query = mysqli_query($connect, "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");
            $result = mysqli_num_rows($query);
            
            if($result > 0){
                header('location: publicarAnuncio.php');
                $data = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['id'] = $data ['id'];
                $_SESSION['nome'] = $data['nome'];
                $_SESSION['email']= $data['email'];
                $_SESSION['senha']= $data['senha'];
                $_SESSION['telefone'] = $data['telefone'];
                
              
                

            }else{
                echo "<script>alert('Email no existe');</script>";
                session_destroy();
            }

            
        }
    }
}

  


?>

<div class="modal" tabindex="-1" role="dialog" id="modalOne">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>    
      <div class="container">
      <form action="" method="POST">
            <div class="form-group">
                <label for="email" style="margin-top:2%;">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <small id="emailHelp" class="form-text text-muted">Seu email não será mostrado a ninguém</small>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="senha">
            </div>
           
            <button type="submit" name="login" value="login" class="btn btn-primary" style="margin-bottom:2%;">Entrar</button>
            </form></div>
    </div>  
  </div>
</div>