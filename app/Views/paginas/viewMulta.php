<div class="container py-5 text-center">
    <!----col-xl-9 col-md-6 mx-auto p-5 text-center--->
    <?= Sessao::mensagem('delete') ?>
    <?= Sessao::mensagem('edit') ?>
    <div class="card">
        <div class="card-header bg-info text-white">
            Multas
        </div>
        <div class="card-body">
            <form action="<?= URL ?>/multas/search" class="form-inline my-2 my-md-0" method="POST">
                <input name="placa" class="form-control" placeholder="Placa">
            </form>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID Multa</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Placa do Carro</th>
                        <th scope="col">Descricao da Multa</th>
                        <th scope="col">Acoes</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($dados as $multa) : ?>
                        <tr>
                            <th scope="row"><?= $multa->idtb_multa ?></th>
                            <td><?= $multa->ano ?></td>
                            <td><?= $multa->cidade ?></td>
                            <td><?= $multa->placa ?></td>
                            <td><?= $multa->descricao ?></td>
                            <td>
                                <a class="btn btn-warning text-white" href="<?= URL ?>/multas/edit/<?= $multa->idtb_multa ?>">Editar</a>
                                <a class="btn btn-danger" href="<?= URL ?>/multas/remove/<?= $multa->idtb_multa ?>">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a class="btn btn-info text-white btn-block" href="<?= URL ?>/multas/insert">Inserir Multa</a>
        </div>
    </div>
</div>