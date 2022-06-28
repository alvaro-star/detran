<div class='container div-principal formulario'>
        <form class="container text-center" action = <?=((isset($dados['dado']['idtb_carro']) == NULL)) ? URL."/Carros/insert/" : URL."/Carros/edit/".$dados['dado']['idtb_carro']."/" ?> method="POST">
        <h3> <?= ((isset($dados['dado']['idtb_carro']) == NULL)) ? 'Cadastro de Carro' : "Editar ".$dados['dado']['placa']?> </h3>

        <div class="form-floating">
            <input value="<?= $dados['dado']['nome'] ?>" name="nome" class="form-control <?= $dados['erro']['nome'] ? 'is-invalid' : 'input' ?> mb-3" placeholder="Nome">
            <label for="floatingPassword">Nome</label>
            <div class="invalid-feedback">
                <?= $dados['erro']['nome'] ?>
            </div>
        </div>

        <div class="form-floating">
            <input value="<?= $dados['dado']['placa'] ?>" name="placa" class="form-control <?= $dados['erro']['placa'] ? 'is-invalid' : 'input' ?>" placeholder="Placa">
            <label for="floatingPassword">Placa</label>
            <div class="invalid-feedback">
                <?= $dados['erro']['placa'] ?>
            </div>
        </div>

        <button class="btn btn-primary">Enviar</button>

    </form>
</div>