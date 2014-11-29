<?php
$idgrupo = 0;
$nClass = "";

if ($grupo) {
    $idgrupo = $grupo[0]->idgrupo;
    $nClass = $grupo[0]->n_classificados;
}
?>

<div style="width: 500px; height: 250px">
    <span class="b-close btn btn-danger col-md-offset-12">X</span>
    <form class="form-horizontal" action="javascript:void(0)" id="form-cad-gru">
        <?php if ($idgrupo): ?>
            <input  type="hidden" name="idgrupo" value="<?= $idgrupo ?>" />
        <?php endif; ?>

        <fieldset>

            <!-- Form Name -->
            <legend class="text-center text-info">Cadastro/Editar Grupo</legend>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="gru_tg">Info Grupo</label>
                <div class="col-md-6">
                    <select id="gru_tg" name="gru_tg" class="form-control">
                        <?php foreach ($tipo_grupos as $tg): ?>
                            <option value="<?= $tg->idtipo_grupo ?>"><?= $tg->nome ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="gru_class">Nº Classificados</label>  
                <div class="col-md-6">
                    <input id="gru_class" name="gru_class" placeholder="" class="form-control input-md" type="text"
                           value="<?= $nClass ?>">

                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="btn-save-gru"></label>
                <div class="col-md-8">
                    <button id="btn-save-gru" name="btn-save-gru" class="btn btn-success b-close">Salvar</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<script>
    $(function() {
        $("#btn-save-gru").click(function() {
            var data = $("#form-cad-gru").serialize() + "&idfase=" + idfase;
            if($("#gru_class").val()!=0 && $("#gru_class").val()!=""){
                $.ajax({
                    url: PATH + "grupos/insert",
                    data: data,
                    type: "POST",
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("Erro ao cadastrar grupo!");
                    },
                    success: function(data, textStatus, jqXHR) {
                        showGrupos();
                    }
                });
            }else{
                alert("Número de classificados não pode ser 0!");
            }
        });
    });
</script>