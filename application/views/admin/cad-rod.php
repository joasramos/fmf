<?php
$idrodada = 0;
$ape = "";
$n_jogos = 0;

if ($rodada) {
    $idrodada = $rodada[0]->idrodada;
    $ape = $rodada[0]->apelido;
    $n_jogos = $rodada[0]->n_jogos;
}
?>

<div style="width: 400px; height: 300px">
    <span class="b-close btn btn-danger col-md-offset-11">x</span>
    <fieldset>
        <legend class="text-center text-info"> Informações da Rodada </legend>
        <form id="form-cad-rod" action="javascript:void(0)" class="form-horizontal">
            <?php if ($idrodada): ?>
                <input  type="hidden" name="idrodada" value="<?= $idrodada ?>" />
            <?php endif; ?>

            <div class="form-group">
                <label class="col-md-4 control-label" for="apelido">Apelido</label>  
                <div class="col-md-5">
                    <input id="apelido" name="apelido" type="text" placeholder="" class="form-control input-md"
                           value="<?= $ape ?>">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="n_jogos">Nº Jogos</label>  
                <div class="col-md-2">
                    <input id="n_jogos" name="n_jogos" type="text" placeholder="" class="form-control input-md"
                           value="<?= $n_jogos ?>">

                </div>
            </div>

            <!-- Button -->
            <div class="form-group" style="padding-top: 3em">
                <label class="col-md-4 control-label" for="btn_save_rod"></label>
                <div class="col-md-8">
                    <button id="btn_save_rod" name="btn_save_rod" class="btn btn-success b-close">Salvar</button>
                </div>
            </div>

        </form>    

    </fieldset>
</div>

<!--SCRIPT DA PÁGINA-->

<script>
    $(function() {
        $("#btn_save_rod").click(function() {
            var data = $("#form-cad-rod").serialize() + "&idfase=" + idfase;
            var nomefase = $("#nomegruporod").text();

            if($("#n_jogos ").val()!=0 && $("#n_jogos ").val()!=""){
                $.ajax({
                    url: PATH + "rodadas/insert",
                    data: data,
                    type: "POST",
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("Erro ao cadastrar rodada!");
                    },
                    success: function(data, textStatus, jqXHR) {
                        showRodadas(nomefase);
                    }
                });
            }else{
                alert("Número de jogos não pode ser 0 ou vazio!");
            }
        });
    });
</script>