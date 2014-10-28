<style>
    .dados-arb:hover{
        background-color: #d4ccb0;
        cursor: pointer;
    }    
</style>
<h3 class="title-header-content">
    Arbitragem
</h3>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-10 column bg-white box-shadow" style="padding: 0">
            <div class="tabbable" id="tabs-234364">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#panel-arbitros" data-toggle="tab">Arbitros</a>
                    </li>
                    <li>
                        <a href="#panel-regulamento" data-toggle="tab">Regulamento</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="panel-arbitros">
                        <div class="row-fluid clearfix">
                            <div class="col-md-12"> 
                                <p class="titulo">
                                    Arbitros da Federação
                                </p>
                                <?php for ($i = 0; $i < 18; $i+=2): ?>
                                    <div class="row-fluid clearfix">
                                        <div class="col-md-6 padding-default dados-arb" id="<?=$arbitros[$i]->idarbitro ?>">
                                            <div class="col-md-4">
                                                <img width="64" src="<?= base_url() ?>assets/themes/default/images/arbitro.gif">
                                            </div>
                                            <div class="col-md-8">
                                                <h4> <?= $arbitros[$i]->nome ?> </h4>
                                                <h5> <?= $arbitros[$i]->cargo_fmf ?></h5>
                                                <h5> <?= $arbitros[$i + 1]->categoria ?></h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6 padding-default dados-arb" id="<?=$arbitros[$i + 1]->idarbitro ?>">
                                            <div class="col-md-4">
                                                <img width="64" src="<?= base_url() ?>assets/themes/default/images/arbitro.gif">
                                            </div>
                                            <div class="col-md-8">
                                                <h4> <?= $arbitros[$i + 1]->nome ?> </h4>
                                                <h5> <?= $arbitros[$i + 1]->cargo_fmf ?></h5>
                                                <h5> <?= $arbitros[$i + 1]->categoria ?></h5>
                                            </div>
                                        </div>
                                    </div>                                
                                <?php endfor; ?>
                            </div>
                            <!--                            <div class="col-md-4"> </div>-->
                        </div>
                    </div>
                    <div class="tab-pane" id="panel-regulamento">
                        <div class="row-fluid clearfix">
                            <div class="col-md-8"> 
                                <p class="titulo">
                                    Regulamento
                                </p>
                            </div>
                            <div class="col-md-4"> </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--PAINEL QUE SERÁ CARREGADO COM DETALHES DO CLUBE-->
    <div class="row-fluid clearfix">
        <div class="col-md-12" id="detail_arb" style="display: none">

        </div>
    </div>
</div>


<script>
    $(function() {
        var PATH = "http://" + URL_FIX + "/";
        $(".dados-arb").click(function() {
            var idarb = $(this).attr("id");            
            $("#detail_arb").bPopup({
                loadUrl: PATH + "arbitragens/showDetailArbitro/" + idarb
            });            
        });
    }); 
</script>