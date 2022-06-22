<div class='container div-principal text-center'>
    <?= Sessao::mensagem('delete') ?>
    <?= Sessao::mensagem('edit') ?>
    <h3>Infracoes</h3>

    <form action= "<?= URL ?>/infracoes/search" class="form-inline my-2 my-md-0" method="POST">
        <input name = "descricao" class="form-control" placeholder="Descricao">
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID Infracao</th>
                <th scope="col">Descrição</th>
                <th scope="col">Pontos</th>
                <th scope="col">Valor</th>
                <th scope="col">Acao</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($dados as $infracao) : ?>
                <tr>
                    <th scope="row"><?= $infracao->idtb_infracao ?></th>
                    <td><?= $infracao->descricao ?></td>
                    <td><?= $infracao->pontos ?></td>
                    <td><?= $infracao->valor ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?= URL ?>/infracoes/edit/<?= $infracao->idtb_infracao ?>">Editar</a>
                        <a class="btn btn-danger" href="<?= URL ?>/infracoes/remove/<?= $infracao->idtb_infracao ?>">Remover</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a class="btn btn-primary" href="<?= URL ?>/infracoes/insert">Inserir Infracao</a>
</div>