<div class="row-fluid clearfix">
    <div class="tabbable">
        <ul class="nav nav-tabs">
            <?php for ($i = 0; $i < $n_fases; $i++): ?>
                <li class="<?= !$i ? "active" : "" ?>">
                    <a href="#fase_<?= $i + 1 ?>" data-toggle="tab"><?= count($fases) > $i ? $fases[$i]->nome : "Fase " . ($i + 1); ?></a>
                </li>
            <?php endfor; ?>
        </ul>
        <div class="tab-content">
            <?php for ($i = 0; $i < $n_fases; $i++): ?>
                <div class="tab-pane <?= !$i ? "active" : "" ?>" id="fase_<?= $i + 1 ?>" style="padding: 2em">
                    <form id="form-fase-<?= $i + 1 ?>" action="javascript:void(0)">
                        <?php if (isset($fases[$i]->idfase)): ?>
                            <input id="f<?= $i ?>" type="hidden" name="idfase" value="<?= $fases[$i]->idfase ?>" />
                        <?php endif; ?>
                        <div class="row-fluid clearfix" >
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="tf_nome">Tipo Fase</label>  
                                    <div class="col-md-12">
                                        <select id="tf_nome_<?= $i ?>" name="tf_nome" placeholder="" class="form-control" value="" >
                                            <?php foreach ($tipo_fases as $v): ?>
                                                <option tfid="<?= $v->idtipo_fase ?>"><?= $v->nome ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="fase_dec">Descrição</label>  
                                    <div class="col-md-12">
                                        <input id="fase_desc" name="fase_desc" placeholder="" class="form-control" type="text" value="" >
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="fase_n_jog">Nº Jogos</label>  
                                    <div class="col-md-10">
                                        <input id="fase_n_jog" name="fase_n_jog" placeholder="" class="form-control" type="text" value="" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="fase_ida_volta">Ida e Volta</label>  
                                    <div class="col-md-1">
                                        <input id="fase_ida_volta" name="fase_ida_volta" class="form-control" type="checkbox">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid clearfix" style="padding-top: 2em">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="fase_n_gru">Nº Grupos</label>  
                                    <div class="col-md-1">
                                        <input id="fase_n_gru" name="fase_n_gru" placeholder="" class="form-control" type="text" value="" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid clearfix" style="padding: 1em">
                            <div class="col-md-12">
                                <button class="btn-save-fase btn btn-success" form="#form-fase-<?= $i + 1 ?>" sel="tf_nome_<?= $i ?>"> Salvar </button>
                            </div>
                        </div>
                    </form>
                    <div class="row-fluid clearfix" style="padding: 1em" id="mod-grupos">                        
                        <?php include 'comp-mod-fases-grupos.php'; ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>