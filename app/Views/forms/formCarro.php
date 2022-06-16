<div class='container div-principal'>
    <form class="container" action=<?= URL . "/carros/insertCarro" ?> method="POST">

        <h3>Cadastro de Carro</h3>

        <div class="form-floating">
            <input type="text" value="<?= $dados['dado']['placa'] ?>" name="placa" class="form-control <?= $dados['erro']['placa'] ? 'is-invalid' : '' ?>" placeholder="Placa">
            <label for="floatingPassword">Placa</label>
            <div class="invalid-feedback">
                <?= $dados['erro']['placa'] ?>
            </div>
        </div>

        <input class='btn btn-primary' type="submit" name="btn" value="Enviar">

    </form>
</div>