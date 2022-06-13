    <div class='container div-principal'>
        <form class="container" action=<?=URL."/Posts/multa"?> method="POST">

            <h3>Multa</h3>
            <input class='caixas form-control' type="number" name="ano" placeholder='Ano' required>
            <input class='caixas form-control' type="text" name="cidade" placeholder='Cidade' required>

            <!-- Funcao do php-->
            <?php
            $db = new Database();

            $db->query("SELECT `idtb_carro`, `placa` FROM `tb_carro`;");
            $carros = $db->resultados();
            $db->query("SELECT `idtb_tipoInfracao`, `descricao` FROM `tb_tipoInfracao`;");
            $infracoes = $db->resultados();

            echo "<label>Carro da Multa</label>";
            echo "<select name = 'carro' class = 'selectMulta form-select' aria-label='Default select example' required>";
            foreach ($carros as $carro) {
                $id_carro = $carro->idtb_carro;
                $placa = $carro->placa;
                echo "<option value='$id_carro'>$placa</option>";
            }
            echo "</select>";


            echo "<label>Infração da Multa</label>";
            echo "<select name = 'tipoInfracao' class = 'selectMulta form-select' aria-label='Default select example' required>";
            foreach ($infracoes as $infracao) {
                $id_infracao = $infracao->idtb_tipoInfracao;
                $descricao = $infracao->descricao;
                echo "<option value = '$id_infracao'>$descricao</option>";
            }
            echo '</select>';
            ?>

            <input class='btn btn-primary' type="submit" name="btn" value="Enviar">

        </form>
    </div>