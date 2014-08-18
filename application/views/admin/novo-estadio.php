<!--FORMULARIO PARA CADASTRO DE NOVO ESTADIO-->

<div class="row-fluid clearfix" style="padding: 2em">
    <form class="form-horizontal" action="<?= base_url() ?>estadios/insert" method="POST">
        <fieldset>

            <!-- Form Name -->
            <legend>Informações do Novo estádio</legend>
            <input type="hidden" value="" name="idestadio">
            
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nome">Nome</label>  
                <div class="col-md-6">
                    <input id="nome" name="nome" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="apelido">Apelido</label>  
                <div class="col-md-4">
                    <input id="apelido" name="apelido" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cidade">Cidade</label>  
                <div class="col-md-4">
                    <input id="cidade" name="cidade" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                    <button id="button1id" name="button1id" class="btn btn-success">Salvar</button>
                    <!--<button id="button2id" name="button2id" class="btn btn-danger"></button>-->
                </div>
            </div>
        </fieldset>
    </form>
</div>