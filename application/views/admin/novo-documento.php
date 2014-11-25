<?php
$iddocumento = 0;
$titulo = "";
$desc = "";
$data = "";
$file = "";
if (isset($documento)) {
    $iddocumento = $documento[0]->iddocumento;
    $titulo = $documento[0]->titulo;
    $desc = $documento[0]->descricao;
    $data = $documento[0]->data;
    $file = $documento[0]->url; 
}
?>

<div class="row-fluid clearfix" style="padding: 2em">
    <form class="form-horizontal" action="<?= base_url() ?>documentos/insert" enctype="multipart/form-data" method="POST">
        <fieldset>

            <!-- Form Name -->
            <legend>Dados do Documento</legend>
            <?php if ($iddocumento): ?>
                <input type="hidden" value="<?= $iddocumento ?>" name="iddocumento"/>
            <?php endif; ?>
            <!-- Text input--> 
            <div class="form-group">
                <label class="col-md-4 control-label" for="titulo">Titulo</label>  
                <div class="col-md-5">
                    <input id="titulo" name="titulo" type="text" placeholder="" 
                           class="form-control input-md" value="<?= $titulo ?>">                    
                </div> 
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="descricao">Descrição</label>  
                <div class="col-md-5">
                    <input id="descricao" name="descricao" type="text" placeholder="" 
                           class="form-control input-md" required="" value="<?= $desc ?>">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="data">Data</label>  
                <div class="col-md-4">
                    <input id="data" name="data" type="text" placeholder="" 
                           class="form-control input-md" required="" value="<?php
                           if ($data != "") {
                               echo date("d-m-Y", strtotime($data));
                           }
                           ?>">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="data">Setores</label>  
                <div class="col-md-4">
                    <select id="selectbasic" name="setor" class="form-control">
                        <?php foreach ($setores as $setor): ?>
                            <option value="<?= $setor->idsetor ?>"> <?= $setor->nome ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- File Button --> 
            <?php if ($file == ""): ?>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="arquivo">Arquivo</label>
                    <div class="col-md-4">
                        <input id="arquivo" name="arquivo" class="input-file" type="file">
                    </div>
                </div>
            <?php endif; ?>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="btn_salvar"></label>
                <div class="col-md-8">
                    <button id="btn_salvar" name="btn_salvar" class="btn btn-success">Salvar</button>
                    <button id="btn_cancel" name="btn_cancel" class="btn btn-danger">Cancelar</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>

<script>
    var PATH = "http://" + URL_FIX + "/";
    $(function() {
        /*
         $("#btn_s_clu").click(function() {
         var data = $("#form-cad-clu").serialize();
         
         $.ajax({
         url: PATH + "clubes/insert",
         type: "POST",
         data: data,
         error: function(jqXHR, textStatus, errorThrown) {
         
         },
         success: function(data, textStatus, jqXHR) {
         console.log(data);
         }
         });
         });*/

        $("#data").datepicker({
            dateFormat: "dd-mm-yy"
        });
    });
</script>