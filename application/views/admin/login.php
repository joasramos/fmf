<!--<form action="admin/login" method="POST" class="form-horizontal col-md-offset-4 col-md-3" style="  box-shadow: 0px 0px 10px 0px; padding: 20px ">
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
</form>-->

<!DOCTYPE html>
<html>
    <head>
        <title>Área Restrita</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type="text/css">
            body {
                background: #FFF; 
                font-family: Verdana; 
                font-size: 9pt; 
            }
            #form_login {
                width: 500px; 
                margin: 0 auto; 
                padding: 20px; 
                background: #F2F2F2; 
                border: 1px solid #B7B7B7;
            }
            label { 
                display: block; 
                margin-bottom: 0.3em;
            }
            input[type=text], input[type=password] {
                border: 1px solid #666; 
                display: block; 
                margin-bottom: 1em; 
                padding: 2px; 
                width: 100%; 
            }
            input[type=text], input[type=password] { 
                display: block; 
            }

            h1 { 
                margin: 0 0 1em 0; 
                text-align: center; 
            }

            .error { 
                background: none repeat scroll 0 0 #FBE6F2; 
                border: 1px solid #D893A1; padding: 5px; 
            }
        </style>
    </head>
    <body>

        <h1>Tela de Login</h1>
        <div id="form_login">
            <?php echo validation_errors(); ?>
            <?php
            echo form_open();

            echo form_label('Username', 'username');
            echo form_input('username', '');

            echo form_label('Password', 'password');
            echo form_password('pass', '');

            echo form_submit('submit', 'Entrar no sistema');
            ?>
            <?php form_close(); ?>
        </div>
    </body>
</html>