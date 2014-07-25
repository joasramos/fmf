<div style="width: 600px; height: 300px">
    <span class="b-close btn btn-danger col-md-offset-12">X</span>
    <form class="form-horizontal" id="form-cad-doc" action="javascript:void(0)">
        <fieldset>
            <legend class="text-center text-info">Novo/Editar Documento</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="doc_titulo">Título</label>  
                <div class="col-md-5">
                    <input id="doc_titulo" name="doc_titulo" placeholder="" class="form-control input-md" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="doc_desc">Descrição</label>  
                <div class="col-md-5">
                    <input id="doc_desc" name="doc_desc" placeholder="" class="form-control input-md" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="doc_data">Data</label>  
                <div class="col-md-4">
                    <input id="doc_data" name="doc_data" placeholder="" class="form-control input-md" type="text">

                </div>
            </div>

            <!-- File Button --> 
            <div class="form-group">
                <label class="col-md-4 control-label" for="doc_file">Arquivo</label>
                <div class="col-md-4">
                    <input id="doc_file" name="doc_file" class="input-file" type="file">
                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="bt-save-doc"></label>
                <div class="col-md-8">
                    <button id="btn_save_doc" name="bt-save-doc" class="btn btn-success b-close">Salvar</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>

<script>
    $(function() {

        $("#btn_save_doc").click(function() {

            var data = $("#form-cad-doc").serialize() + "&id_comp=" + $("#comp_id").val();
            
            $.ajax({
                url: PATH + "documentos/insert",
                data: data,
                type: "POST",
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Error ao cadastrar documento!");
                },
                success: function(data, textStatus, jqXHR) {
                    /**
                     $("#comp-mod").fadeIn(3000, function() {
                     $(this).html(data);
                     eventos();
                     });*/
                    console.log(data);
                }
            });
        });
    });
</script>

