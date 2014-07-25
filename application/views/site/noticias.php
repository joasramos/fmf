<hidden aba-active='<?= $aba_active ?>'> </hidden>
<script>
    /**
     * Script para controlar exibição das Abas
     */
    $(document).ready(function() {
        var aba = $("hidden").attr("aba-active");
        if(aba.indexOf('_')){
            aba = aba.replace("_"," ");
        }
        if (aba) {
            $.each($(".nav.nav-tabs li a"), function() {
                $(this).parent("li").removeClass("active");
                if (aba == $(this).text()) {

                    $(this).parent("li").addClass("active");
                    var this_aba = $(this).attr('href');

                    $.each($(".tab-content .tab-pane"), function() {
                        $(this).removeClass("active");
                        if ("#" + $(this).attr("id") == this_aba) {
                            $(this).addClass("active");
                        }
                    });
                }
            });
        }
    });
</script>
<h2 class="title-header-content">
    Notícias
</h2>

<div class="container">
    <div class="row clearfix">
        <div class="col-md-10 column bg-white box-shadow" style="padding: 0">
            <div class="tabbable" id="tabs-234364">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#panel-ult-noticias" data-toggle="tab">Ultimas</a>
                    </li>
                    <li>
                        <a href="#panel-clubes" data-toggle="tab">Clubes</a>
                    </li>
                    <li>
                        <a href="#panel-arbit" data-toggle="tab">Arbitragem</a>
                    </li>
                    <li>
                        <a href="#panel-fmf-acon" data-toggle="tab">FMF Acontece</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="panel-ult-noticias">
                        <div class="row-fluid clearfix">
                            <div class="col-md-8"> 
                                <?php if ($news_selected && isset($news_selected['news_selected_last'])): ?>
                                    <h5><?= $news_selected['news_selected_last'][0]->titulo ?></h5>
                                    <h3><?= $news_selected['news_selected_last'][0]->descricao ?></h3>
                                    <div class='col-md-12'>
                                        <img src='<?= base_url() ?>assets/images/noticias/<?= $news_selected['news_selected_last'][0]->imagem ?>'
                                             width="400" height="300">
                                    </div>
                                    <div class='col-md-12'>
                                        <?= $news_selected['news_selected_last'][0]->texto ?>
                                    </div>
                                    <a class='btn btn-inverse btn-default' href='<?= base_url() ?>noticias'> Retornar</a>
                                <?php else: ?>
                                    <p class="titulo">
                                        Últimas Notícias
                                    </p>
                                    <div class="cont-border-dott">
                                        <!--CARREGAMOS ULTIMAS NOTICIAS-->
                                        <?php foreach ($last_news as $last): ?>
                                            <div class='row-fluid clearfix border-bottom-dotted border-right-dotted margin-default'>
                                                <div class='col-md-2'>
                                                    <h6 class="borda-right-marrom">
                                                        <?= date("d/m/Y", strtotime($last->data)) ?>
                                                    </h6>
                                                </div>
                                                <div class='col-md-10'>
                                                    <h6 class="title-simple"> <?= $last->titulo ?> </h6>
                                                    <p> 
                                                        <a class="link-default" href='<?= base_url() ?>noticias/index/Ultimas/<?= $last->url ?>'>
                                                            <?= $last->descricao ?>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                            <?php
                                        endforeach;
                                        echo "</div>";
                                    endif;
                                    ?>

                                    <!--FIM DO CARREGAMENTO-->
                                </div>
                                <div class="col-md-4 padding-default"> 
                                    <div class="fb-like-box" style="float: right; margin-right: 0; margin-top: 0.811111em" data-href="https://www.facebook.com/pages/Federa%C3%A7%C3%A3o-Maranhense-de-Futebol-FMF/630817553600054" 
                                         data-colorscheme="light" data-show-faces="true" 
                                         data-header="true" data-stream="false" 
                                         data-show-border="true" data-height='342'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="panel-clubes">
                            <div class="row-fluid clearfix">
                                <div class="col-md-8"> 
                                    <?php if ($news_selected && isset($news_selected['news_selected_clubes'])): ?>
                                        <h5><?= $news_selected['news_selected_clubes'][0]->titulo ?></h5>
                                        <h3><?= $news_selected['news_selected_clubes'][0]->descricao ?></h3>
                                        <div class='col-md-12'>
                                            <img src='<?= base_url() ?>assets/images/noticias/<?= $news_selected['news_selected_clubes'][0]->imagem ?>'
                                                 width="400" height="300">
                                        </div>
                                        <div class='col-md-12'>
                                            <?= $news_selected['news_selected_clubes'][0]->texto ?>
                                        </div>
                                        <a class='btn btn-inverse btn-default' href='<?= base_url() ?>noticias'> Retornar</a>
                                    <?php else: ?>

                                        <p class="titulo">
                                            Últimas Notícias dos Clubes
                                        </p>
                                        <div class="cont-border-dott">
                                            <!--CARREGAMOS ULTIMAS CLUBES-->
                                            <?php foreach ($last_news_clubes as $last): ?>
                                                <div class='row-fluid clearfix border-bottom-dotted border-right-dotted margin-default'>
                                                    <div class='col-md-2'>
                                                        <h6 class="borda-right-marrom">
                                                            <?= date("d/m/Y", strtotime($last->data)) ?>
                                                        </h6>
                                                    </div>
                                                    <div class='col-md-10'>
                                                        <h6 class="title-simple"> <?= $last->titulo ?> </h6>
                                                        <p> 
                                                            <a class='link-default' href='<?= base_url() ?>noticias/index/Clubes/<?= $last->url ?>'>
                                                                <?= $last->descricao ?>
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <?php
                                            endforeach;
                                            echo "</div>";
                                        endif;
                                        ?>

                                        <!--FIM DO CARREGAMENTO-->
                                    </div>
                                    <div class="col-md-4 padding-default"> 
                                        <div class="fb-like-box" style="float: right; margin-right: 0; margin-top: 0.811111em" data-href="https://www.facebook.com/pages/Federa%C3%A7%C3%A3o-Maranhense-de-Futebol-FMF/630817553600054" 
                                             data-colorscheme="light" data-show-faces="true" 
                                             data-header="true" data-stream="false" 
                                             data-show-border="true" data-height='342'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="panel-arbit">
                                <div class="row-fluid clearfix">
                                    <div class="col-md-8"> 
                                        <p class="titulo">
                                            Últimas Notícias dos Arbítros
                                        </p>
                                        <!--CARREGAMOS ULTIMAS NOTICIAS-->
                                        <?php foreach ($last_news_arbitragem as $last): ?>
                                            <div class='row-fluid clearfix'>
                                                <div class='col-md-2'>
                                                    <h6>
                                                        <?= date("d/m/Y", strtotime($last->data)) ?>
                                                    </h6>
                                                </div>
                                                <div class='col-md-10'>
                                                    <h6> <?= $last->titulo ?> </h6>
                                                    <p> 
                                                        <a href='<?= base_url() ?>noticias/index/Arbitragem/<?= $last->url ?>'>
                                                            <?= $last->descricao ?>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <!--FIM DO CARREGAMENTO-->
                                    </div>
                                    <div class="col-md-4 padding-default"> 
                                        <div class="fb-like-box" style="float: right; margin-right: 0; margin-top: 0.811111em" data-href="https://www.facebook.com/pages/Federa%C3%A7%C3%A3o-Maranhense-de-Futebol-FMF/630817553600054" 
                                             data-colorscheme="light" data-show-faces="true" 
                                             data-header="true" data-stream="false" 
                                             data-show-border="true" data-height='342'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="panel-fmf-acon">
                                <div class="row-fluid clearfix">
                                    <div class="col-md-8">
                                        <?php if ($news_selected && isset($news_selected['news_selected_fmf'])): ?>
                                            <h5><?= $news_selected['news_selected_fmf'][0]->titulo ?></h5>
                                            <h3><?= $news_selected['news_selected_fmf'][0]->descricao ?></h3>
                                            <div class='col-md-12'>
                                                <img src='<?= base_url() ?>assets/images/noticias/<?= $news_selected['news_selected_fmf'][0]->imagem ?>'
                                                     width="400" height="300">
                                            </div>
                                            <div class='col-md-12'>
                                                <?= $news_selected['news_selected_fmf'][0]->texto ?>
                                            </div>
                                            <a class='btn btn-inverse btn-default' href='<?= base_url() ?>noticias'> Retornar</a>
                                        <?php else: ?>
                                            <p class="titulo">
                                                FMF Acontece
                                            </p>
                                            <!--CARREGAMOS ULTIMAS FMF ACONTECE-->
                                            <div class="cont-border-dott">
                                                <?php foreach ($last_news_fmf as $last): ?>
                                                    <div class='row-fluid clearfix border-bottom-dotted border-right-dotted margin-default'>
                                                        <div class='col-md-2'>
                                                            <h6 class="borda-right-marrom">
                                                                <?= date("d/m/Y", strtotime($last->data)) ?>
                                                            </h6>
                                                        </div>
                                                        <div class='col-md-10'>
                                                            <h6 class="title-simple"> <?= $last->titulo ?> </h6>
                                                            <p> 
                                                                <a class='link-default' href='<?= base_url() ?>noticias/index/FMF_Acontece/<?= $last->url ?>'>
                                                                    <?= $last->descricao ?>
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <?php
                                                endforeach;
                                                echo "</div>";
                                            endif;
                                            ?>
                                            <!--FIM DO CARREGAMENTO-->
                                        </div>
                                        <div class="col-md-4 padding-default">
                                            <div class="fb-like-box" style="float: right; margin-right: 0; margin-top: 0.811111em" data-href="https://www.facebook.com/pages/Federa%C3%A7%C3%A3o-Maranhense-de-Futebol-FMF/630817553600054" 
                                                 data-colorscheme="light" data-show-faces="true" 
                                                 data-header="true" data-stream="false" 
                                                 data-show-border="true" data-height='342'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

