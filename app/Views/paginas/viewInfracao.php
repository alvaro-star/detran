<div class='container div-principal'>

    <h3>Tabela de Tipo de Infracoes</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID Infracao</th>
                <th scope="col">Descrição</th>
                <th scope="col">Pontos</th>
                <th scope="col">Valor</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($dados as $infracao):?>
                <tr>
                    <th scope="row"><?=$infracao->idtb_infracao?></th>
                    <td><?=$infracao->descricao?></td>
                    <td><?=$infracao->pontos?></td>
                    <td><?=$infracao->valor?></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>

    <a class="btn btn-primary" href="<?=URL?>/infracoes/insertInfracao">Primary</a>
</div>