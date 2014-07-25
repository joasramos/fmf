<div class="row-fluid clearfix box-shadow bg-white sombra-bottom">
    <div class="col-md-7 sombra-right col-xs-7 col-sm-7">
        <div class="camera_wrap camera_magenta_skin" id="camera_wrap_2">
            <?php for ($i = 0; $i < 3; $i++): ?>
                <div data-thumb="<?= base_url() ?>assets/images/noticias/<?= $news[$i]->imagem ?>" 
                     data-src="<?= base_url() ?>assets/images/noticias/<?= $news[$i]->imagem ?>">
                    <div class="camera_caption fadeFromBottom">
                        <?= $news[$i]->titulo ?> 
                        <em><?= $news[$i]->descricao ?> </em>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <div class="col-md-4 col-xs-4 col-sm-4 sombra-right border-left-dotted" style='margin-left: 1.333333%; width: 39.33333333%'>
        <label class="titulo-box" style=' margin-top: 3.822222%; margin-bottom: -1.822222%; color: black'> ÚLTIMOS DOCUMENTOS </label>
        <dl  class="border-bottom-dotted border-right-dotted border-left-dotted border-top-dotted padding-default"> 
            <?php foreach ($documentos as $documento): ?>
                <dt class="borda-right-marrom">
                <label class="label titulo-box" style="/*font-size: 14px;*/ white-space: pre-line;"> 
                    <?= $documento->titulo ?>
                </label>
                <h5 style='/*line-height: 150%*/'> 
                    <a style="color: black; font-weight: bold" href="<?= base_url() . 'assets/documentos/' . $documento->url ?>"> 
                        <?= $documento->descricao ?>
                    </a>
                </h5>
                </dt>
            <?php endforeach; ?>
        </dl>
    </div>
</div>

<div class="row-fluid clearfix box-shadow-simple bg-white">
    <?php for ($i = 0; $i < 2; $i++): ?>
        <div class="col-md-6 col-sm-6 col-xs-6 border-left-dotted sombra-right padding-default" style="height: 200px;">
            <a href="<?= base_url() ?>noticias/index/<?=$news_destaque[$i]->nome?>/<?= $news_destaque[$i]->url ?>">
                <img src="<?= base_url() ?>assets/images/noticias/<?= $news_destaque[$i]->imagem ?>" width="200" height="150" class="img-default">
            </a>
            <h4 class="titulo-box"><?= $news_destaque[$i]->titulo ?></h4>
            <p class="text-noticia">
                <a style="color:black" href="<?= base_url() ?>noticias/index/<?=$news_destaque[$i]->nome?>/<?= $news_destaque[$i]->url ?>">
                    <?= $news_destaque[$i]->descricao ?>
                </a>
            </p>
        </div>
    <?php endfor; ?>

    <div class="col-md-7 col-sm-7 col-xs-7 sombra-right border-left-dotted" style='margin-top: 30px'>
        <?php for ($i = 0; $i < 6; $i+=2): ?>
            <div class="row-fluid clearfix border-bottom-dotted">
                <div class="col-md-6 col-sm-6 col-xs-6 border-right-dotted">
                    <h4 class="titulo-box fonte-media"><?= $news[$i]->titulo ?></h4>
                    <p class="text-noticia fonte-media">
                        <?= $news[$i]->descricao ?>
                    </p>
                </div> 
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h4 class="titulo-box fonte-media"><?= $news[$i + 1]->titulo ?></h4>
                    <p class="text-noticia fonte-media">
                        <?= $news[$i + 1]->descricao ?>
                    </p>
                </div>
            </div>
        <?php endfor; ?>
    </div>
    <div class="col-md-5" style="margin-top: 30px; padding-right: 0">
        <div class="fb-like-box" style="float: right; margin-right: 0" data-href="https://www.facebook.com/pages/Federa%C3%A7%C3%A3o-Maranhense-de-Futebol-FMF/630817553600054" 
             data-colorscheme="light" data-show-faces="true" 
             data-header="true" data-stream="false" 
             data-show-border="true" data-height='342'>
        </div>
    </div>
</div>

<div class="row-fluid clearfix">
    <img style='padding: 5px; border: 1px #ececec dotted' src="<?= base_url() ?>assets/banners/ficha.jpg"/>
</div>

<div id="fb-root"></div>

<script>
    jQuery(function() {

        jQuery('#camera_wrap_2').camera({
            thumbnails: false,
            navigation: false,
            navigationHover: false
        });
    });

//    (function(d, s, id) {
//        var js, fjs = d.getElementsByTagName(s)[0];
//        if (d.getElementById(id))
//            return;
//        js = d.createElement(s);
//        js.id = id;
//        js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
//        fjs.parentNode.insertBefore(js, fjs);
//    }(document, 'script', 'facebook-jssdk'));

</script>

