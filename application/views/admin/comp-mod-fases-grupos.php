<div class="row-fluid">
    <div class="tabbable">
        <ul class="nav nav-tabs">
            <?php
            for ($j = 0; $j < $fases[$i]->n_grupos; $j++):
                ?>            
                <li class="<?= $j == 0 ? "active" : "" ?>">
                    <a href="#grupo-f<?= $i . "-" . $j ?>" data-toggle="tab">
                        <?= isset($grupos[$i][$j]->nome) ? $grupos[$i][$j]->nome : "Grupo " . ($j + 1) ?>
                    </a>
                </li>
                <?php
                ?>
            <?php endfor; ?>
        </ul>
        <div class="tab-content">
            <?php
            for ($j = 0; $j < $fases[$i]->n_grupos; $j++):
                ?>            
                <div class="<?= $j == 0 ? "active" : "" ?> tab-pane" id="grupo-f<?= $i . "-" . $j ?>">
                    <div class="row-fluid clearfix" style="padding-top: 2em">
                        <div class="col-md-3">                            
                            <?php if ($grupos[$i][$j]->idgrupo): ?>
                                <input id="g<?= $i . $j ?>"type="hidden" name="idgrupo" value="<?= $grupos[$i][$j]->idgrupo ?>"/>
                            <?php endif; ?>
                            <label class="col-md-12 control-label">Tipo/Grupo</label>
                            <select id="tg_nome_<?= $i . $j ?>" name="tg_nome" class="form-control">
                                <?php foreach ($tipo_grupos as $v): ?>
                                    <option tgid="<?= $v->idtipo_grupo ?>"><?= $v->nome ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="gru_n_cla">Nº Classificados</label>  
                                <div class="col-md-10">
                                    <input id="gru_n_cla" name="gru_n_cla" placeholder="" class="form-control" type="text" value="" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding: 1.8em">
                            <button class="btn btn-success btn-save-gru" sel="tg_nome_<?= $i . $j ?>">Salvar</button>
                        </div>
                    </div>     

                    <!--PAINEL COM OS CONVIDADOS DA FASE-->
                    <div class="row-fluid clearfix" style="padding: 2em">
                        <?php include 'comp-conv.php'; ?>
                    </div>
                    <!--ENDPAINEL-->
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>