<?php
$id = 0;
$nome = "";
$ap = "";
$ano = "";
$mod = "";
$reb = "";
$url = "";
if (isset($comp)) {
    $id = $comp[0]->idcompeticao;
    $nome = $comp[0]->nome;
    $ap = $comp[0]->apelido;
    $ano = $comp[0]->ano;
    $mod = $comp[0]->n_modulos;
    $reb = $comp[0]->n_rebaixados;
    $url = $comp[0]->url;
}
?>

<div class="row clearfix" style="padding-top: 2em">
    <h3 class="text-center text-info"> <?= isset($nome) ? $nome : "" ?></h3>
    <div class="col-md-12 column">
        <div class="tabbable" id="tabs-88058">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#p_comp" data-toggle="tab">Descrição</a>
                </li>
                <li>
                    <a href="#p_mod" data-toggle="tab">Módulos</a>
                </li> 
                <li>
                    <a href="#p_doc" data-toggle="tab">Documentos</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="p_comp">
                    <?php include 'comp.php'; ?>
                </div>
                <div class="tab-pane" id="p_mod" style="margin: 2em">
                    <div class="row-fluid clearfix" id="comp-mod">
                        <?php include 'list-mod.php' ?>
                    </div>
                    <div class="row-fluid clearfix" id="comp-fases" style="padding-top: 2em">

                    </div>
                    <div class="row-fluid clearfix" id="comp-grupos" style="padding-top: 2em">

                    </div>
                    <div class="row-fluid clearfix" id="comp-conv" style="padding-top: 2em">

                    </div>
                    <div class="row-fluid clearfix" id="comp-rod">

                    </div>
                    <div class="row-fluid clearfix" id="comp-jogos" style="padding-top: 2em">

                    </div>
                </div>
                <div class="tab-pane" id="p_doc">
                    <?php include 'list-doc.php'; ?>
                </div>
                <div class="tab-pane" id="p_arb">

                </div>
            </div>
        </div>
    </div>
</div>