<div style="width:1024px; height: 768px; background-color: white">
    <span class="b-close btn btn-danger col-md-offset-11">&nbsp;x&nbsp;</span>
    <div class="row-fluid clearfix">
        <!--IMAGEM E INFORMAÇÕES BÁSICAS DO CLUBE-->
        <div class="col-md-12">
            <div class="row-fluid clearfix">
                <div class="col-md-offset-3 col-md-6 padding-default sombra-right" id="<?= $clube_info[0]->idclube ?>">
                    <div class="col-md-5">
                        <img class='img-default' width="128" height="128" src="<?= base_url() ?>assets/images/escudos/<?= $clube_info[0]->bandeira ?>">
                    </div>
                    <div class="col-md-7">
                        <h3 class='text-noticia'> <?= $clube_info[0]->apelido ?> </h3>
                        <h4 class='title-simple'> <?= $clube_info[0]->nome ?></h4>
                        <hr/>
                        <h5 class='title-simple'> Fundado em: <?= date("d-m-Y", strtotime($clube_info[0]->fundacao)) ?></h5>
                        <h5 class='title-simple'> Categoria: <?= $clube_info[0]->categoria ?></h5>
                    </div>
                </div>
            </div>
        </div>

        <!--INFORMAÇÕES GERAIS DO CLUBE-->
        <div class="row-fluid">
            <div class="col-md-11">
                <h4 class="text-center">Informações Gerais</h4>
                <div class="tabbable sombra">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#panel-not" data-toggle="tab">Notícias</a>
                        </li>
                        <li>
                            <a href="#panel-jog" data-toggle="tab">Jogos</a>
                        </li>
                        <li>
                            <a href="#panel-cla" data-toggle="tab">Classificação</a>
                        </li>
                    </ul>
                    <div class="tab-content" style="height: 435px; overflow: auto">
                        <div class="tab-pane active" id="panel-not">
                            <h6> Noticias do <?= $clube_info[0]->apelido ?></h6>
                        </div>
                        <div class="tab-pane" id="panel-jog">
                            <h5 class="text-left borda-right-marrom"> Jogos do <?= $clube_info[0]->apelido . " no " . $clube_jogos['casa'][0]->nome_comp ?></h5>
                            <?php
                            $str = "";
                            $fase = "";
                            $turno = "";
                            foreach ($clube_jogos as $jogos):
                                foreach ($jogos as $jogo):
                                    ?>
                                    <h3 class="text-noticia borda-right-marrom border-bottom-dotted text-center" style="background-color: #f1d798">
                                        <?php
                                        if (!($turno == $jogo->nome_turno)) {
                                            echo $jogo->nome_turno;
                                        }

                                        $turno = $jogo->nome_turno;
                                        ?>
                                    </h3>
                                    <h4 class="text-primary borda-right-marrom">
                                        <?php
                                        if (!($fase == $jogo->nome_fase)) {
                                            echo $jogo->nome_fase;
                                        }
                                        $fase = $jogo->nome_fase;
                                        ?>
                                    </h4>
                                    <h5 class="text-success borda-right-marrom">
                                        <?php
                                        if (!($str == $jogo->apelido)) {
                                            echo $jogo->apelido;
                                        }
                                        $str = $jogo->apelido;
                                        ?>
                                    </h5>
                                    <div class="row-fluid clearfix">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-responsive table-condensed">

                                                <tr>
                                                    <td>
                                                        <h4><strong><?= date('d/m', strtotime($jogo->data)) ?> </strong></h4>
                                                        <h6><?= date('H:i', strtotime($jogo->data)) . "h" ?> </h6>                                                                        
                                                    </td>
                                                    <td style="width: 150px"><h4><?= $jogo->c1_nome ?></h4></td>
                                                    <td><img width="32" src="<?= base_url() ?>/assets/images/escudos/<?= $jogo->c1_band ?>"/></td>
                                                    <td><div class="btn btn-default"><strong style="font-size: 16px"><?= $jogo->gols_casa ?></strong></div></td>
                                                    <td><div class="btn btn-inverse"> X </div></td>
                                                    <td><div class="btn btn-default"><strong style="font-size: 16px"><?= $jogo->gols_visitante ?></div></div></td>
                                                    <td><img width="32" src="<?= base_url() ?>/assets/images/escudos/<?= $jogo->c2_band ?>"/></td>
                                                    <td style="width: 150px"><h4><?= $jogo->c2_nome ?></h4> </td>
                                                    <td>
                                                        <div class="row clearfix">
                                                            <div class="col-md-12">
                                                                <label style="font-size: 12px">
                                                                    Jogo nº <?=
                                                                    $jogo->n_jogo .
                                                                    "&nbsp;<br>Estadio: "
                                                                    ?>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <a href=""><span class="label label-default">Súmula</span></a>
                                                                <a href=""><span class="label label-default">Borderô</span></a>
                                                                <a href=""><span class="label label-default">Escala</span></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>      
                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            endforeach;
                            ?>
                        </div>
                        <div class="tab-pane" id="panel-cla">
                            <h5 class="text-left borda-right-marrom"> Classificação do <?= $clube_info[0]->apelido . " no " . $clube_jogos['casa'][0]->nome_comp ?></h5>
                            <?php
                            $str_turno = '';
                            $str_grupo = '';
                            $x = 0;
                            foreach ($cla as $key => $c):
                                ?>
                                <h4 class="text-center text-noticia">                                                                        
                                    <?=
                                    $c->nome_turno != $str_turno ? $c->nome_turno : "";
                                    $str_turno = $c->nome_turno;
                                    ?>
                                </h4>
                                <h5 class="text-info text-center">
                                    <?php
                                    if ($c->nome_grupo != $str_grupo) {
                                        $x = 1;
                                        echo $c->nome_grupo;
                                    }$str_grupo = $c->nome_grupo;
                                    ?>
                                </h5>
                                <style>
                                    .dados tbody tr td{min-width: 103px; text-align: center}
                                    .dados thead tr th{text-align: center}
                                </style>
                                <table class="table table-striped table-condensed dados" style="width: 600px">
                                    <?php if ($x): ?>
                                        <thead>
                                            <tr>
                                                <th>Clube</th>
                                                <th>Pontos</th>
                                                <th>Vitórias</th>
                                                <th>Derrotas</th>
                                                <th>Empates</th>
                                                <th>Gols Pro</th>
                                                <th>Gols Contra</th>
                                                <th>Aproveitamento</th>
                                            </tr>
                                        </thead>
                                    <?php endif; ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $c->nome_clube ?></td>
                                            <td><?= $c->pontos ?></td>
                                            <td><?= $c->vitorias ?></td>
                                            <td><?= $c->derrotas ?></td>
                                            <td><?= $c->empates ?></td>
                                            <td><?= $c->gols_pro ?></td>
                                            <td><?= $c->gols_contra ?></td>
                                            <td><?= $c->aproveitamento . "%" ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php
                                $x = 0;
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {


    });
</script>

