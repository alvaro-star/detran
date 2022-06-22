    <div class='container div-principal '>

    <?php if(!(isset($dados['dado']['idtb_multa']) == NULL)): ?>
        <form class="container text-center" action= "<?=URL."/multas/edit/".$dados['dado']['idtb_multa']?>" method="POST">
        <h3> Editar a multa <?=$dados['dado']['idtb_multa']?></h3>
    <?php else: ?>
            <form class="container text-center" action=<?= URL . "/multas/insert" ?> method="POST">
            <h3>Multa</h3>
    <?php endif?>

            <select name='ano' class="form-select form-select-lg mb-3 <?= $dados['erro']['ano'] ? 'is-invalid' : '' ?>" aria-label=".form-select-lg example">
                <?php for ($i = date('Y'); $i > 1000; $i--) : ?>
                    <option <?= ($i == $dados['dado']['ano']) ? 'selected' : '' ?> value= <?=$i ?>> <?= $i ?> </option>
                <?php endfor ?>
            </select>

            <div class="form-floating">
                <input value="<?= $dados['dado']['cidade'] ?>" name="cidade" class="form-control <?= $dados['erro']['cidade'] ? 'is-invalid' : '' ?>" placeholder="Cidade">
                <label for="floatingPassword">Cidade</label>
                <div class="invalid-feedback">
                    <?= $dados['erro']['cidade'] ?>
                </div>
            </div>

            <!-- Funcao do php-->

            <select name='idtb_carro' class="form-select form-select-lg mb-3 <?= $dados['erro']['idtb_carro'] ? 'is-invalid' : '' ?>" aria-label=".form-select-lg example">
                <option value=''> Escolha um carro...</option>
                <?php foreach ($dados['carros'] as $carro) : ?>
                    <option <?= ($carro->idtb_carro == $dados['dado']['idtb_carro']) ? 'selected' : '' ?> value= <?=$carro->idtb_carro ?>> <?= $carro->placa ?> </option>
                <?php endforeach ?>
            </select>

            <select name='idtb_infracao' class="form-select form-select-lg mb-3 <?= $dados['erro']['idtb_infracao'] ? 'is-invalid' : '' ?>" aria-label=".form-select-lg example">
                <option value=''> Escolha uma infracao...</option>
                <?php foreach ($dados['infracoes'] as $infracao) : ?>
                    <option <?= ($infracao->idtb_infracao == $dados['dado']['idtb_infracao']) ? 'selected' : '' ?> value = <?= $infracao->idtb_infracao ?> > <?= $infracao->descricao ?> </option>
                <?php endforeach ?>
            </select>

            <button class="btn btn-primary"> Enviar</button>

        </form>
    </div>