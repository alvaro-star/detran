<div class="col-xl-4 col-md-6 mx-auto p-5 text-center">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <?= (isset($dados['dado']['idtb_multa']) == NULL) ? 'Cadastro de Multa' : "Editar " . $dados['dado']['idtb_multa'] ?>
        </div>
        <div class="card-body">
            <?= Sessao::mensagem('usuario') ?>
            <p class="card-text"><small class="text-muted">Informe os Dados</small></p>

            <form method="POST" action=<?= (isset($dados['dado']['idtb_multa']) == NULL) ? URL . "/multas/insert" : URL . "/multas/edit/" . $dados['dado']['idtb_multa'] ?> class="mt-4">

                <div class="form-group">
                    <label for="ano"><sup class="text-danger">*</sup> Ano <sup class="text-danger">*</sup></label>
                    <select name="ano" id="ano" class="form-control <?= $dados['erro']['ano'] ? 'is-invalid' : '' ?>">
                        <?php for ($i = date('Y'); $i >= 1990; $i--) : ?>
                            <option <?= ($i == $dados['dado']['ano']) ? 'selected' : '' ?> value=<?= $i ?>> <?= $i ?> </option>
                        <?php endfor ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cidade"><sup class="text-danger">*</sup> Cidade <sup class="text-danger">*</sup></label>
                    <input type="text" name="cidade" id="cidade" value="<?= $dados['dado']['cidade'] ?>" class="form-control  <?= $dados['erro']['cidade'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['erro']['cidade'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="idtb_carro"><sup class="text-danger">*</sup> Valor <sup class="text-danger">*</sup></label>
                    <select name="idtb_carro" id="idtb_carro" class="form-control  <?= $dados['erro']['idtb_carro'] ? 'is-invalid' : '' ?>">
                        <option value=''> Escolha um carro...</option>
                        <?php foreach ($dados['carros'] as $carro) : ?>
                            <option <?= ($carro->idtb_carro == $dados['dado']['idtb_carro']) ? 'selected' : '' ?> value=<?= $carro->idtb_carro ?>> <?= $carro->placa ?> </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="idtb_infracao"><sup class="text-danger">*</sup> Ano <sup class="text-danger">*</sup></label>
                    <select name="idtb_infracao" id="idtb_infracao" class="form-control <?= $dados['erro']['idtb_infracao'] ? 'is-invalid' : '' ?>">
                        <option value=''> Escolha uma infracao...</option>
                        <?php foreach ($dados['infracoes'] as $infracao) : ?>
                            <option <?= ($infracao->idtb_infracao == $dados['dado']['idtb_infracao']) ? 'selected' : '' ?> value=<?= $infracao->idtb_infracao ?>> <?= $infracao->descricao ?> </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="row">
                    <div class="">
                        <input type="submit" value="Enviar" class="btn btn-info btn-block">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>