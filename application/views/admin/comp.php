<!--FORMULARIO DE CADASTRO DA COMPETICAO-->
<form class="form-horizontal" style="padding: 2em" action="<?= base_url() ?>competicoes/insert" method="POST" id="form-comp">
    <fieldset>
        <input type="hidden" name="comp_id" id="comp_id" value="<?= $id ?>" /><br />
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="comp_nome">Nome</label>  
            <div class="col-md-6">
                <input id="nome_comp" name="comp_nome" placeholder="" class="form-control" type="text" value="<?= $nome ?>" >
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="comp_ap">Apelido</label>  
            <div class="col-md-5">
                <input id="ap_comp" name="comp_ap" placeholder="" class="form-control input-md" type="text" value="<?= $ap ?>">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="comp_ano">Ano</label>  
            <div class="col-md-2">
                <input id="comp_ano" name="comp_ano" placeholder="" class="form-control input-md" type="text" value=<?= $ano ?>>

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="comp_mod">Módulos/Turnos</label>  
            <div class="col-md-1">
                <input id="modulos" name="comp_mod" placeholder="" class="form-control input-md" type="text" value=<?= $mod ?>>

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="comp_reb">Rebaixados</label>  
            <div class="col-md-1">
                <input id="rebaixados" name="comp_reb" placeholder="" class="form-control input-md" type="text" value=<?= $reb ?>>

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="comp_url">Url</label>  
            <div class="col-md-6">
                <input id="comp_url" name="comp_url" placeholder="" class="form-control input-md" type="text" value=<?= $url ?>>

            </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="button1id">Ações</label>
            <div class="col-md-8">
                <button id="button1id" name="button1id" class="btn btn-success">Salvar</button>
                <button id="button2id" name="button2id" class="btn btn-danger">Cancelar</button>
            </div>
        </div>
    </fieldset>
</form>