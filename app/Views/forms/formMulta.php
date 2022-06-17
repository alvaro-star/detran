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
            
            <label>Carro da Multa</label>
            <select name = 'idtb_carro' class = 'selectMulta form-select' aria-label='Default select example'>
                <option value='' > Escolha um carro...</option>
                <?php foreach ($dados['carros'] as $carro) : ?>
                    <option value='<?=$carro->idtb_carro?>' > <?=$carro->placa;?>  </option>
                <?php endforeach ?>
            </select>

            <label>Infração da Multa</label>
            <select name = 'idtb_infracao' class = 'selectMulta form-select' aria-label='Default select example'>
            <option value=''> Escolha uma infracao...</option>
                <?php foreach ($dados['infracoes'] as $infracao) : ?>
                    <option value = '<?=$infracao->idtb_infracao?>' > <?=$infracao->descricao?></option>
                <?php endforeach ?>
            </select>

            <input class='btn btn-primary' type="submit" name="btn" value="Enviar">

        </form>
    </div>