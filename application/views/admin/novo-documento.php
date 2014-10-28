<div class="row-fluid clearfix" style="padding: 2em">
    <form class="form-horizontal" action="<?= base_url() ?>documentos/insert" enctype="multipart/form-data" method="POST">
        <fieldset>

            <!-- Form Name -->
            <legend>Dados do Documento</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="titulo">Titulo</label>  
                <div class="col-md-5">
                    <input id="titulo" name="titulo" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="descricao">Descrição</label>  
                <div class="col-md-5">
                    <input id="descricao" name="descricao" type="text" placeholder="" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="data">Data</label>  
                <div class="col-md-4">
                    <input id="data" name="data" type="text" placeholder="" class="form-control input-md" required="">

                </div>
            </div>

            <!-- File Button --> 
            <div class="form-group">
                <label class="col-md-4 control-label" for="arquivo">Arquivo</label>
                <div class="col-md-4">
                    <input id="arquivo" name="arquivo" class="input-file" type="file">
                </div>
            </div>

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