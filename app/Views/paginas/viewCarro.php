<div class='container div-principal text-center'>

    <?= Sessao::mensagem('delete') ?>
    <?= Sessao::mensagem('edit') ?>

    <h3>Carros</h3>

    <form action= "<?= URL ?>/carros/search" class="form-inline my-2 my-md-0" method="POST">
        <input name = "placa" class="form-control" placeholder="Placa">
    </form>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID Carro</th>
                <th scope="col">Usuario</th>
                <th scope="col">Carro</th>
                <th scope="col">Placa</th>
                <th scope="col">Divida</th>
                <th scope="col">Criado em:</th>
                <th scope="col">Acao</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($dados as $carro) : ?>
                <tr>
                    <th scope="row"><?= $carro->idtb_carro ?></th>
                    <td><?= $carro->nome_usuario ?></td>
                    <td><?= $carro->nome_carro ?></td>
                    <td><?= $carro->placa ?></td>
                    <td><?= $carro->divida ?></td>
                    <td><?= $carro->postado_em ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?= URL ?>/carros/edit/<?= $carro->idtb_carro ?>">Editar</a>
                        <a class="btn btn-danger" href="<?= URL ?>/carros/remove/<?= $carro->idtb_carro ?>">Remover</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a class="btn btn-primary" href="<?= URL ?>/carros/insert">Inserir carro</a>
</div>