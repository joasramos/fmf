<!--VIEW PARA EXIBIR TODOS OS DOCUMENTOS-->


<h3 class="title-header-content">
    Documentos
</h3>

<div class="container">
    <div class="row clearfix">        
        <div class="col-md-10 column bg-white box-shadow" style="padding: 1em">
            <!--            <div class="col-md-4 col-xs-4 col-sm-4 sombra-right border-left-dotted" style='margin-left: 1.333333%; width: 39.33333333%'>-->
            <!--                <label class="titulo-box" style=' margin-top: 3.822222%; margin-bottom: -1.822222%; color: black'> 
                                <a href="<?= base_url() ?>documentos/todos"> DOCUMENTOS </a>
                            </label>-->
            <dl  class="border-bottom-dotted border-right-dotted border-left-dotted border-top-dotted padding-default" style=""> 
                <?php foreach ($documentos as $documento): ?>
                    <dt class="borda-right-marrom border-bottom-dotted" style="margin-top: 2em">
                    <h6><?= date("d-m-Y", strtotime($documento->data)) ?></h6>
                    <label class="label titulo-box" style="/*font-size: 14px;*/ white-space: pre-line;"> 
                        <?= $documento->titulo ?>
                    </label>
                    <h5 style='/*line-height: 150%*/'> 
                        <a style="color: black; font-weight: bold" target="_blank" href="<?= base_url() . 'assets/documentos/' . $documento->url ?>"> 
                            <?= $documento->descricao ?>
                        </a>
                    </h5>
                    </dt>
                <?php endforeach; ?>
            </dl>
            <!--            </div>-->
        </div>
    </div>
</div>

