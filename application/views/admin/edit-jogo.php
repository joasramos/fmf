<div style="width: 900px; height: 500px">
    <span class="b-close btn btn-danger col-md-offset-11">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <fieldset>
        <legend class="text-center text-info"> Edição de Jogo</legend>
        <form id="form-cad-jogo" action="javascript:void(0)" class="form-horizontal" enctype="multipart/form-data" >
            <input  type="hidden" name="idjogo" value="<?= $jogo[0]->idjogo_new ?>" />
            <input  type="hidden" name="mandante" value="<?= $jogo[0]->mandante ?>" /> 
            <input  type="hidden" name="visitante" value="<?= $jogo[0]->visitante ?>" />
            
            <div class="row-fluid clearfix">
                <div class="col-md-12">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mandante</th>
                                <th></th>
                                <th>X</th>
                                <th></th>
                                <th>Visitante</th>
                            </tr>                                
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>

                                    <!--SE TIVER CLUBE EXIBE-O-->
                                    <div class="col-md-1">
                                        <button class="btn btn-danger" id="btn-alt-casa">x</button>
                                    </div>
                                    <div class="col-md-10" id="div-casa">
                                        <input type="text" name='clube_nome_1' value='<?= $jogo[0]->c1_nome ?>' style='text-align: center' disabled="disabled"/>  
                                        <img width="32" src="<?= base_url() ?>/assets/images/escudos/<?= $jogo[0]->c1_band ?>"/>
                                    </div>

                                    <!--SENÃO EXIBE CAIXA DE SELEÇÃO-->
                                    <select name="clube_casa" style="display: none"> 
                                        <option value="0"> Selecione um Time</option>
                                        <?php foreach ($conv as $c): ?>
                                            <option value="<?= $c->idconvidado ?>"><?= $c->apelido ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </td>
                                <td>
                                    <input name='clube_casa_gols' size="2" style='text-align: center' value="<?= $jogo[0]->gols_casa ?>"/>
                                </td>
                                <td></td>
                                <td>
                                    <input name='clube_fora_gols' size="2" style='text-align: center' value="<?= $jogo[0]->gols_visitante ?>"/>
                                </td>
                                <td>

                                    <!--SE TIVER CLUBE EXIBE-O-->
                                    <div class="col-md-10" id="div-fora">
                                        <img width="32" src="<?= base_url() ?>/assets/images/escudos/<?= $jogo[0]->c2_band ?>"/>
                                        <input type="text" name='clube_nome_2' value='<?= $jogo[0]->c2_nome ?>' style='text-align: center' disabled="disabled"/>  
                                    </div>

                                    <!--SENÃO EXIBE CAIXA DE SELEÇÃO-->
                                    <select name="clube_fora" style="display: none" class="col-md-10"> 
                                        <option value="0"> Selecione um Time</option>
                                        <?php foreach ($conv as $c): ?>
                                            <option value="<?= $c->idconvidado ?>"><?= $c->apelido ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <div class="col-md-1">
                                        <button class="btn btn-danger" id="btn-alt-fora">x</button>
                                    </div>
                                </td>
                            </tr>                                
                        </tbody>
                    </table>
                </div>                        
            </div>    
            <h5 class="text-center text-primary">Informações do Jogo:</h5>
            <div class="col-md-5">
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="jogo_data">Data</label>  
                    <div class="col-md-7">
                        <input id="jogo_data" name="jogo_data" placeholder="" class="form-control input-md" type="text" 
                               value="<?= $jogo[0]->data != "" ? date("d-m-Y", strtotime($jogo[0]->data)) : "" ?>">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="jogo_hora">Horário</label>  
                    <div class="col-md-7">
                        <input id="jogo_hora" name="jogo_hora" placeholder="" class="form-control input-md" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="jogo_estadio">Estádio</label>  
                    <div class="col-md-7">
                        <input id="jogo_estadio" name="jogo_estadio" placeholder="" 
                               class="form-control input-md" type="text" value="<?= $jogo[0]->apelido_est ?>">
                        <select id="edit-sel-est" style="display: none" name="new_estadio"> 
                            <?php foreach ($estadios as $e): ?>
                                <option value="<?= $e->idestadio ?>"> <?= $e->apelido ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-danger" id="bt-alt-est">x</button>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group" style="">
                    <label class="col-md-4 control-label" for="btn_save_jogo"></label>
                    <div class="col-md-8">
                        <button id="btn_save_jogo" name="btn_save_jogo" class="btn btn-success b-close">Salvar</button>
                    </div>
                </div>
            </div>

            <!--DOCUMENTOS BORDERÔ E SUMULA-->            
            <div class="col-md-7">
                <!-- File Button --> 
                <div class="form-group">
                    <label class="col-md-4 control-label" for="jogo_bord">Borderô</label>
                    <div class="col-md-4">
                        <input id="jogo_bord" name="jogo_bord" class="input-file" type="file" value="">
                    </div>
                </div>

                <!-- File Button --> 
                <div class="form-group">
                    <label class="col-md-4 control-label" for="jogo_sum">Súmula</label>
                    <div class="col-md-4">
                        <input id="jogo_sum" name="jogo_sum" class="input-file" type="file">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-1" style="border: 1px solid #ccc;">
                <h5 class="text-center label label-default">ARQUIVOS JÁ INSERIDOS NO JOGO</h5>
                <ul style="list-style: none; padding: 1em">
                    <?php if ($jogo[0]->sumula != ""): ?>
                        <li>
                            <a href="<?= base_url() ?>uploads/sumula/<?= $jogo[0]->sumula ?>" name="sumu">&map;SÚMULA</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($jogo[0]->bordero != ""): ?>
                        <li>
                            <a href="<?= base_url() ?>uploads/bordero/<?= $jogo[0]->bordero ?>" name="bord">&map;BORDERÔ</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </form>      
    </fieldset>
    <div class='row-fluid' style='position: absolute; border-top: 1px dotted #ccc; bottom: 0; right: 0'>
        <div class='col-md-3'>
            <h6><?= $jogo[0]->nome_comp ?></h6>
        </div>
        <div class='col-md-3'>
            <h6><?= $jogo[0]->nome_turno ?></h6>
        </div>
        <div class='col-md-3'>
            <h6><?= $jogo[0]->nome_fase ?></h6>
        </div>
        <div class='col-md-3'>
            <h6><?= $jogo[0]->apelido ?></h6>
        </div>
    </div>
