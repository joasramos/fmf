<div class="row-fluid clearfix" style="padding: 2em">
    <div class="col-md-11" >
        <form class="form-horizontal" action="<?= base_url() ?>noticias/insert" method="POST" enctype="multipart/form-data">
            <fieldset>

                <!-- Form Name -->
                <legend>Cadastro/Edição de Notícia</legend>
                <?= isset($msg) ? $msg : "" ?>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="not_titulo">Tag</label>  
                    <div class="col-md-6">
                        <input id="not_titulo" required="" name="not_titulo" placeholder="" class="form-control input-md" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="not_desc">Titulo</label>  
                    <div class="col-md-8">
                        <input id="not_desc"  required="" name="not_desc" placeholder="" class="form-control input-md" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="not_autor">Autor</label>  
                    <div class="col-md-4">
                        <input id="not_autor" name="not_autor" placeholder="" class="form-control input-md" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="not_data">Data</label>  
                    <div class="col-md-4">
                        <input id="not_data"  required="" name="not_data" placeholder="" class="form-control input-md" type="text">

                    </div>
                </div>

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
                        <input class="form-control" type="checkbox" name="not_dest" />
                    </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="not_texto">Texto da Notícia</label>
                    <div class="col-md-8">                     
                        <textarea class="form-control" id="not_texto" name="not_texto" cols="" rows="30"></textarea>
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