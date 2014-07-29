/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var PATH = "http://" + document.domain + "/fmf/";
var idfase;
var idmod;
var idgrupo;

$(function() {
    hidePanels(Array("#comp-fases", "#comp-grupos", "#comp-conv", "#comp-rod", "#comp-jogos"));
    eventos();
});

function eventos() {
    $(".tr-mod").on("click", ".view", detailMod);
}


var detailMod = function() {
    hidePanels(Array("#comp-grupos", "#comp-conv", "#comp-rod", "#comp-jogos"));

    idmod = $(this).parent().parent().children("td[column='idmod']").html();

    /**
     * Ativar linhar selecionada, mudando cor de fundo
     */
    var linha = $(this).parent().parent();

    $.each($(".tr-mod"), function() {
        $(this).css("background-color", "#FFF");
        $(linha).css("background-color", "#a1a5fe");
    });

    showFases();
};

/**
 * 
 * Carrega as fases de um determinado modulo
 */
function showFases() {
    $.ajax({
        url: PATH + "modulos/showFases",
        data: {
            idmod: idmod
        },
        type: "POST",
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error ao buscar Fases");
        },
        success: function(data, textStatus, jqXHR) {
            $("#comp-fases").fadeIn(1000, function() {
                $(this).html(data);
                /*
                 * Atualizar DOM
                 */
                $(function() {
                    $(".tr-fase").on("click", ".view", detailFaseGru);
                    $(".tr-fase").on("click", ".rodada", detailFaseRod);
                    $(".tr-fase").on("click", ".del", delFase);
                    $(".tr-fase").on("click", ".edit", editFase);
                });
            });
        }
    });
}

var detailFaseGru = function() {

    hidePanels(Array("#comp-rod", "#comp-jogos"));

    idfase = $(this).parent().parent().children("td[column='idfase']").html();

    /**
     * Ativar linhar selecionada, mudando cor de fundo
     */
    var linha = $(this).parent().parent();

    $.each($(".tr-fase"), function() {
        $(this).css("background-color", "#FFF");
        $(linha).css("background-color", "#a1a5fe");
    });

    /*
     * Chamada para o método que carrega os grupos 
     */
    showGrupos();
};

/*
 * Método é chamado quando clica-se na opção para
 * exibir detalhes de uma fase.
 */
function showGrupos() {
    $.ajax({
        url: PATH + "fases/showGrupos",
        data: {
            idfase: idfase
        },
        type: "POST",
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error ao buscar Grupos.");
        },
        success: function(data, textStatus, jqXHR) {
            $("#comp-grupos").fadeIn(1000, function() {
                $(this).html(data);
                /*
                 * Atualizar DOM
                 */
                $(function() {
                    $(".tr-gru").on("click", ".view", detailGru);
                });
            });
        }
    });
}

var editFase = function() {
    var idfase = $(this).parent().parent().children("td[column='idfase']").html();
    $("#nova-fase").bPopup({
        loadUrl: PATH + "fases/cadFaseView/" + idfase
    });
};

var delFase = function() {
    idfase = $(this).parent().parent().children("td[column='idfase']").html();

    $.ajax({
        url: PATH + "fases/drop",
        type: "POST",
        data: {
            idfase: idfase
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Não foi possivel excluir fase!");
        },
        success: function(data, textStatus, jqXHR) {
            showFases();
        }
    });
};

var detailFaseRod = function() {
    $("#comp-grupos").empty();
    $("#comp-conv").empty();

    idfase = $(this).parent().parent().children("td[column='idfase']").html();
    /**
     * Ativar linhar selecionada, mudando cor de fundo
     */
    var linha = $(this).parent().parent();

    $.each($(".tr-fase"), function() {
        $(this).css("background-color", "#FFF");
        $(linha).css("background-color", "#a1a5fe");
    });

    $.ajax({
        url: PATH + "fases/showRodadas",
        data: {
            idfase: idfase
        },
        type: "POST",
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error ao buscar Rodadas.");
        },
        success: function(data, textStatus, jqXHR) {
            $("#comp-rod").fadeIn(1000, function() {
                $(this).html(data);
                /*
                 * Atualizar DOM
                 */
                $(function() {
                    $(".tr-rodada").on("click", ".view", detailJog);
                });
            });

        }
    });
};

