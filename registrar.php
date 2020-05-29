<div class="modal" tabindex="-1" role="dialog" id="modalTwo">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="registro.php" method="POST">

            <div class="form-group">
                <label for="nome" style="margin-top:2%;">Nome</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nome">
            </div>

            <div class="form-group">
                <label for="email" style="margin-top:2%;">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <small id="emailHelp" class="form-text text-muted">Seu email não será mostrado a ninguem</small>
            </div>
           

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senhaForca" onkeyup="validarSenhaForca()" name="senha">
                <div id="errorsenha"></div>
            </div>

            <div class="form-group">
                <label for="telefone" style="margin-top:2%;">Telefone</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="telefone">
            </div>
            
           
            <button type="submit" name="registro" value="registro" class="btn btn-primary" style="margin-bottom:2%;">Registrar</button>
      </div>
    </div>
  </div>
</div>