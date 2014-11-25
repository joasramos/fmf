<?php
$idnoticia = 0;
$titulo = "";
$desc = "";
$autor = "";
$data = "";
$img = "";
$dest = 0;
$texto = "";

if (isset($noticia)) {
    $idnoticia = $noticia[0]->idnoticia;
    $titulo = $noticia[0]->titulo;
    $desc = $noticia[0]->descricao;
    $autor = $noticia[0]->autor;
    $data = $noticia[0]->data;
    $img = $noticia[0]->imagem;
    $dest = $noticia[0]->destaque;
    $texto = $noticia[0]->texto;
}
?>

<div class="row-fluid clearfix" style="padding: 2em">
    <div class="col-md-11" >
        <form class="form-horizontal" action="<?= base_url() ?>noticias/insert" method="POST" enctype="multipart/form-data">
            <fieldset>
                <!--CASO ESTEJA EDITANDO UMA NOTICIA-->
                <?php if ($idnoticia): ?>
                    <input type="hidden" value="<?= $noticia[0]->idnoticia ?>" name="idnoticia"/>
                <?php endif; ?>
                <!--FIM CASO-->
                <!-- Form Name -->
                <legend>Informação da Notícia</legend>
                <?= isset($msg) ? $msg : "" ?>
                <h6 class="text-center" style="font-style: italic; margin-bottom: 2em">Informações gerais da notícia...</h6>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="not_titulo">Tag</label>  
                    <div class="col-md-6">
                        <input id="not_titulo" required="" name="not_titulo" placeholder="" 
                               class="form-control input-md" type="text"
                               value="<?= $titulo ?>">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="not_desc">Título</label>  
                    <div class="col-md-8">
                        <input id="not_desc"  required="" name="not_desc" placeholder="" class="form-control input-md" type="text"
                               value="<?= $desc ?>">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="not_autor">Autor</label>  
                    <div class="col-md-4">
                        <input id="not_autor" name="not_autor" placeholder="Não é obrigatorio" 
                               class="form-control input-md" type="text"
                               value="<?= $autor ?>">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="not_data">Data</label>  
                    <div class="col-md-4">
                        <input id="not_data"  required="" name="not_data" placeholder="" 
                               class="form-control input-md" type="text"
                               value="<?php
                               if ($data != "") {
                                   date("d-m-Y", strtotime($data));
                               }
                               ?>">

                    </div>
                </div>

                <?php if ($img == ""): ?>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="not_img">Imagem de Capa</label>  
                        <div class="col-md-5">
                            <input id="not_img"  required="" name="not_img" class="form-control input-md" type="file">

                        </div>
                    </div>
                <?php endif; ?>

                <hr style=""/>
                <h6 class="text-center" style="font-style: italic; margin-bottom: 2em">Sobre quem é a notícia...</h6>
                <!-- Classficacao da noticia -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="not_opt">Referência</label>
                    <div class="col-md-5"> 
                        <select name="not_tipo" class="form-control" id="not_tipo">
                            <?php if ($tipo_n): foreach ($tipo_n as $tn): ?>
                                    <option value="<?= $tn->idtipo_noticia ?>"> <?= $tn->nome ?></option>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </div> 
                </div>

                <!--PAINEL PARA SELEÇÃO DE CLUBE-->
                <div class="form-group" style="display: none" id="pn_sel_clu">
                    <label class="col-md-4 control-label">Selecione o clube</label>
                    <div class="col-md-5"> 
                        <select name="not_clube" class="form-control">
                            <?php
                            if ($clubes):
                                foreach ($clubes as $clu):
                                    ?>
                                    <option value="<?= $clu->idclube ?>"> <?= $clu->apelido ?></option>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </div>
                </div>

                <!--PAINEL PARA SELEÇÃO DE ARBITRO-->
                <div class="form-group" style="display: none" id="pn_sel_arb" >
                    <label class="col-md-4 control-label">Selecione o arbitro</label>
                    <div class="col-md-5"> 
                        <select name="not_arb" class="form-control">
                            <?php if ($arbitragem): foreach ($arbitragem as $arb): ?>
                                    <option value="<?= $arb->idarbitro ?>"> <?= $arb->nome ?></option>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </div>
                </div>

                <!--DESTAQUE-->
                <div class="form-group">
                    <label class="col-md-4 control-label"> Destaque </label>
                    <div class="col-md-1">
                        <input class="form-control" type="checkbox" name="not_dest" <?= $dest ? "checked=''" : "" ?>/>
                    </div>
                </div>

                <!--TEXTO DA NOTICIA-->
                <hr style="margin-bottom:"/>
                <h6 class="text-center" style="font-style: italic; margin-bottom: 2em"></h6>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="not_texto">Texto da notícia</label>
                    <div class="col-md-8">                     
                        <textarea class="form-control" id="not_texto" name="not_texto" cols="10" rows="30">
                            <?= $texto ?>
                        </textarea>
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="btn_save_not"></label>
                    <div class="col-md-8">
                        <button id="btn_save_not" name="btn_save_not" class="btn btn-success">Salvar</button>
                        <button id="btn_canc_not" name="btn_canc_not" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>

            </fieldset>
        </form>

    </div>
</div>

<script>
    $(function() {
        $("select[name='not_tipo']").change(function() {
            var str_sel = $(this).find(":selected").text();
            console.log(str_sel);
            switch (str_sel) {
                case " Clubes":
                    $("#pn_sel_clu").show();
                    $("#pn_sel_arb").hide();
                    break;
                case " Arbitragem":
                    $("#pn_sel_clu").hide();
                    $("#pn_sel_arb").show();
                    break;
                default:
                    $("#pn_sel_clu").hide();
                    $("#pn_sel_arb").hide();
                    break;
            }
        });
    });


</script>