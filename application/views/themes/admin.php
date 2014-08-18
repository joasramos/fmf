<html lang="pt-br">
    <head>
        <title><?php echo $title; ?></title>
        <meta name="resource-type" content="document" />
        <meta name="robots" content="all, index, follow"/>
        <meta name="googlebot" content="all, index, follow" />
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <?php
        /** -- Copy from here -- */
        if (!empty($meta))
            foreach ($meta as $name => $content) {
                echo "\n\t\t";
                ?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
            }
        echo "\n";

        if (!empty($canonical)) {
            echo "\n\t\t";
            ?><link rel="canonical" href="<?php echo $canonical ?>" /><?php
        }
        echo "\n\t";

        foreach ($css as $file) {
            echo "\n\t\t";
            ?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
        } echo "\n\t";

        foreach ($js as $file) {
            echo "\n\t\t";
            ?><script src="<?php echo $file; ?>"></script><?php
        } echo "\n\t";

        /** -- to here -- */
        ?>

        <!-- styles -->
        <link href="<?php echo base_url() ?>assets/themes/default/css/bootstrap.min.css" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <!--<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/themes/default/logos/logo.png" type="image/x-icon"/>-->
        <!--<meta property="og:image" content="<?php echo base_url(); ?>assets/themes/default/images/facebook-thumb.png"/>-->
        <!--<link rel="image_src" href="<?php echo base_url(); ?>assets/themes/default/images/facebook-thumb.png" />-->
        <script src="<?= base_url() ?>assets/themes/default/js/bootstrap.min.js"></script>

        <style type="text/css">

            ::selection{ background-color: #E13300; color: white; }
            ::moz-selection{ background-color: #E13300; color: white; }
            ::webkit-selection{ background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                /*margin: 40px;*/
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body{
                margin: 0 15px 0 15px;
            }

            p.footer{
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container{
                margin: 10px;
                border: 1px solid #D0D0D0;
                -webkit-box-shadow: 0 0 8px #D0D0D0;
            }

            .barra-times-topo{
                background-color: #444;
                border-top: 2px #f9f9f9 double;
            }

            .container-topo{
                width: 100%;
                background-color: #444;
                height: 52px;
            }

            .navbar, .navbar-inner, .nav{
                /*background-color: #444;*/
            }
        </style>

    </head>

    <body>
        <div class="container-topo">   
            <div class="container">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?= base_url() ?>manager">FMF</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="<?= base_url() ?>arbitragens/showAll">Arbitro</a></li>
                                <li><a href="<?= base_url() ?>clubes/showAll">Clubes</a></li>
                                <li><a href="<?= base_url() ?>estadios/showAll">Estádios</a></li>
                                <li><a href="<?= base_url() ?>noticias/showAll">Noticias</a></li>
                                <li><a href="#">Documentos</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Competições
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= base_url() ?>competicoes/showAll">Todas</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>
        <div class="container">
            <?php if ($this->load->get_section('text_header') != '') { ?>
                <h1><?php echo $this->load->get_section('text_header'); ?></h1>
            <?php } ?>
            <div class="row-fluid">
                <?php echo $output; ?>
                <?php echo $this->load->get_section('sidebar'); ?>
            </div>

        </div> 
        <hr/>
        <div class="container">
            <footer>
                <div class="row-fluid">
                    <div class="col-md-6">
                        Copyright &copy;
                        <a target="_blank" href="#">FMF 2014</a> 
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