</div>

<script>
    $(function() {
        $("#btn_save_jogo").click(function() {
            var formData = new FormData($("#form-cad-jogo")[0]);
            formData.append('idrodada', idrodada);
            formData.append('idjogo', $("input[name='idjogo']").val());

            var clube_casa_new = "", clube_fora_new = "";
            /*
             * Verificamos se houve alteração no time corrente 
             * que jogará em casa
             */
            if ($("select[name='clube_casa']").is(":visible")) {
                var value = $("select[name='clube_casa']").val();
                if (value != 0) {
                    clube_casa_new = value;
                } else {
                    alert("Selecione o time mandante");
                    return;
                }
            }

            /*
             * Verificamos se houve alteração no time corrente 
             * que é o visitante
             */
            if ($("select[name='clube_fora']").is(":visible")) {
                var value = $("select[name='clube_fora']").val();
                if (value != 0) {
                    clube_fora_new = value;
                } else {
                    alert("Selecione o time visitante");
                    return;
                }
            }

            /*
             * Verificamos se os times selecionados são diferentes
             */
            if (clube_casa_new != "" && clube_fora_new != "") {
                if (clube_casa_new == clube_fora_new) {
                    alert("Você selecionou o mesmo time!");
                    return;
                }
            }
            //            return;

            formData.append('clube_casa_new', clube_casa_new);
            formData.append('clube_fora_new', clube_fora_new);

            $.ajax({
                url: PATH + "jogos/insert",
                data: formData,
                type: "POST",
                contentType: false,
                processData: false,
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Erro ao inserir jogo");
                },
                success: function(data, textStatus, jqXHR) {
                    showJogos();
                    console.log(data);
                }
            });


        });

        $("#btn-alt-casa").click(function() {
            $("#div-casa").hide();
            $("select[name='clube_casa']").show();
        });

        $("#btn-alt-fora").click(function() {
            $("#div-fora").hide();
            $("select[name='clube_fora']").show();
        });

        $("#jogo_data").datepicker({
            dateFormat: "dd-mm-yy"
        });

        $("#bt-alt-est").click(function() {
            $("#jogo_estadio").hide();
            $("#jogo_estadio").val("");
            $("#edit-sel-est").show();
        });
    });
</script>

