<div class='container div-principal'>

    <form class="container text-center" method="POST" action="<?= URL ?>/usuarios/cadastrar">
        <h1>Cadastre-se</h1>
        <div class="form-floating">
            <input type="text" value="<?= $dados['nome'] ?>" name="nome" class="form-control <?= $dados['erro']['nome'] ? 'is-invalid' : 'input' ?>" id="floatingName" placeholder="Nome">
            <label for="floatingName">Nome</label>
            <div class="invalid-feedback">
                <?= $dados['erro']['nome'] ?>
            </div>
        </div>

        <div class="form-floating">
            <input type="text" value="<?= $dados['email'] ?>" name="email" class="form-control <?= $dados['erro']['email'] ? 'is-invalid' : 'input' ?>" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Endereço de email</label>
            <div class="invalid-feedback">
                <?= $dados['erro']['email'] ?>
            </div>
        </div>

        <div class="form-floating">
            <input type="password" value="<?= $dados['senha'] ?>" name="senha" class="form-control <?= $dados['erro']['senha'] ? 'is-invalid' : 'input' ?>" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Senha</label>
            <div class="invalid-feedback">
                <?= $dados['erro']['senha'] ?>
            </div>
        </div>

        <div class="form-floating">
            <input type="password" value="<?= $dados['confirmar_senha'] ?>" name="confirmar_senha" class="form-control <?= $dados['erro']['confirmar_senha'] ? 'is-invalid' : 'input' ?>" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Confirmar Senha</label>
            <div class="invalid-feedback">
                <?= $dados['erro']['confirmar_senha'] ?>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Sign in</button>
    </form>

</div>