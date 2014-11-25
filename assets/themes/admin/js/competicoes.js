var PATH; 
var idfase;
var idmod;
var idgrupo;
var idrodada;  

/*
 * 
 * Main
 */
$(function() {
    PATH = "http://" + URL_FIX + "/";
    hidePanels(Array("#comp-fases", "#comp-grupos", "#comp-conv", "#comp-rod", "#comp-jogos"));
    eventos();
});

/*
 * Metodo é executado também após algumas requisições ajax
 * e resolve o problema de associação de funções desse script
 * com os elementos das páginas retornadas.
 */
function eventos() {
    /*
     * Associamos ao botao de gerenciamento de um modulo em listmod.php
     * o evento que exibe os detalhes de um modulo, nesse caso, suas fases.
     */
    $(".tr-mod").on("click", ".view", detailMod);
}


/*
 * 
 * @returns função que carrega o painel de fases de um módulo
 */
var detailMod = function() {
    /*
     * Ocultamos os outros paineis
     */
    hidePanels(Array("#comp-grupos", "#comp-conv", "#comp-rod", "#comp-jogos"));

    /*
     * Recuperamos o ID e o nome do módulo
     */
    idmod = $(this).parent().parent().children("td[column='idmod']").html();
    nomemod = $(this).parent().parent().children("td[column='nome']").html();

    /*
     * Trata eventos de alteração das cores das linhas da tabela de módulos
     */
    var linha = $(this).parent().parent();
    setColorRowSelect(".tr-mod", linha);

    /*
     * 
     * @returns Então exibimos as fases
     */
    showFases(nomemod);
};

/*
 * 
 * @param {type} nomemod
 * @returns {undefined}
 */
function showFases(nomemod) {
    /*
     * Requisão ajax para buscar todas as fases de um módulo.
     * idmodulo é passado por parametro
     */
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
                /*
                 * Seta o painel de fases com a lista de fases retornada da requisição
                 */
                $(this).html(data);
                /*
                 * Atualizar DOM, associando os métodos aos seus respectivos elementos da página.
                 */
                $(function() {
                    $(".tr-fase").on("click", ".view", detailFaseGru);
                    $(".tr-fase").on("click", ".rodada", detailFaseRod);
                    $(".tr-fase").on("click", ".del", delFase);
                    $(".tr-fase").on("click", ".edit", editFase);
                    $("#nomemod_fase").text(nomemod);
                });
            });
        }
    });
}

/*
 * Método para exibir detalhes de um fase, nesse caso os grupos
 * @returns {undefined}
 */
var detailFaseGru = function() {

    /*
     * Oculta os outros paineis
     */
    hidePanels(Array("#comp-rod", "#comp-jogos"));

    /*
     * Recuperamos o idfase e o seu nome
     */
    idfase = $(this).parent().parent().children("td[column='idfase']").html();
    var nomefase = $(this).parent().parent().children("td[column='id_tf']").html();

    /*
     * Trata eventos de alteração das cores das linhas da tabela de módulos
     */
    var linha = $(this).parent().parent();
    setColorRowSelect(".tr-fase", linha);

    /*
     * Chamada para o método que carrega os grupos 
     */
    showGrupos(nomefase);
};

/*
 * Método é chamado quando clica-se na opção para
 * exibir detalhes de uma fase.
 */
function showGrupos(nomefase) {
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
                    $("#nomefasegru").text(nomefase);
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
    /*
     * Recuperamos o id e o nome da fase
     */
    idfase = $(this).parent().parent().children("td[column='idfase']").html();
    var nomemod = $("#nomemod_fase").text();

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
            showFases(nomemod);
        }
    });
};

/*
 *  Método para exibir detalhes de uma fase, nesse caso 
 *  as rodadas
 */
var detailFaseRod = function() {
    $("#comp-grupos").empty();
    $("#comp-conv").empty();

    /*
     * Recuperamos idfase e o nome da fase
     */
    idfase = $(this).parent().parent().children("td[column='idfase']").html();
    var nomefase = $(this).parent().parent().children("td[column='id_tf']").html();

    /**
     * Ativar linhar selecionada, mudando cor de fundo
     */
    var linha = $(this).parent().parent();
    setColorRowSelect(".tr-fase", linha);
    showRodadas(nomefase);
};

/*
 * 
 * @param {type} nomefase
 * @returns {undefined}
 */
function showRodadas(nomefase) {
    /*
     * Requisição para buscar as rodadas de uma determinada fase
     */
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
                    $("#nomegruporod").text(nomefase);
                });
            });
        }
    });
}

var detailJog = function() {
//    var apelido = $(this).parent().parent().children("td[column='aprod']").html();
    idrodada = $(this).parent().parent().children("td[column='idrodada']").html();

    /**
     * Ativar linhar selecionada, mudando cor de fundo
     */
    var linha = $(this).parent().parent();

    setColorRowSelect(".tr-rodada", linha);

    showJogos();
};

function showJogos() {
    $.ajax({
        url: PATH + "fases/showJogos",
        data: {
            idrodada: idrodada
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

                });
            });

        }
    });
}

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

/*
 * Método para setar a cor de fundo do elemento selecionado
 * em um item, nesse caso, linhas de uma tabela.
 */
function setColorRowSelect(tabela, linha) {
    $.each($(tabela), function() {
        $(this).css("background-color", "#FFF");
        $(linha).css("background-color", "#a1a5fe");
    });
}