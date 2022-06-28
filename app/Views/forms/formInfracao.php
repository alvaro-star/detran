<div class="col-xl-4 col-md-6 mx-auto p-5 text-center">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <?= (isset($dados['dado']['idtb_infracao']) == NULL) ? 'Cadastro de Infracao' : "Editar " . $dados['dado']['descricao'] ?>
        </div>
        <div class="card-body">
            <?= Sessao::mensagem('usuario') ?>
            <p class="card-text"><small class="text-muted">Informe os Dados</small></p>

            <form name="login" method="POST" action=<?= (isset($dados['dado']['idtb_infracao']) == NULL) ? URL . "/infracoes/insert" : URL . "/infracoes/edit/" . $dados['dado']['idtb_infracao'] ?> class="mt-4">

                <div class="form-group">
                    <label for="descricao"><sup class="text-danger">*</sup> Descricao <sup class="text-danger">*</sup></label>
                    <input type="text" name="descricao" id="descricao" value="<?= $dados['dado']['descricao'] ?>" class="form-control <?= $dados['erro']['descricao'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['erro']['descricao'] ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="pontos"><sup class="text-danger">*</sup> Pontos <sup class="text-danger">*</sup></label>
                    <input type="text" name="pontos" id="pontos" value="<?= $dados['dado']['pontos'] ?>" class="form-control  <?= $dados['erro']['pontos'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['erro']['pontos'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="valor"><sup class="text-danger">*</sup> Valor <sup class="text-danger">*</sup></label>
                    <input type="text" name="valor" id="valor" value="<?= $dados['dado']['valor'] ?>" class="form-control  <?= $dados['erro']['valor'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['erro']['valor'] ?>
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