var detailJog = function() {
    var apelido = $(this).parent().parent().children("td[column='aprod']").html();
    /**
     * Ativar linhar selecionada, mudando cor de fundo
     */
    var linha = $(this).parent().parent();

    $.each($(".tr-rodada"), function() {
        $(this).css("background-color", "#FFF");
        $(linha).css("background-color", "#a1a5fe");
    });

    $.ajax({
        url: PATH + "fases/showJogos",
        data: {
            idfase: idfase,
            apelido: apelido
        },
        type: "POST",
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error ao buscar Jogos.");
        },
        success: function(data, textStatus, jqXHR) {
            $("#comp-jogos").fadeIn(1000, function() {
                $(this).html(data);
                /*
                 * Atualizar DOM
                 */
                $(function() {
//                    $(".tr-rodada").on("click", ".view", loadJogos);
                });
            });

        }
    });
};

/*
 *  Método para exibir os detalhes de um grupo. 
 *  Tais como os convidados do grupo.
 *  É chamado toda vez que o usuário clica sobre a opção de gerenciar grupo.
 */
var detailGru = function() {

    idgrupo = $(this).parent().parent().children("td[column='idgrupo']").html();

    /**
     * Ativar linhar selecionada, mudando cor de fundo
     */
    var linha = $(this).parent().parent();

    $.each($(".tr-grupo"), function() {
        $(this).css("background-color", "#FFF");
        $(linha).css("background-color", "#a1a5fe");
    });
    /*
     * Chamada para o método que carrega os convidados do grupo
     */
    showConv();
};

/*
 * 
 * @param {type} idgrupo do grupo selecionado
 */
function showConv() {
    $.ajax({
        url: PATH + "grupos/showConv",
        data: {
            idfase: idfase,
            idgrupo: idgrupo
        },
        type: "POST",
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error ao buscar convidados.");
        },
        success: function(data, textStatus, jqXHR) {
            $("#comp-conv").show();
            $("#comp-conv").html(data);
        }
    });
}

/**
 * Método para ocultar painels
 * @param {type} p representa os paineis
 * 
 */
function hidePanels(p) {
    for (var i = 0; i < p.length; i++) {
        $(p[i]).hide();
    }
}

function novosEventos(idmod) {
    $(function() {
        /*
         $(".btn-save-fase").click(function() {
         var f = $(this).attr("form");
         var btn = $(this);
         
         var idtf;
         
         $.each($("select[name='tf_nome']"), function(key, value) {
         if ($(this).attr("id") == $(btn).attr('sel')) {
         idtf = $("#" + $(value).attr("id") + " option:selected").attr("tfid");
         }
         });
         
         var data = $(f).serialize() + "&id_tf=" + idtf + "&idmod=" + idmod;
         
         $.ajax({
         url: PATH + "fases/insert",
         data: data,
         type: "POST",
         success: function(data, textStatus, jqXHR) {
         window.location.reload(true);
         }
         });
         });
         
         $(".btn-ad-conv").click(function() {
         alert($(this).attr('sel'));
         });
         
         $(".btn-re-conv").click(function() {
         var btn = $(this);
         var idfase;
         var idgrupo;
         
         $.each($("input[name='idfase']"), function() {
         if ($(this).attr("id") == $(btn).attr("data-fase")) {
         idfase = $(this).val();
         }
         });
         
         $.each($("input[name='idgrupo']"), function() {
         if ($(this).attr("id") == $(btn).attr("data-grupo")) {
         idgrupo = $(this).val();
         }
         });
         
         $.ajax({
         url: PATH + "/clubes/removeConv",
         type: "POST",
         data: {
         idconv: $(this).attr("id-conv"),
         idfase: idfase,
         idgrupo: idgrupo
         },
         success: function(data, textStatus, jqXHR) {
         console.log(data);
         }
         });
         });*/
    });

}


