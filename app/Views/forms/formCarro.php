<div class="col-xl-4 col-md-6 mx-auto p-5 text-center">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <?= (isset($dados['dado']['idtb_carro']) == NULL) ? 'Cadastro de Carro' : "Editar " . $dados['dado']['placa'] ?>
        </div>
        <div class="card-body">
            <?= Sessao::mensagem('usuario') ?>
            <p class="card-text"><small class="text-muted">Informe os Dados</small></p>

            <form name="login" method="POST" action=<?= (isset($dados['dado']['idtb_carro']) == NULL) ? URL . "/Carros/insert/" : URL . "/Carros/edit/" . $dados['dado']['idtb_carro'] . "/" ?> class="mt-4">

                <div class="form-group">
                    <label for="nome"><sup class="text-danger">*</sup> Nome do Carro <sup class="text-danger">*</sup></label>
                    <input type="text" name="nome" id="nome" value="<?= $dados['dado']['nome'] ?>" class="form-control <?= $dados['erro']['nome'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['erro']['nome'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="placa"><sup class="text-danger">*</sup> Placa <sup class="text-danger">*</sup></label>
                    <input type="text" name="placa" id="placa" value="<?= $dados['dado']['placa'] ?>" class="form-control  <?= $dados['erro']['placa'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['erro']['placa'] ?>
                    </div>
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