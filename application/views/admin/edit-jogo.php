<div style="width: 900px; height: 500px">
    <span class="b-close btn btn-danger col-md-offset-11">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <fieldset>
        <legend class="text-center text-info"> Edição de Jogo</legend>
        <form id="form-cad-jogo" action="javascript:void(0)" class="form-horizontal" enctype="multipart/form-data" >
            <?php if (isset($jogo[0]->idjogo)): ?>
                <input  type="hidden" name="idjogo" value="<?= $jogo[0]->idjogo ?>" />
            <?php endif; ?>
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
                                    <?php if ($jogo[0]->c1_nome): ?>
                                        <input name='clube_nome_1' value='<?= $jogo[0]->c1_nome ?>' style='text-align: center'/>  
                                        <img width="32" src="<?= base_url() ?>/assets/images/escudos/<?= $jogo[0]->c1_band ?>"/>
                                    <?php else: ?>
                                        <!--SENÃO EXIBE CAIXA DE SELEÇÃO-->
                                        <select name="clube_casa"> 
                                            <option value="0"> Selecione um Time</option>
                                            <?php foreach ($conv as $c): ?>
                                                <option value="<?= $c->idconvidado ?>"><?= $c->apelido ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <input name='clube_casa_gols' size="2" style='text-align: center'/>
                                </td>
                                <td></td>
                                <td>
                                    <input name='clube_fora_gols' size="2" style='text-align: center'/>
                                </td>
                                <td>
                                    <!--SE TIVER CLUBE EXIBE-O-->
                                    <?php if ($jogo[0]->c2_nome): ?>
                                        <img width="32" src="<?= base_url() ?>/assets/images/escudos/<?= $jogo[0]->c2_band ?>"/>
                                        <input name='clube_nome_2' value='<?= $jogo[0]->c2_nome ?>' style='text-align: center'/>                                    
                                    <?php else: ?>
                                        <!--SENÃO EXIBE CAIXA DE SELEÇÃO-->
                                        <select name="clube_fora"> 
                                            <option value="0"> Selecione um Time</option>
                                            <?php foreach ($conv as $c): ?>
                                                <option value="<?= $c->idconvidado ?>"><?= $c->apelido ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php endif; ?>
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
                        <input id="jogo_data" name="jogo_data" placeholder="" class="form-control input-md" type="text">

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
                        <input id="jogo_estadio" name="jogo_estadio" placeholder="" class="form-control input-md" type="text">

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
                        <input id="jogo_bord" name="jogo_bord" class="input-file" type="file">
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
            var apelido = $(".tr-rodada").children("td[column='aprod']").html();

            formData.append('idrodada', idrodada);

            var status = validarForm();

            if (status == "null_values") {
                alert("Falta selecionar um time");
                return;
            } else if (status === "equals") {
                alert("Um time não pode jogar contra si mesmo");
                return;
            } else {
                $.ajax({
                    url: PATH + "jogos/insert",
                    data: formData,
                    type: "POST",
                    contentType: false,
                    processData: false,
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("Erro ao inserir jogo")
                    },
                    success: function(data, textStatus, jqXHR) {
                        showJogos();
                    }
                });
            }
        });

        function validarForm() {
            var casa = $("select[name='clube_casa']").val(),
                    fora = $("select[name='clube_fora']").val();

            if (casa == 0 || fora == 0) {
                return "null_values";
            }
            else if (casa === fora) {
                return "equals";
            }
            return "ok";
        }

    });
</script>

