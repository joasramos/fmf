<?php if (!isset($comp_jogos[0])): ?>
    <h3> Competição não foi definida!</h3>
    <pre>
        <?php // print_r($comp_jogos); ?>
    </pre>
<?php else: ?>
    <h3 class="title-header-content">
        Competições
    </h3> 

    <div class="container">
        <div class="row clearfix">
            <div class="col-md-10 column bg-white box-shadow" style="padding: 0">
                <div class="tabbable" id="tabs-234364">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#panel-pela-fmf" data-toggle="tab">Organizadas pela FMF</a>
                        </li>
                        <li>
                            <a href="#panel-pela-cbf" data-toggle="tab">Organizadas pela CBF</a>
                        </li>
                        <li>
                            <a href="#panel-pela-con" data-toggle="tab">Organizadas pela Conmebol</a>
                        </li>
                        <li> 
                            <a href="#panel-pela-fifa" data-toggle="tab">Organizadas pela FIFA</a>
                        </li>
                    </ul>
                    <div class="tab-content" style="padding: 0">     
                        <div class="tab-pane active" id="panel-pela-fmf" style="padding: 0;">
                            <h2 class="titulo margin-default"> Competições Organizadas pela FMF</h2>
                            <div class="tabbable" id="tabs-234364">

                                <ul class="nav nav-tabs" id="header-comp">
                                    <?php foreach ($comp_nomes as $key => $value): ?>
                                        <li class="<?= $key == 0 ? "active" : "" ?>" url="<?= $value->url ?>">
                                            <a href="#tabs-<?= $key + 1 ?>"><?= $value->apelido ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                <div class="tab-content" id="cont-comp" style="padding: 0">                                 
                                    <?php foreach ($comp_nomes as $key => $value): ?>
                                        <div class="<?= $key == 0 ? "active" : "" ?> tab-pane" id="tabs-<?= $key + 1 ?>" style="padding: 0">
                                            <div class="row-fluid clearfix">
                                                <div class="col-md-12">
                                                    <h3 class="text-left titulo">
                                                        <?= $value->apelido ?>
                                                    </h3>
                                                </div>
                                                <div class="col-md-12">
                                                    <h5 class="">Escolha um ano: 
                                                        <select id="sel-ano">
                                                            <option>Selecione</option>
                                                            <?php foreach ($comp_anos as $key => $comp): ?>
                                                                <option><?= $comp->ano ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </h5>
                                                </div>
                                                <!--CONTEM INFORMAÇÕES DAS COMPETICOES-->
                                                <div class="row-fluid clearfix">
                                                    <div class="tabbable" id="tabs-234365" style="margin: 0">
                                                        <ul class="nav nav-tabs">
                                                            <?php
                                                            foreach ($turnos as $key => $value):
                                                                ?>
                                                                <li class="<?= $key ? "" : "active" ?>">
                                                                    <a href="#panel-turno-<?= $key ?>" data-toggle="tab"><?= $value->nome ?></a>
                                                                </li>
                                                                <?php
                                                            endforeach;
                                                            ?>

                                                            <li> 
                                                                <a href="#panel-class" data-toggle="tab">Classificação</a>
                                                            </li>
                                                            <li> 
                                                                <a href="#panel-reg" data-toggle="tab">Documentos</a>
                                                            </li>
