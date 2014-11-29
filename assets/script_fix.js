/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var URL_FIX;

$(function() {
    URL_FIX = document.domain;

    if (URL_FIX == "localhost") {
        URL_FIX += "/fmf";
        $("#topo-log-img").css("background-image", "url('/fmf/assets/themes/default/logos/logo.png')");
    }
//    alert(URL_FIX);
});