
<!--VIEW PARA CADASTRAR OU EDITAR UM MODULO-->

<div style="width: 480px; height: 250px; padding: 0">
    <span class="b-close btn btn-danger col-md-offset-11">&nbsp;x&nbsp;</span>
    <form class="form-horizontal" id="form-cad-mod" action="javascript:void(0)">
        <fieldset>

            <!-- Form Name -->
            <legend class="text-center text-info">Informações do Módulo</legend>
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

            /*
             * 
             * Serializamos os dados vindos do form de cadastro de módulo
             */
            var data = $("#form-cad-mod").serialize() + "&id_comp=" + $("#comp_id").val() + "&mod_id=" + $("input[name='mod_id']").val();

            /*
             * Realizamos uma requisão ajax para armazenar o módulo
             */
            $.ajax({
                url: PATH + "modulos/insert",
                data: data,
                type: "POST",
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Error ao cadastrar módulo!");
                },
                success: function(data, textStatus, jqXHR) {
                    /*
                     * Depois que inserimos um módulo o painel de módulos é recarregado
                     */
                    $("#comp-mod").fadeIn(3000, function() {
                        $(this).html(data);
                        /*
                         * É importante recarregar os eventos do painel
                         */
                        eventos();
                    });
                }
            });
        });
    });
</script>

