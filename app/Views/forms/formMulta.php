    <div class='container div-principal'>
        <form class="container" action=<?= URL . "/multas/insertMulta" ?> method="POST">

            <h3>Multa</h3>
            <input class='caixas form-control' type="number" name="ano" placeholder='Ano' required>
            <input class='caixas form-control' type="text" name="cidade" placeholder='Cidade' required>

            <!-- Funcao do php-->
            <?php

            echo "<label>Carro da Multa</label>";
            echo "<select name = 'idtb_carro' class = 'selectMulta form-select' aria-label='Default select example' required>";
            foreach ($dados['carros'] as $carro) {
                $id_carro = $carro->idtb_carro;
                $placa = $carro->placa;
                echo "<option value='$id_carro'>$placa</option>";
            }
            echo "</select>";


            echo "<label>Infração da Multa</label>";
            echo "<select name = 'idtb_infracao' class = 'selectMulta form-select' aria-label='Default select example' required>";
            foreach ($dados['infracoes'] as $infracao) {
                $id_infracao = $infracao->idtb_infracao;
                $descricao = $infracao->descricao;
                echo "<option value = '$id_infracao'>$descricao</option>";
            }
            echo '</select>';
            ?>

            <input class='btn btn-primary' type="submit" name="btn" value="Enviar">

        </form>
    </div>