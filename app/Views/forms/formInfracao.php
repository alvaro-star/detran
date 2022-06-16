<div class='container div-principal'>
    <form class="container" action=<?=URL."/infracoes/insertInfracao"?> method="POST">

        <h3>Infracao</h3>
        <input class='caixas form-control' type="text" name="descricao" placeholder='Descricao' required>

        <input class='caixas form-control' type="text" name="pontos" placeholder='Pontos' required>

        <input class='caixas form-control' type="text" name="valor" placeholder='Valor' required>

        <input class='btn btn-primary' type="submit" name="btn" value="Enviar">

    </form>
</div>