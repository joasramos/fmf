/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var CONST; 

$(function() {
    _init();
    setAbasActive();
    setShowCompeticao();
    setShowCompeticaoByAno();
    loadComboFases();
    CONST =  "http://" + URL_FIX + "/competicoes/index/";
});

function setShowCompeticaoByAno() {
    var url_comp, url, ano;

    $(".sel-ano").change(function() {

        $.each($('#header-comp li'), function(key, value) {
            if ($(value).hasClass("active")) {
                url = $(value).attr('url');
            }
        });
        /*
         * Pega o ano selecionado 
         */
        ano = $(this).children("option:selected").val();
        window.location.href = CONST + url + "/" + ano;
    });
}
function _init() {
    $('base').remove();
}

function setAbasActive() {
    var url = "http://" + URL_FIX + "/competicoes/managerAbas/";  
       
    var pathname = URL_FIX == "localhost/fmf" ? 
    window.location.pathname.substr(23, window.location.pathname.length):
    window.location.pathname.substr(19, window.location.pathname.length); 
 
    $.ajax({
        url: url + pathname,
        dataType: "json" 
    }).done(function(data) {
        
        $.each($('#header-comp li').children('a'), function(key, value) {

            $(this).parent().removeClass('active');
            $("#cont-comp").children('div').eq(key).removeClass('active');

            if (data.competicao[0].apelido == $(value).html()) {
                //ativa cabeçalho da Aba
                $(this).parent().addClass('active');

                //ativa conteudo da aba
                $("#cont-comp").children('div').eq(key).addClass('active'); 
            }
        });
    
    });
}

function setShowCompeticao() {
    $("#header-comp li a").click(function() {
        window.location.href = "http://" + URL_FIX + "/competicoes/index/" + $(this).parent().attr('url'); 
    });
}

function loadComboFases() {
    $(".sel-mod-cla").change(function() {
        var idmod = $(this).find(":selected").val(); 
        var PATH = "http://" + URL_FIX + "/"; 
        
        $.ajax({
            url: PATH + "fases/getFasesByMod",  
            type: "POST",
            dataType: "JSON",
            data: {
                idmod: idmod
            },
            success: function(data, textStatus, jqXHR) {
                console.log(data);
                $(".sel-fase-cla").empty();
                var opt1 = $("<option value='0'>Selecione uma fase</option>");
                $(".sel-fase-cla").append(opt1);
                $.each(data, function(key, value) {
                    var opt2 = $("<option value=" + value.idfase + ">" + value.nome + "</option>");
                    $(".sel-fase-cla").append(opt2);
                });
                $(function() {
                    loadClassi(idmod);
                });
            },
            error: function(jqXHR, textStatus, errorThrown) { 
                alert("Erro ao buscar fases do módulo");
            }
        });
    });
}

function loadClassi(idmod) {
    $(".sel-fase-cla").change(function() {
        $(".class-table").empty();
        
        var idfase = $(this).find(":selected").val();

        var PATH = "http://" + URL_FIX + "/";

        $.ajax({
            url: PATH + "competicoes/loadClassByFaseMod/",
            type: "POST",
            data: {
                idmod: idmod,
                idfase: idfase
            },
            success: function(data, textStatus, jqXHR) {
                $(".class-table").html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Erro ao buscar classificacao");
            }
        });
    });
}