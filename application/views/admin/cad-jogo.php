<div style="width: 900px; height: 500px">
    <span class="b-close btn btn-danger col-md-offset-12">X</span>
    <fieldset>
        <legend class="text-center text-info"> Cadastrar/Editar Jogo</legend>
        <form id="form-cad-jogo" action="javascript:void(0)" class="form-horizontal">
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
                                    <select> 
                                        <option value="0"> Selecione um Time</option>
                                    </select>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <select> 
                                        <option value="0"> Selecione um Time</option>
                                    </select>
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
                </div
            </div>
        </form>      
    </fieldset>
</div>