<!--                                                            <li> 
                                                                <a href="#panel-art" data-toggle="tab">Artilharia</a>
                                                            </li>-->
                                                            <li> 
                                                                <a href="#panel-alt" data-toggle="tab">Alterações</a>
                                                            </li>
                                                        </ul>

                                                        <!--CRIA OS PAINEIS DE TURNOS-->
                                                        <div class="tab-content" style="padding: 0">   
                                                            <?php
                                                            foreach ($turnos as $key => $value):
                                                                ?>
                                                                <div class="tab-pane <?= $key ? "" : "active" ?>" id="panel-turno-<?= $key ?>">
                                                                    <?php
                                                                    if (!count($comp_jogos[$key])) {
                                                                        echo "<h3 class='text-danger text-center'>Não realizado</h3>";
                                                                    }
                                                                    $str = "";
                                                                    foreach ($comp_jogos[$key] as $jogo):
                                                                        ?>
                                                                        <div class="row-fluid clearfix">
                                                                            <div class="col-md-12">
                                                                                <h3 class="text-noticia borda-right-marrom border-bottom-dotted">
                                                                                    <?php
                                                                                    if (!($str == $jogo->apelido)) {
                                                                                        echo $jogo->apelido;
                                                                                    }

                                                                                    $str = $jogo->apelido;
                                                                                    ?>
                                                                                </h3>
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
                                                                                                    <a href=""><span class="label label-default">Alterações</span></a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>      
                                                                                    <?php //endfor;           ?>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            <?php endforeach; ?><!--FIM DA CONDIÇÃO E DO LAÇO QUE CRIA OS PAINEIS DE TURNOS-->

                                                            <!--CLASSIFICACAO-->
                                                            <div class="tab-pane" id="panel-class">                                                                
                                                                <div class="row-fluid clearfix margin-default">        
                                                                    <div class="col-md-6">
                                                                        <h4 class="text-primary">                                                                         
                                                                            <select class="col-md-10" id="sel-mod-cla">
                                                                                <option value="0"> Selecione um turno</option>
                                                                                <?php foreach ($turnos as $key => $value): ?>
                                                                                    <option value="<?= $value->idmodulo ?>"><?= $value->nome ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </h4>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h4>
                                                                            <select class="col-md-10" id="sel-fase-cla">
                                                                                <option> Selecione uma fase</option>
                                                                            </select>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <?php include 'class-tabela.php'; ?>
                                                            </div>
                                                            <!--END CLASSIFICACAO-->
                                                            <div class="tab-pane" id="panel-reg"> Regulamento</div>
                                                            <div class="tab-pane" id="panel-art">Artilharia</div>
                                                            <div class="tab-pane" id="panel-alt"> Alterações</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                     
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div> 
                        <div class="tab-pane" id="panel-pela-cbf">
                            <div class="col-md-12 column">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="thumbnail">
                                            <a href="http://www.cbf.com.br/competicoes/brasileiro-serie-a#.U6qQnFEYZzU" target="_blank">
                                                <img width="270" height="200" alt="300x200" src="http://blogs.diariodepernambuco.com.br/esportes/wp-content/uploads-old/campeonato_brasileiro_serie_a_cbf_560_297.jpg" />
                                            </a>
                                            <div class="caption">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="thumbnail">
                                            <a href="http://www.cbf.com.br/competicoes/brasileiro-serie-b#.U61XC1EYY2U" target="_blank">
                                                <img width="270" height="200" alt="300x200" src="http://auvaromaia.com/wp-content/uploads/2014/03/Camp-serie-B1.jpg" />
                                            </a>
                                            <div class="caption">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="thumbnail">
                                            <a href="http://www.cbf.com.br/competicoes/brasileiro-serie-c" target="_blank">
                                                <img width="270" height="200" alt="300x200" src="http://auvaromaia.com/wp-content/uploads/2013/05/Brasileiro-serie-C1.jpg" />
                                            </a>
                                            <div class="caption">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="thumbnail">
                                            <a href="http://www.cbf.com.br/competicoes/brasileiro-serie-d#.U61XhlEYY2U" target="_blank">
                                                <img width="270" height="200" alt="300x200" src="http://www.futeboldaqui.com.br/site/wp/wp-content/uploads/2013/06/Campeonato-Brasileiro-da-S%C3%A9rie-D.jpg" />
                                            </a>
                                            <div class="caption">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="thumbnail">
                                            <a href="http://www.cbf.com.br/competicoes/copa-brasil-masculino#.U6qTSlEYZzU" target="_blank">
                                                <img width="270" height="200" alt="300x200" src="http://www.putsgrilo.com.br/wp-content/uploads/2013/04/Copa-do-Brasil.jpg" />
                                            </a>
                                            <div class="caption">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="thumbnail">
                                            <a href="http://www.cbf.com.br/competicoes/copa-nordeste#.U6qT4VEYZzU" target="_blank">
                                                <img width="270" height="200" alt="300x200" src="http://www.anaf.com.br/2014/wp-content/uploads/2014/02/copaNE2014.jpg" />
                                            </a>
                                            <div class="caption">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="thumbnail">
                                            <a href="http://www.cbf.com.br/competicoes/copa-verde#.U61XwlEYY2U" target="_blank">
                                                <img width="270" height="200" alt="300x200" src="http://upload.wikimedia.org/wikipedia/pt/8/88/Copa_Verde.jpg" />
                                            </a>
                                            <div class="caption">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="panel-pela-con">
                            <div class="col-md-12 column">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="thumbnail">
                                            <a href="http://estadisticas.conmebol.com/html/v3/?channel=deportes.futbol.libertadores.fixture" target="_blank">
                                                <img width="270" height="200" alt="300x200" src="http://www.galodigital.com.br/w/images/thumb/9/9e/Logo_Copa_Libertadores_da_America.png/300px-Logo_Copa_Libertadores_da_America.png" />
                                            </a>
                                            <div class="caption">

                                            </div>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="panel-pela-fifa">
                            <div class="col-md-12 column">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="thumbnail">
                                            <a href="http://pt.fifa.com/" target="_blank">
                                                <img width="270" height="200" alt="300x200" src="http://www.footballstickipedia.com/uploads/PICS/fifa-world-cup-2014-brazil-logo.gif" />
                                            </a>
                                            <div class="caption">

                                            </div>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; 