<div class='container div-principal'>
    <h3>Tabela de Multas</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id_Multa</th>
                <th scope="col">Ano</th>
                <th scope="col">Cidade</th>
                <th scope="col">Id Carro</th>
                <!--<th scope="col">Placa</th>-->
                <th scope="col">Id Infracao</th>
                <!--<th scope="col">Descricao</th>-->
            </tr>
        </thead>
        <tbody>

            <?php
            $db = new Database;

            $db->query('SELECT * FROM `tb_multa`;');

            $multaBD = $db->resultados();
            foreach ($multaBD as $multa) {
                echo '<tr>';
                echo "    <th scope='row'>" . $multa->idtb_multa . "</th>";
                echo "    <td>" . $multa->ano . "</td>";
                echo "    <td>" . $multa->cidade . "</td>";
                echo "    <td>" . $multa->tb_carro_idtb_carro . "</td>";
                echo "    <td>" . $multa->tb_tipoInfracao_idtb_tipoInfracao . "</td>";
                echo '</tr>';
            }
            ?>

        </tbody>
    </table>
</div>