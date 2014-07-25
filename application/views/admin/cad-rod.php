<div style="width: 400px; height: 300px">
    <span class="b-close btn btn-danger col-md-offset-12">X</span>
    <fieldset>
        <legend class="text-center text-info"> Cadastrar/Editar Rodada</legend>
        <form id="form-cad-jogo" action="javascript:void(0)">
            <?php if (isset($rodada[0]->idrodada)): ?>
                <input  type="hidden" name="idrodada" value="<?= $rodada[0]->idrodada ?>" />
            <?php endif; ?>
                
                
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