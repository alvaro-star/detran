    <div class='container div-principal'>
        <form class="container" action=<?= URL . "/multas/insertMulta" ?> method="POST">

            <h3>Multa</h3>
            <div class="form-floating">
                <input value="<?= $dados['dado']['ano'] ?>" name="ano" class="form-control <?= $dados['erro']['ano'] ? 'is-invalid' : '' ?>" placeholder="Ano">
                <label for="floatingPassword">Ano</label>
                <div class="invalid-feedback">
                    <?= $dados['erro']['ano'] ?>
                </div>
            </div>

            <div class="form-floating">
                <input value="<?= $dados['dado']['cidade'] ?>" name="cidade" class="form-control <?= $dados['erro']['cidade'] ? 'is-invalid' : '' ?>" placeholder="Cidade">
                <label for="floatingPassword">Cidade</label>
                <div class="invalid-feedback">
                    <?= $dados['erro']['cidade'] ?>
                </div>
            </div>

            <!-- Funcao do php-->

            <select name='idtb_carro' class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option value=''> Escolha um carro...</option>
                <?php foreach ($dados['carros'] as $carro) : ?>
                    <option <?=($carro->idtb_carro == $dados['dado']['idtb_carro']) ? 'selected': ''?> value='<?= $carro->idtb_carro ?>'> <?= $carro->placa; ?> </option>
                <?php endforeach ?>
            </select>

            <select name='idtb_infracao' class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option value=''> Escolha uma infracao...</option>
                <?php foreach ($dados['infracoes'] as $infracao) : ?>
                    <option <?=($infracao->idtb_infracao == $dados['dado']['idtb_infracao']) ? 'selected': ''?> value='<?= $infracao->idtb_infracao ?>'> <?= $infracao->descricao ?></option>
                <?php endforeach ?>
            </select>

            <input class='btn btn-primary' type="submit" name="btn" value="Enviar">

        </form>
    </div>