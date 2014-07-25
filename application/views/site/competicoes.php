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
                <div class="tab-content">
                    <div class="tab-pane active" id="panel-pela-fmf">
                        <div class="row-fluid clearfix">
                            <div class="col-md-12"> 
                                <div class="row-fluid">
                                    <div class="col-md-12">
                                        <div id="tabs">
                                            <ul>
                                                <?php foreach ($comp_nomes as $key => $value): ?>
                                                    <li url="<?= $value->url ?>"><a href="#tabs-<?= $key + 1 ?>"><?= $value->apelido ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php foreach ($comp_nomes as $key => $value): ?>
                                                <div id="tabs-<?= $key + 1 ?>">
                                                    <div class="row-fluid clearfix">
                                                        <div class="col-md-12">
                                                            <?php foreach ($comp_anos as $key => $comp): ?>
                                                                <label class="label btn-primary"><?= $comp->ano ?></label>
                                                            <?php endforeach; ?>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h3 class="text-center title-header-content borda-bottom-marrom">
                                                                <?= $value->apelido ?>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div class="row-fluid clearfix">
                                                        <div class="col-md-12">
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs btn-danger"> Tabela</button>
                                                                <button class="btn btn-xs btn-danger"> Artilharia</button>
                                                                <button class="btn btn-xs btn-danger"> Classificação</button>
                                                                <button class="btn btn-xs btn-danger"> Arbitragem</button>
                                                                <button class="btn btn-xs btn-danger"> Documentos</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php for ($i = 0, $k = 1; $i < count($comp_jogos); $i+=4, $k++): ?>
                                                        <div class="row-fluid clearfix">
                                                            <div class="col-md-12">
                                                                <h3 class="text-noticia borda-right-marrom border-bottom-dotted">
                                                                    <?= $comp_jogos[$i]->apelido ?>
                                                                </h3>
                                                                <table class="table table-striped table-responsive table-condensed">
                                                                    <?php for ($j = $i; $j < 4 * $k; $j++): ?>
                                                                        <tr>
                                                                            <td>
                                                                                <label> <?= date('H:i', strtotime($comp_jogos[$j]->data)) . "h" ?> </label>
                                                                            </td>
                                                                            <td style="width: 150px"><?= $comp_jogos[$j]->c1_nome ?> </td>
                                                                            <td><img width="20" src="<?= base_url() ?>/assets/images/escudos/<?= $comp_jogos[$j]->c1_band ?>"/></td>
                                                                            <td><div class="btn btn-primary"><?= $comp_jogos[$j]->gols_casa ?> </div></td>
                                                                            <td><div class="btn btn-primary"><?= $comp_jogos[$j]->gols_visitante ?> </div></td>
                                                                            <td><img width="20" src="<?= base_url() ?>/assets/images/escudos/<?= $comp_jogos[$j]->c2_band ?>"/></td>
                                                                            <td style="width: 150px"><?= $comp_jogos[$j]->c2_nome ?> </td>
                                                                        </tr>
                                                                    <?php endfor; ?>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    <?php endfor; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="panel-pela-cbf">
                        <p>
                            Howdy, I'm in Section 2.
                        </p>
                    </div>
                    <div class="tab-pane" id="panel-pela-con">
                        <p>
                            Howdy, I'm in Section 2.
                        </p>
                    </div>
                    <div class="tab-pane" id="panel-pela-fifa">
                        <p>
                            Howdy, I'm in Section 2.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>