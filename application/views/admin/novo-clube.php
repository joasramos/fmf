<div class="row-fluid clearfix" style="padding: 2em">
    <form class="form-horizontal" action="<?= base_url() ?>clubes/insert" id="form-cad-clu" enctype="multipart/form-data" method="POST">
        <fieldset>

            <!-- Form Name -->
            <legend>Cadastrar/Editar Clube</legend>
            <h3><?= isset($msg) ? $msg : "" ?></h3>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="clu_nome">Nome</label>  
                <div class="col-md-5">
                    <input id="clu_nome" name="clu_nome" placeholder="" class="form-control input-md" required="" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="clu_ape">Apelido</label>  
                <div class="col-md-4">
                    <input id="clu_ape" name="clu_ape" placeholder="" class="form-control input-md" required="" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="clu_fund">Fundação</label>  
                <div class="col-md-4">
                    <input id="clu_fund" name="clu_fund" placeholder="" class="form-control input-md" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="clu_cat">Categoria</label>  
                <div class="col-md-4">
                    <input id="clu_cat" name="clu_cat" placeholder="" class="form-control input-md" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="clu_url">Url</label>  
                <div class="col-md-4">
                    <input id="clu_url" name="clu_url" placeholder="" class="form-control input-md" type="text">

                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="clu_div">Divisão</label>
                <div class="col-md-4">
                    <select id="clu_div" name="clu_div" class="form-control">
                        <?php foreach ($divisoes as $d): ?>
                            <option value="<?= $d->iddivisao ?>"><?= $d->nome ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- File Button --> 
            <div class="form-group">
                <label class="col-md-4 control-label" for="clu_band">Escudo</label>
                <div class="col-md-4">
                    <input id="clu_band" name="clu_band" class="input-file" type="file">
                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="btn_s_clu"></label>
                <div class="col-md-8">
                    <button id="btn_s_clu" name="btn_s_clu" class="btn btn-success">Salvar</button>
                    <button id="btn_cn_clu" name="btn_cn_clu" class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>

<script>
    var PATH = "http://" + URL_FIX + "/" ; 
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

        $("#clu_fund").datepicker({
            dateFormat: "dd-mm-yy"
        });
    });
</script>