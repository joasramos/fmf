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

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="not_url">Url</label>  
                    <div class="col-md-5">
                        <input id="not_url" name="not_url" placeholder="" class="form-control input-md" type="text">

                    </div>
                </div>

                <!-- File Button --> 
                <div class="form-group">
                    <label class="col-md-4 control-label" for="not_img">Imagem</label>
                    <div class="col-md-4">
                        <input id="not_img" name="not_img" class="input-file" type="file">
                    </div>
                </div>

                <!-- Multiple Radios (inline) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="not_opt">Opções Adicionais</label>
                    <div class="col-md-5"> 
                        <label class="radio-inline" for="not_opt-0">
                            <input name="not_opt" id="not_opt-0" value="arb" checked="checked" type="radio">
                            Árbitro
                        </label> 
                        <label class="radio-inline" for="not_opt-1">
                            <input name="not_opt" id="not_opt-1" value="clu" type="radio">
                            Clube
                        </label> 
                        <label class="radio-inline" for="not_opt-2">
                            <input name="not_opt" id="not_opt-2" value="com" type="radio">
                            Competição
                        </label> 
                        <label class="radio-inline" for="not_opt-3">
                            <input name="not_opt" id="not_opt-3" value="fmf" type="radio">
                            FMF Acontece
                        </label>
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