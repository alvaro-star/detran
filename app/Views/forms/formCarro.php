<div class='container div-principal'>
    <?php if(!(isset($dados['dado']['idtb_carro']) == NULL)): ?>
        <form class="container" action= "<?=URL."/carros/editCarro/".$dados['dado']['idtb_carro']?>" method="POST">
        <h3> Editar o Carro <?=$dados['dado']['placa']?></h3>
    <?php else: ?>
        <form class="container" action= "<?=URL?>/carros/insertCarro" method="POST">
        <h3>Cadastro de Carro</h3>
    <?php endif?>
        <div class="form-floating">
            <input value="<?= $dados['dado']['placa'] ?>" name="placa" class="form-control <?= $dados['erro']['placa'] ? 'is-invalid' : '' ?>" placeholder="Placa">
            <label for="floatingPassword">Placa</label>
            <div class="invalid-feedback">
                <?= $dados['erro']['placa'] ?>
            </div>
        </div>

        <button class="btn btn-primary"> Enviar</button>

    </form>
</div>