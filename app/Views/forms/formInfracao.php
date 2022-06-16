<div class='container div-principal'>
    <form class="container" action=<?=URL."/infracoes/insertInfracao"?> method="POST">

        <h3>Infracao</h3>
        <div class="form-floating">
            <input value="<?= $dados['dado']['descricao'] ?>" name="descricao" class="form-control <?= $dados['erro']['descricao'] ? 'is-invalid' : '' ?>">
            <label for="floatingPassword">Descricao</label>
            <div class="invalid-feedback">
                <?= $dados['erro']['descricao'] ?>
            </div>
        </div>
        <div class="form-floating">
            <input value="<?= $dados['dado']['pontos'] ?>" name="pontos" class="form-control <?= $dados['erro']['pontos'] ? 'is-invalid' : '' ?>">
            <label for="floatingPassword">Pontos</label>
            <div class="invalid-feedback">
                <?= $dados['erro']['pontos'] ?>
            </div>
        </div>

        <div class="form-floating">
            <input value="<?= $dados['dado']['valor'] ?>" name="valor" class="form-control <?= $dados['erro']['valor'] ? 'is-invalid' : '' ?>">
            <label for="floatingPassword">Valor</label>
            <div class="invalid-feedback">
                <?= $dados['erro']['valor'] ?>
            </div>
        </div>

        <input class='btn btn-primary' type="submit" name="btn" value="Enviar">

    </form>
</div>