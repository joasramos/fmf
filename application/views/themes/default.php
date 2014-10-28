<?php
$dia = date("j") - 1;
$hora = date("H") - 3;
$minuto = date("i");
$segundo = date("s");

$semana = array(0 => "Domingo", 1 => "Segunda", 2 => "Terça", 3 => "Quarta", 4 => "Quinta", 5 => "Sexta", 6 => "Sábado");
$mes = array(1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");

$ano = date("Y");
$data_completa = date("d/m/y");
$hora_completa = $hora . ":" . $minuto . ":" . $segundo;
$misc = $semana[date("w")] . ", " . date("j") . " de " . $mes[date("n")] . " de " . date("Y");
?>

<html lang="pt-br" style="max-width: 100%; min-width: 1100px">   
    <head>
        <title><?php echo $title; ?></title>
        <meta name="resource-type" content="document" />
        <meta name="robots" content="all, index, follow"/>
        <meta name="googlebot" content="all, index, follow" />
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
        <base href="<?= base_url() ?>">
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
        ?>

        <!-- styles -->
        <link href="<?php echo base_url() ?>assets/themes/default/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/themes/default/css/default.css" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/themes/default/logos/logo.png" type="image/x-icon"/>
        <meta property="og:image" content="<?php echo base_url(); ?>assets/themes/default/images/facebook-thumb.png"/>
        <link rel="image_src" href="<?php echo base_url(); ?>assets/themes/default/images/facebook-thumb.png" />
        <script src="<?= base_url() ?>assets/themes/default/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div style='background: url("assets/themes/default/images/fundotopo1.png") repeat-x, no-repeat'>
            <div class="container" style="min-width: 1000px">
                <!--DIV QUE REPRESENTA A BARRA COM OS ICONES DOS TIMES E A OPÇÃO DE OUVIDORIA NO TOPO DA PÁGINA-->
                <div class="row barra-times-topo clearfix">

                    <!--SCROLL DOS ICONES DOS TIMES-->
                    <div id="clu-div">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4 col-sm-4" style="padding: 0; margin-top: 0.299999999em">
                        <ul class="list-serie" style="margin: 0">
                            <li>
                                <a href="#" id="prim_div">1ª Div</a>
                            </li>
                            <li>
                                <a href="#" id="seg_div">2ª Div</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-xs-4 col-sm-4">
                        <h6 style="color: white; font-size: 10px">
                            COMPETIÇÕES FMF
                            <select id="sel-comp">
                                <option url="NULL"> Escoha uma opção</option>
                                <?php foreach ($other_data['competicao'] as $value): ?>
                                    <option url="<?= $value->url ?>"> <?= $value->apelido ?></option>
                                <?php endforeach; ?>
                            </select>
                        </h6>
                    </div>
                    <div class="col-md-4 col-xs-4 col-sm-4">
                        <h5 style="color: white; font-size: 10px">
                            FMF EM UM CLIQUE
                            <select id="">
                                <option url="NULL"> Escoha uma opção</option>
                                <option url=""></option>
                            </select>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div style='background: url("assets/themes/default/images/fdo_topoazul.png") repeat-x, no-repeat'>
            <div class="container" style="min-width: 1100px">
                <div class="row" id="topo-logo">
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="col-md-2 col-sm-2 col-xs-2" id="topo-log-img">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12" id="titulo">
                            <h3>FEDERAÇÃO MARANHENSE DE FUTEBOL</h3>
                        </div>
                        <h6 class="margin-default">
                            <span style="background-color: black; 
                                  color: white; 
                                  padding: 2px; 
                                  font-size: 10px" class="cont-border-dott">
                                  <?= $misc ?> 
                            </span>
                        </h6>
                    </div>
                </div>
                <nav class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#" title="Buy Sell Rent Everyting">
                            <!--<img width="32" src="<?= site_url("assets/themes/default/logos/logo.png") ?>">-->
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="<?= site_url() ?>">Inicio</a>
                            </li>
                            <li>
                                <a href="<?= site_url() ?>noticias">Notícias</a>
                            </li>
                            <li>
                                <a href="<?= site_url() ?>competicoes">Competições</a>
                            </li>  
                            <li>
                                <a href="http://www.cbf.com.br/bid/registro-geral?c=1&s=MA&n=&nk=&t=&id=#.U8P1ykCTW2k" target="_blank">Registro</a>
                            </li>  
                            <li>
                                <a href="<?= site_url() ?>clubes">Clubes</a>
                            </li>  
                            <li>
                                <a href="<?= site_url() ?>estadios">Estádios</a>
                            </li>  
                            <li>
                                <a href="<?= site_url() ?>arbitragens">Arbitragem</a>
                            </li>  
                            <li>
                                <a href="http://www.tjdma.com.br/" target="_blank">TJD</a>
                            </li>  
                            <li>
                                <a href="<?= site_url() ?>federacao">Federação</a>
                            </li>  
                            <li>
                                <a href="javascript:void(0)" id="ouvi">Ouvidoria</a>
                            </li>
                        </ul>                      
                    </div>
                </nav>               
            </div>
        </div>
        <div class="container">
            <?php if ($this->load->get_section('text_header') != '') { ?>
                <h1><?php echo $this->load->get_section('text_header'); ?></h1>
            <?php } ?>
            <div class="row">
                <?php echo $output; ?>
                <?php echo $this->load->get_section('sidebar'); ?>
            </div>
            <hr/>
        </div>
        <footer>
            <div style='position: relative; bottom: 0; display:table; width: 100%; background: url("assets/themes/default/images/baixo-novo.png")' class='padding-default'>
                <div class='row'>
                    <div class='col-md-12 col-xs-12 col-sm-12 text-center'>
                        <div class='col-md-3 col-xs-3 col-sm-3'>
                            <img width="100" height="50" src='<?= base_url() ?>assets/banners/logo-chevrolet.png'>    
                        </div>
                        <div class='col-md-3 col-xs-3 col-sm-3'>
                            <img width="100" height="50" src='<?= base_url() ?>assets/banners/kagiva3.png'>   
                        </div>
                        <div class='col-md-3 col-xs-3 col-sm-3'>
                            <img width="100" height="50" src='<?= base_url() ?>assets/banners/tech_planet.png'>      
                        </div>
                        <div class='col-md-3 col-xs-3 col-sm-3'>
                            <img width="100" height="50" src='<?= base_url() ?>assets/banners/polio.png'>      
                        </div>
                    </div>
                    <!--
                    <div class='col-md-4 col-xs-4 col-sm-4'>
                        <h5 style="color: white; font-size: 10px">
                            FMF EM UM CLIQUE
                            <select id="">
                                <option url="NULL"> Escoha uma opção</option>
                                <option url=""></option>
                            </select>
                        </h5>
                    </div>
                    -->
                </div>
                <div class="row">
                    <div class="col-md-1 column text-center" class="padding-default" style="margin-top: 5%">
                        <img src="<?= base_url() ?>assets/themes/default/logos/logo.png" width="52">
                    </div>
                    <div class="col-md-9 column" class="padding-default" style="margin-top: 3%; color: #fff">                        
                        <span class="text-center" style='font-size: 10px'>
                            <p>Federação Maranhense de Futebol</p>
                            <p>Filiada à CONFEDERAÇÃO BRASILEIRA DE FUTEBOL - CBF</p>
                            <p>Fundada em 11 de Janeiro de 1918</p>
                        </span>
                        <span class="text-center" style='font-size: 10px'>
                            <p>Rua do Alecrim, nº 415, Edifício Palácio dos Esportes, São Luís, Patrimônio Mundial, Maranhão, Brasil - CEP: 65.010-040</p>
                            <p>Telefone: (98) 3231-4300 / Fax: 3221-5751 - Site: www.fmfma.com.br - e-mail: contato@fmfma.com.br</p>
                        </span>
                    </div>
                    <div class="col-md-1 column col-md-offset-1" class="padding-default" style="margin-top: 4%;">
                        <img src="https://saltoaltofutebolclube.files.wordpress.com/2011/06/2000px-cbf_logo-svg.png" width="44">
                    </div>
                </div>
            </div>
        </footer>
        <div class="row-fluid clearfix" id="modal-ouvi" style="display: none">
            <div style="width: 500px; height: 300px; background-color: #fff">
                <span class="b-close btn btn-danger col-md-offset-12"> X</span>
                <div class="row-fluid clearfix">
                    <div class="col-md-4">
                        <img width="100" height="150" src="http://www.fmfma.com.br/assets/public/img/ouvidor.png"/>
                    </div>
                    <div class="col-md-8">
                        <p class="title-simple" > Ouvidoria</p>
                        <p> Temos um canal exclusivo para que você, torcedor, entre em contato conosco </p>
                        <p class="text-noticia"><img src="http://www.fmfma.com.br/assets/public/img/phone.png" /> (98) 3231 - 4300 </p>
                        <p class="text-info"> Ouvidor: Manoel Martins dos Santos</p>
                        <p class="text-info"> E-mail: bizau.martins@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        <!--PAINEL QUE SERÁ CARREGADO COM DETALHES DO CLUBE-->
        <div class="row-fluid clearfix">
            <div class="col-md-12" id="detail_clube_home" style="display: none">

            </div>
        </div> 
        <script>
            $(function() {
                $("#ouvi").click(function() {
                    $("#modal-ouvi").bPopup();
                });

//                var PATH = "http://" + URL_FIX + "/";
//                $(".dados-clube-home").click(function() { 
//                    var idclube = $(this).attr('idclube');
//                    $("#detail_clube_home").bPopup({
//                        loadUrl: PATH + "clubes/showDetailClube/" + idclube
//                    });
//                });
            });
        </script>
    </body>
</html>
