<div style="width: 1024px; height: 668px; background-color: white">
    <span class="b-close btn btn-danger col-md-offset-12">X</span>
    <div class="row-fluid clearfix">
        <!--IMAGEM E INFORMAÇÕES BÁSICAS DO CLUBE-->
        <div class="col-md-12">
            <div class="row-fluid clearfix">
                <div class="col-md-offset-3 col-md-6 padding-default sombra-right">
                    <div class="col-md-5">
                        <img class='img-default' width="128" height="128" src="<?= base_url() ?>assets/themes/default/images/arbitro.gif">
                    </div>
                    <div class="col-md-7">
                        <h3 class='text-noticia'> <?= $arb_info[0]->nome ?> </h3>
                        <h4 class='title-simple'> <?= " ".$arb_info[0]->cargo_fmf ?></h4>
                        <hr/>
                        <h5 class='title-simple'> Nascido em: <?= date("d-m-Y", strtotime($arb_info[0]->nascimento)) ?></h5>
                        <h5 class='title-simple'> Categoria: <?= $arb_info[0]->categoria ?></h5>
                    </div>
                </div>
            </div>
        </div>

        <!--INFORMAÇÕES GERAIS DO CLUBE-->
        <div class="col-md-12">
            <h4 class="text-center">Informações Gerais</h4>
            <div class="tabbable sombra">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#panel-not-arb" data-toggle="tab">Notícias</a>
                    </li>
                    <li>
                        <a href="#panel-jog-arb" data-toggle="tab">Jogos</a>
                    </li>
                </ul>
                <div class="tab-content" style="height: 335px; overflow: auto">
                    <div class="tab-pane active" id="panel-not-arb">
                        
                    </div>
                    <div class="tab-pane" id="panel-jog-arb">
                        
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

