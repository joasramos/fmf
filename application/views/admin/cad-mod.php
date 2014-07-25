<div style="width: 500px; height: 250px">
    <span class="b-close btn btn-danger col-md-offset-12">X</span>
    <form class="form-horizontal" id="form-cad-mod" action="javascript:void(0)">
        <fieldset>

            <!-- Form Name -->
            <legend class="text-center text-info">Novo/Editar Módulo</legend>
            <input type="hidden" name="mod_id" value="<?= isset($modulo[0]) ? $modulo[0]->idmodulo : "" ?>"/>
            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="mod_tp">Tipo/Turno</label>
                <div class="col-md-4">
                    <select id="mod_tp" name="mod_tp" class="form-control">                        
                        <?php foreach ($turnos as $turno): ?>
                            <option value="<?= $turno->idturno ?>"><?= $turno->nome ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="mod_nome">Descrição</label>  
                <div class="col-md-5">
                    <input id="mod_nome" name="mod_nome" placeholder="" class="form-control 
                           input-md" type="text" value="<?= isset($modulo[0]) ? $modulo[0]->descricao : "" ?>">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="btn_save_mod"></label>
                <div class="col-md-8">
                    <button id="btn_save_mod" name="btn_save_mod" class="btn btn-success b-close">Salvar</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>

<script>
    $(function() {

        $("#btn_save_mod").click(function() {

            var data = $("#form-cad-mod").serialize() + "&id_comp=" + $("#comp_id").val() + "&mod_id=" + $("input[name='mod_id']").val();

            $.ajax({
                url: PATH + "modulos/insert",
                data: data,
                type: "POST",
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Error ao cadastrar módulo!");
                },
                success: function(data, textStatus, jqXHR) {
                    $("#comp-mod").fadeIn(3000, function() {
                        $(this).html(data);
                        eventos();
                    });
                }
            });
        });
    });
</script>

