<form action="admin/login" method="POST" class="form-horizontal col-md-offset-4 col-md-3" style="  box-shadow: 0px 0px 10px 0px; padding: 20px ">
    <div class="control-group">
        <img style="position: relative; left: 33%" width="64" src="<?php echo base_url(); ?>assets/themes/default/logos/logo.png">
    </div>
    <div class="control-group">        
        <label class="control-label" for="inputEmail">Login</label>
        <div class="controls">
            <input id="inputEmail" type="text" placeholder="Digite o seu login..." name="login"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Senha</label>
        <div class="controls">
            <input id="inputPassword" type="password" placeholder="Digite a sua senha..." name="senha" />
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <label class="checkbox"><input type="checkbox" /> Lembrar senha</label>
            <button class="btn" type="submit">Acessar</button>
        </div>
    </div>
</form>