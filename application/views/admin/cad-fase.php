<div style="width: 500px; height: 500px">
    <span class="b-close btn btn-danger col-md-offset-12">X</span>
    <fieldset>
        <legend class="text-center text-info"> Cadastrar/Editar Fase</legend>
        <form id="form-cad-fase" action="javascript:void(0)">
            <?php if (isset($fase[0]->idfase)): ?>
                <input  type="hidden" name="idfase" value="<?= $fase[0]->idfase ?>" />
            <?php endif; ?>
            <div class="row-fluid clearfix" >
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="tf_nome">Tipo Fase</label>  
                        <div class="col-md-12">
                            <select id="tipo_fase" name="tipo_fase" placeholder="" class="form-control" value="" >
                                <?php foreach ($tipo_fases as $v): ?>
                                    <option value="<?= $v->idtipo_fase ?>"><?= $v->nome ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>                                
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="fase_dec">Descrição</label>  
                        <div class="col-md-12">
                            <input id="fase_desc" name="fase_desc" placeholder="" class="form-control" type="text" 
                                   value="<?= isset($fase[0]->descricao) ? $fase[0]->descricao : "" ?>" >
                        </div>
                    </div>                                
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="fase_n_jog">Nº Jogos</label>  
                        <div class="col-md-10">
                            <input id="fase_n_jog" name="fase_n_jog" placeholder="" class="form-control" type="text" 
                                   value="<?= isset($fase[0]->n_jogos) ? $fase[0]->n_jogos : "" ?>" >
                        </div>
                    </div>
                    <div class="form-group" style="padding-top: 3em">
                        <label class="col-md-3 control-label" for="fase_ida_volta">Ida e Volta</label>  
                        <div class="col-md-4">
                            <label class="checkbox-inline" for="checkboxes-0">
                                <input id="fase_ida_volta" name="fase_ida_volta" type="checkbox">
                            </label>
                        </div>
                    </div>
                    <div class="form-group" style="padding-top: 2em">
                        <label class="col-md-12 control-label" for="fase_n_gru">Nº Grupos</label>  
                        <div class="col-md-4">
                            <input id="fase_n_gru" name="fase_n_gru" placeholder="" class="form-control" type="text" 
                                   value="<?= isset($fase[0]->n_grupos) ? $fase[0]->n_grupos : "" ?>" >
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group" style="padding-top: 3em">
                        <label class="col-md-4 control-label" for="btn_save_fase"></label>
                        <div class="col-md-8">
                            <button id="btn_save_fase" name="btn_save_fase" class="btn btn-success b-close">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </fieldset>
</div>
<script>
    $(function() {
        $("#btn_save_fase").click(function() {
            var data = $("#form-cad-fase").serialize() + "&idmod=" + idmod;

            $.ajax({
                url: PATH + "fases/insert",
                data: data,
                type: "POST",
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Erro ao cadastrar fase!");
                },
                success: function(data, textStatus, jqXHR) {
                    showFases();
                }
            });
        });
    });
</script>