/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var URL = "http://" + URL_FIX + "/";

$(document).ready(function() {

    /**
     * Tratando evento sobre o elemento <select> de competições
     */

    $("#sel-comp").change(function() {
        var url = $(this).find("option:selected").attr("url");
        if (url != "NULL") {
            window.location.href = URL + "competicoes/index/" + url;
        }
    });

    $.each($("#bs-example-navbar-collapse-1 ul li a"), function(key, value) {
        $(this).parent('li').removeClass('active');

        if ($(this).html() == window.document.title) {
            $(this).parent('li').addClass('active');
            $(this).css('background-color', '#dcdcdc');
        }
    });

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    mngDivisoes("Série A");
    
    $("#prim_div").click(function(){
        mngDivisoes("Série A");
    });
    
    $("#seg_div").click(function(){
        mngDivisoes("Série B");
    });

});

function mngDivisoes(serie) {

    $.ajax({
        url: "http://" + URL_FIX + "/clubes/mngClubes",
        data:{
            serie: serie
        } ,
        type: "POST",
        success: function(data, textStatus, jqXHR) {
            $("#clu-div").html(data);
            $(function() {
                var PATH = "http://" + URL_FIX + "/";
                $(".dados-clube-home").click(function() {
                    var idclube = $(this).attr('idclube');
                    $("#detail_clube_home").bPopup({
                        loadUrl: PATH + "clubes/showDetailClube/" + idclube
                    });
                });
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Não funciona!");
        }
    });
}

