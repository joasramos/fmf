<form id="form-mod" action="javascript:void(0)">
    <div class="row-fluid clearfix">
        <div class="col-md-4">
            <div class="form-group">
                <label class="col-md-4 control-label" for="mod_nome">Módulo/Turno</label>  
                <div class="col-md-10">
                    <select id="mod_turn_id" name="mod_nome" placeholder="" class="form-control" type="text" value="" >
                        <option value="null">Selecione</option>
                        <?php foreach ($turnos as $turno): ?>
                            <option id-turno="<?= $turno->idturno ?>"><?= $turno->nome ?></option>                            
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="col-md-4 control-label" for="mod_desc">Descrição</label>  
                <div class="col-md-10">
                    <input id="mod_nome" name="mod_desc" placeholder="" class="form-control" type="text" value="" >
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="col-md-4 control-label" for="mod_n_jog">Nº Jogos</label>  
                <div class="col-md-10">
                    <input id="mod_nome" name="mod_n_jog" placeholder="" class="form-control" type="text" value="" >
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid clearfix" style="padding-top: 2em">
        <div class="col-md-4">
            <div class="form-group">
                <label class="col-md-4 control-label" for="mod_n_fase">Nº Fases</label>  
                <div class="col-md-10">
                    <input id="mod_nome" name="mod_n_fase" placeholder="" class="form-control" type="text" value="" >
                </div>
            </div>
        </div>    
    </div>
</form>
<div class="row clearfix" style="padding: 2em">
    <div class="col-md-12 column">
        <button class="btn btn-default" style="margin-bottom: 2em" id="btn-inc-mod"> Incluir</button>
        <div id="list-mod">
            <!-- A LISTA COM OS MÓDULOS É ATUALIZADA VIA AJAX, METODO ESTÁ em: assets/themes/admin/js/competicoes.js-->
            <?php include 'list-mod.php'; ?>
        </div>
        <div id="mod-fases">
           /<?php // if (isset($n_fases)) include 'comp-mod-fases.php'; ?>
        </div>
    </div>
</div>