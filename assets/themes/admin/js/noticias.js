/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function() {
    tinymce.init({
        selector: "textarea"
    });

    $("#not_data").datepicker({
        dateFormat: "dd-mm-yy"
    });
});