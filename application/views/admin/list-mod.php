<style>

    thead tr th{ text-align: center }
    tbody tr td{ text-align: center  }
    tbody tr td img{cursor: pointer}

    .pn{
        border: 1px solid #ccc;
    }

    .pn h5{
        background-color: #285e8e;
        padding: 0.5em;
        color: white;
    }

    .back-row-head{
        background-color: black;
        color: white;
        opacity: .6;
    }

</style>

<!--TABELA COM A LISTA DE MODULOS DE UMA DETERMINADA COMPETICAO-->
<?php
if (!isset($modulos)) {
    echo "<h3>Você precisa salvar a competição primeiro!</h3>";
    return 0;
}
?>

<!--BOTAO QUE ABRE A DIV DA CADASTRO/EDIÇÃO DE UM NOVO MODULO-->
<div class="row-fluid clearfix">
    <button class="btn btn-primary" id="btn-novo-mod"> + Novo Módulo</button>
</div>

<!--TABELA-->
<div class="col-md-12 pn">    
    <h5 class="text-center text-warning">Módulos</h5>    
    <table class="table">
        <thead>
            <tr class="back-row-head">
                <th>
                    ID
                </th>
                <th>
                    Turno
                </th>
                <th>
                    Descrição
                </th>
                <th>
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($modulos) > 0): foreach ($modulos as $key => $mod): ?>
                    <tr class="tr-mod">
                        <td column="idmod"><?= $mod->idmodulo ?></td>
                        <td column="nome"><?= $mod->nome ?></td>
                        <td column="desc"><?= $mod->descricao ?></td>
                        <td>
                            <img class='view' width="22" src="<?= base_url() ?>/assets/images/icon/config-icon.png"/>
                            <img class="edit" width="22" src="<?= base_url() ?>/assets/images/icon/edit-icon.png"/>
                            <img class="del" width="22" src="<?= base_url() ?>/assets/images/icon/delete-icon.png"/>                            
                        </td>
                    </tr>
                    <?php
                endforeach;
            endif;
            ?>
        </tbody>   
    </table>
</div>

<!--NESSA DIV SERA CARREGADO O PAINEL DE CADASTRO/EDIÇÃO DE UM NOVO MODULO-->
<div class="row-fluid clearfix" id="novo-mod" style="display: none; background-color: white">

</div>

<!--SCRIPT DESSA PÁGINA-->
<script>
    $(function() {
        /**
         * Variavel PATH DEFIFINDA EM competicoes.js
         */
        $("#btn-novo-mod").click(function() {
            $("#novo-mod").bPopup({
                loadUrl: PATH + "modulos/cadModuloView"
            });
        });
        $(".tr-mod").on("click", ".edit", editMod);
        $(".tr-mod").on("click", ".del", delMod);
    });

    var editMod = function() {

        hidePanels(Array("#comp-fases", "#comp-grupos", "#comp-conv", "#comp-rod", "#comp-jogos"));

        var idmod = $(this).parent().parent().children("td[column='idmod']").html();
        $("#novo-mod").bPopup({
            loadUrl: PATH + "modulos/cadModuloView/" + idmod
        });
    };

    var delMod = function() {
        var idmod = $(this).parent().parent().children("td[column='idmod']").html();
        var idcomp = $("#comp_id").val();
        $.ajax({
            url: PATH + "modulos/drop",
            type: "POST",
            data: {
                idmod: idmod,
                idcomp: idcomp
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Não foi possivel excluir módulo");
                $(function() {
                });
            },
            success: function(data, textStatus, jqXHR) {
                $("#comp-mod").html(data);
            }
        });
    };


</script>
