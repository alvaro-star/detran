<div class='container div-principal'>
    <form class="container" action= <?=URL."/carros/insertCarro"?> method="POST">

        <h3>Cadastro de Carro</h3>

        <input class='caixas form-control' type="text" name="placa" placeholder='Placa' required>

        <input class='btn btn-primary' type="submit" name="btn" value="Enviar">
        
    </form>
</div>