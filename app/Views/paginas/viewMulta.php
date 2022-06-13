<div class='container div-principal'>

    <h3>Tabela de Multas</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID Multa</th>
                <th scope="col">Ano</th>
                <th scope="col">Cidade</th>
                <th scope="col">Placa do Carro</th>
                <th scope="col">Descricao da Multa</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($dados as $multa):?>
                <tr>
                    <th scope="row"><?=$multa->idtb_multa?></th>
                    <td><?=$multa->ano?></td>
                    <td><?=$multa->cidade?></td>
                    <td><?=$multa->placa?></td>
                    <td><?=$multa->descricao?></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="<?=URL?>/multas/formMulta">Primary</a>
</div>