<div class='container div-principal formulario'>

    <?php if (!(isset($dados['dado']['idtb_infracao']) == NULL)) : ?>
        <div class="borda">
            <form class="container text-center" action="<?= URL . "/infracoes/edit/" . $dados['dado']['idtb_infracao'] ?>" method="POST">
                <h3> Editar <?= $dados['dado']['descricao'] ?></h3>
            <?php else : ?>
                <div>
                    <form class="container text-center" action="<?= URL . "/infracoes/insert" ?>" method="POST">
                        <h3>Infracao</h3>
                    <?php endif ?>

                    <div class="form-floating">
                        <input value="<?= $dados['dado']['descricao'] ?>" name="descricao" class="form-control <?= $dados['erro']['descricao'] ? 'is-invalid' : 'input' ?>" placeholder="Descricao">
                        <label for="floatingPassword">Descricao</label>
                        <div class="invalid-feedback">
                            <?= $dados['erro']['descricao'] ?>
                        </div>
                    </div>

                    <div class="form-floating">
                        <input value="<?= $dados['dado']['pontos'] ?>" name="pontos" class="form-control <?= $dados['erro']['pontos'] ? 'is-invalid' : 'input' ?>" placeholder="Pontos">
                        <label for="floatingPassword">Pontos</label>
                        <div class="invalid-feedback">
                            <?= $dados['erro']['pontos'] ?>
                        </div>
                    </div>

                    <div class="form-floating">
                        <input value="<?= $dados['dado']['valor'] ?>" name="valor" class="form-control <?= $dados['erro']['valor'] ? 'is-invalid' : 'input' ?>" placeholder="Valor">
                        <label for="floatingPassword">Valor</label>
                        <div class="invalid-feedback">
                            <?= $dados['erro']['valor'] ?>
                        </div>
                    </div>

                    <button class="btn btn-primary">Enviar</button>

                    </form>
                </div>
        </div>