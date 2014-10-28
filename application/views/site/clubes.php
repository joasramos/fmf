<style>
    .dados-clube:hover{
        background-color: #d4ccb0;
        cursor: pointer;
    }    
</style>
<h2 class="title-header-content">
    Clubes Filiados
</h2>

<div class="container">
    <div class="row clearfix">
        <div class="col-md-10 column bg-white box-shadow" style="padding: 0">
            <div class="tabbable" id="tabs-234364">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#panel-serie-a" data-toggle="tab">Série "A"</a>
                    </li>
                    <li>
                        <a href="#panel-serie-b" data-toggle="tab">Série "B"</a>
                    </li>
                    <li>
                        <a href="#panel-amadores" data-toggle="tab">Amadores</a>
                    </li>
                    <li>
                        <a href="#panel-licen" data-toggle="tab">Licenciamento de Clubes</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="panel-serie-a">
                        <div class="row-fluid clearfix">
                            <div class="col-md-12"> 
                                <p class="titulo">
                                    Clubes pertencentes à Série "A"
                                </p>
                                <?php for ($i = 0; $i < $serie_a[0]->n_times; $i+=2): ?>
                                    <div class="row-fluid clearfix">
                                        <div class="col-md-6 padding-default sombra-right dados-clube" id="<?= $serie_a[$i]->idclube ?>">
                                            <div class="col-md-4">
                                                <img class='img-default' width="64" height="64" src="<?= base_url() ?>assets/images/escudos/<?= $serie_a[$i]->bandeira ?>">
                                            </div>
                                            <div class="col-md-8">
                                                <h4 class='text-noticia'> <?= $serie_a[$i]->apelido ?> </h4>
                                                <h5 class='title-simple'> <?= $serie_a[$i]->nome ?></h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6 padding-default sombra-right dados-clube" id="<?= $serie_a[$i + 1]->idclube ?>">
                                            <div class="col-md-4">
                                                <img class='img-default' width="64" height="64" src="<?= base_url() ?>assets/images/escudos/<?= $serie_a[$i + 1]->bandeira ?>">
                                            </div>
                                            <div class="col-md-8">
                                                <h4 class='text-noticia'> <?= $serie_a[$i + 1]->apelido ?> </h4>
                                                <h5 class='title-simple'> <?= $serie_a[$i + 1]->nome ?></h5>
                                            </div>
                                        </div>
                                    </div>                                
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="panel-serie-b">
                        <p>
                            Não há clubes cadastrados
                        </p>
                    </div>
                    <div class="tab-pane" id="panel-amadores">
                        <p>
                            Não há clubes cadastrados
                        </p>
                    </div>
                    <div class="tab-pane" id="panel-licen">
                        <p class='titulo'>
                            Licenciamento
                        </p>
                    </div>
                    <!--PAINEL QUE SERÁ CARREGADO COM DETALHES DO CLUBE-->
                    <div class="row-fluid clearfix">
                        <div class="col-md-12" id="detail_clube" style="display: none">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        var PATH = "http://" + URL_FIX + "/";
        $(".dados-clube").click(function() {
            var idclube = $(this).attr("id"); 
            $("#detail_clube").bPopup({
                loadUrl: PATH + "clubes/showDetailClube/" + idclube
            });
        });
    });
</script>