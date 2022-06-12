<div class='container div-principal'>

    <h3>Tabela de Carros</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID Carro</th>
                <th scope="col">Placa</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($dados as $carro):?>
                <tr>
                    <th scope="row"><?=$carro->idtb_carro?></th>
                    <td><?=$carro->placa?></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>