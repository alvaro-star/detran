<div class='container div-principal'>
    <form class="container" action='<?=URL?>/tabelas/tabelas' method="POST">

        <h3>Tabelas</h3>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="CDTabelas" value='create' checked>
            <label class="form-check-label" for="flexRadioDefault1">
                Criar Tabelas
            </label>
        </div>
        
        <div class="form-check">
            <input class="form-check-input" type="radio" name="CDTabelas" value='delete'>
            <label class="form-check-label" for="flexRadioDefault2">
                Apagar Tabelas
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name ='usuario'value="yes" checked>
            <label class="form-check-label" for="flexCheckDefault">
                Tabela Usuario
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name ='carro'value="yes" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Tabela Carro
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name ='infracao'value="yes" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Tabela Infracao
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name ='multa'value="yes" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Tabela Multa
            </label>
        </div>

        <input class='btn btn-primary' type="submit" name="btn" value="Enviar">
    </form>
</div>