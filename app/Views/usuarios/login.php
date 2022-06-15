<div class="container div-principal">

    <?=Sessao::mensagem('usuario')?>
    <form class="form" method="POST" action="<?=URL?>/usuarios/login">
        <h1 class="h3 mb-3 fw-normal">Informe os seus dados</h1>
        <div class="form-floating">
                <input type="text" value = "<?=$dados['email']?>" name = "email" class="form-control <?=$dados['erro']['email']?'is-invalid':''?>" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Endereço de email</label>
                <div class="invalid-feedback">
                    <?=$dados['erro']['email']?>
                </div>
            </div>

            <div class="form-floating">
                <input type="password" value = "<?=$dados['senha']?>" name = "senha" class="form-control <?=$dados['erro']['senha']?'is-invalid':''?>" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Senha</label>
                <div class="invalid-feedback">
                    <?=$dados['erro']['senha']?>
                </div>
            </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me 
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
</div>