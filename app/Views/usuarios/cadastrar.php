<div class="col-xl-4 col-md-6 mx-auto p-5 text-center">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            Cadastro
        </div>
        <div class="card-body">
            <?= Sessao::mensagem('usuario') ?>
            <p class="card-text"><small class="text-muted">Informe seus dados</small></p>

            <form name="login" method="POST" action="<?= URL ?>/usuarios/cadastrar" class="mt-4">

                <div class="form-group">
                    <label for="nome"><sup class="text-danger">*</sup> E-mail <sup class="text-danger">*</sup></label>
                    <input type="text" name="nome" id="nome" value="<?= $dados['nome'] ?>" class="form-control <?= $dados['erro']['nome'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['erro']['nome'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email"><sup class="text-danger">*</sup> E-mail <sup class="text-danger">*</sup></label>
                    <input type="text" name="email" id="email" value="<?= $dados['email'] ?>" class="form-control <?= $dados['erro']['email'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['erro']['email'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="senha"><sup class="text-danger">*</sup> Senha <sup class="text-danger">*</sup></label>
                    <input type="password" name="senha" id="senha" value="<?= $dados['senha'] ?>" class="form-control  <?= $dados['erro']['senha'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['erro']['senha'] ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirmar_senha"><sup class="text-danger">*</sup> Confirmar Senha <sup class="text-danger">*</sup></label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha" value="<?= $dados['confirmar_senha'] ?>" class="form-control  <?= $dados['erro']['confirmar_senha'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['erro']['confirmar_senha'] ?>
                    </div>
                </div>

                <div class="row">
                    <div class="">
                        <input type="submit" value="Login" class="btn btn-info btn-block mt-3">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>