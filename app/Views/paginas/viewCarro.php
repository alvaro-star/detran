<div class='container div-principal'>
    
    <?=Sessao::mensagem('delete')?>
    <?=Sessao::mensagem('edit')?>

    <h3>Tabela de Carros</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID Carro</th>
                <th scope="col">Placa</th>
                <th scope="col">Acao</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($dados as $carro) : ?>
                <tr>
                    <th scope="row"><?= $carro->idtb_carro ?></th>
                    <td><?= $carro->placa ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?= URL ?>/carros/editCarro/<?= $carro->idtb_carro ?>">Editar</a>
                        <a class="btn btn-danger" href="<?= URL ?>/carros/removeCarro/<?= $carro->idtb_carro ?>">Remover</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a class="btn btn-primary" href="<?= URL ?>/carros/insertCarro">Inserir carro</a>
</div>