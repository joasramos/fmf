<div class="row-fluid border-top-dotted clearfix class-table">
    <?php
    $str_turno = '';
    $str_grupo = '';
    $x = 0;
    $numeracao = 1;
    foreach ($classificacao as $key => $c):
        ?>
        <h4 class="text-noticia text-center borda-right-marrom" style="background-color: #ccc">                                                                         
            <?=
            $c->nome_turno != $str_turno ? $c->nome_turno : "";
            $str_turno = $c->nome_turno;
            ?>
        </h4>
        <h5 class="text-info borda-right-marrom">
            <?php
            if ($c->nome_grupo != $str_grupo) {
                $x = 1;
                $numeracao = 1;
                echo $c->nome_grupo;
            }$str_grupo = $c->nome_grupo;
            ?>
        </h5>
        <style>
            .dados tbody tr td{text-align: center; min-width: 60px}
            .dados thead tr th{text-align: center}
            /*.dados{width: 800px}*/
            .times-name{width: 150px;}
            .numeracao{
                font-size: 20px;
                font-weight: bold;
            }
            
            .blue{
                color: blue;
            }
            
            .classificado{
                font-weight: bold;
            }
        </style>
        <table class="table dados">
            <?php if ($x): ?>
                <thead>
                    <tr>
                        <th></th>
                        <th>Clube</th>
                        <th>P</th>
                        <th>J</th>
                        <th>V</th>
                        <th>D</th>
                        <th>E</th>
                        <th>GP</th>
                        <th>GC</th>
                        <th>SG</th>
                        <th>Aprov.</th>
                    </tr>
                </thead>
            <?php endif; ?>
            <tbody>
                <tr>
                    <td class="numeracao <?= !$c->eliminado ? "blue" : "" ?>"><?= $numeracao ?></td>
                    <td class="times-name <?= !$c->eliminado ? "classificado" : "" ?>"><?= $c->nome_clube ?></td>
                    <td><?= $c->pontos ?></td>
                    <td><?= $c->jogos ?></td>
                    <td><?= $c->vitorias ?></td>
                    <td><?= $c->derrotas ?></td>
                    <td><?= $c->empates ?></td>
                    <td><?= $c->gols_pro ?></td>
                    <td><?= $c->gols_contra ?></td>
                    <td><?= ($c->gols_pro - $c->gols_contra) ?></td>
                    <td><?= $c->aproveitamento . "%" ?></td>
                </tr>
            </tbody>
        </table>
        <?php
        $x = 0;
        $numeracao++;
    endforeach;
    ?>
</div>