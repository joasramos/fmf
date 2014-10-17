<div class="row-fluid" style="padding-top: 2em">
    <form class="form-horizontal" action="<?= base_url() ?>arbitragens/insert" method="POST">
        <fieldset>

            <!-- Form Name -->
            <legend>Cadastro de Árbitro</legend>

            <div class="form-group">
                <label class="col-md-4 control-label" for="arb_img">Imagem do Arbitro</label>  
                <div class="col-md-5">
                    <input id="arb_img" name="arb_img" class="form-control input-md" type="file">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nome">Nome</label>  
                <div class="col-md-8">
                    <input id="nome" name="nome" type="text" placeholder="" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nasci">Data Nascimento</label>  
                <div class="col-md-4">
                    <input id="nasci" name="nasci" type="text" placeholder="" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="sexo">Sexo</label>  
                <div class="col-md-4">
                    <input id="sexo" name="sexo" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="profi">Profissão</label>  
                <div class="col-md-4">
                    <input id="profi" name="profi" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cargo">Cargo </label>  
                <div class="col-md-4">
                    <input id="cargo" name="cargo" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cat">Categoria</label>  
                <div class="col-md-4">
                    <input id="cat" name="cat" type="text" placeholder=" " class="form-control input-md">
                    <span class="help-block"> </span>  
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="ano_form">Ano Formação</label>  
                <div class="col-md-2">
                    <input id="ano_form" name="ano_form" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="ano_inc">Ano Inclusão</label>  
                <div class="col-md-2">
                    <input id="ano_inc" name="ano_inc" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="fili">Filiação</label>  
                <div class="col-md-8">
                    <input id="fili" name="fili" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="natural">Naturalidade</label>  
                <div class="col-md-4">
                    <input id="natural" name="natural" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="escolar">Escolaridade</label>  
                <div class="col-md-6">
                    <input id="escolar" name="escolar" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="est_civil">Estado Civil</label>  
                <div class="col-md-4">
                    <input id="est_civil" name="est_civil" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="tit_eleitor">Titulo Eleitor</label>  
                <div class="col-md-4">
                    <input id="tit_eleitor" name="tit_eleitor" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="reservista">Nº Cert. Reservista</label>  
                <div class="col-md-5">
                    <input id="reservista" name="reservista" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cpf">CPF</label>  
                <div class="col-md-4">
                    <input id="cpf" name="cpf" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="rg">RG</label>  
                <div class="col-md-4">
                    <input id="rg" name="rg" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="end">Endereço</label>  
                <div class="col-md-8">
                    <input id="end" name="end" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="bairro">Bairro</label>  
                <div class="col-md-4">
                    <input id="bairro" name="bairro" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="tel">Telefone</label>  
                <div class="col-md-4">
                    <input id="tel" name="tel" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cel">Celular</label>  
                <div class="col-md-4">
                    <input id="cel" name="cel" type="text" placeholder=" " class="form-control input-md">
                    <span class="help-block"> </span>  
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="altura"> Altura</label>  
                <div class="col-md-2">
                    <input id="altura" name="altura" type="text" placeholder=" " class="form-control input-md">
                    <span class="help-block"> </span>  
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="peso">Peso</label>  
                <div class="col-md-2">
                    <input id="peso" name="peso" type="text" placeholder="" class="form-control input-md">
                    <span class="help-block"> </span>  
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="dados_banc">Dados Bancários </label>  
                <div class="col-md-4">
                    <input id="dados_banc" name="dados_banc" type="text" placeholder="  " class="form-control input-md">
                    <span class="help-block"> </span>  
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="pis">Pis</label>  
                <div class="col-md-4">
                    <input id="pis" name="pis" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="manequim">Manequim</label>  
                <div class="col-md-4">
                    <input id="manequim" name="manequim" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="tipo_sangue">Tipo Sanguineo</label>  
                <div class="col-md-4">
                    <input id="tipo_sangue" name="tipo_sangue" type="text" placeholder=" " class="form-control input-md">
                    <span class="help-block"> </span>  
                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                    <button id="button1id" name="button1id" class="btn btn-success">Salvar</button>
                    <!--<button id="button2id" name="button2id" class="btn btn-danger">Scary Button</button>-->
                </div>
            </div>

        </fieldset>
    </form>

</div>