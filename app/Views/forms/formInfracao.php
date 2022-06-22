<div class='container div-principal'>

<?php if(!(isset($dados['dado']['idtb_infracao']) == NULL)): ?>
        <form class="container text-center" action= "<?=URL."/infracoes/editInfracao/".$dados['dado']['idtb_infracao']?>" method="POST">
        <h3> Editar o Carro <?=$dados['dado']['descricao']?></h3>
    <?php else: ?>
        <form class="container text-center" action=<?= URL . "/infracoes/insertInfracao" ?> method="POST">
            <h3>Infracao</h3>
    <?php endif?>

        <div class="form-floating">
            <input value="<?= $dados['dado']['descricao'] ?>" name="descricao" class="form-control <?= $dados['erro']['descricao'] ? 'is-invalid' : '' ?>" placeholder="Descricao">
            <label for="floatingPassword">Descricao</label>
            <div class="invalid-feedback">
                <?= $dados['erro']['descricao'] ?>
            </div>
        </div>

        <div class="form-floating">
            <input value="<?= $dados['dado']['pontos'] ?>" name="pontos" class="form-control <?= $dados['erro']['pontos'] ? 'is-invalid' : '' ?>" placeholder="Pontos">
            <label for="floatingPassword">Pontos</label>
            <div class="invalid-feedback">
                <?= $dados['erro']['pontos'] ?>
            </div>
        </div>

        <div class="form-floating">
            <input value="<?= $dados['dado']['valor'] ?>" name="valor" class="form-control <?= $dados['erro']['valor'] ? 'is-invalid' : '' ?>" placeholder="Valor">
            <label for="floatingPassword">Valor</label>
            <div class="invalid-feedback">
                <?= $dados['erro']['valor'] ?>
            </div>
        </div>

        <button class="btn btn-primary"> Enviar</button>

    </form>
</div>