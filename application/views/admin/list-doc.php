<style>
    .row-color-over:hover{
        background-color: #a1a5fe;
    }
    thead tr {background-color: #dbdcf4}
    thead tr th{ text-align: center }
    tbody tr td{ text-align: center  }
    tbody tr td img{cursor: pointer;}
</style>
<!--TABELAS COM LISTA DE DOCUMENTOS DE UMA DETERMINADA COMPETICAO-->
<?php
if (!isset($documentos)) {
    echo "<h3>Você precisa salvar a competição primeiro!</h3>";
    return 0;
}
?>
<div class="col-md-12" style="padding-top: 2em">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Titulo
                </th>
                <th>
                    Descrição
                </th>
                <th>
                    Data
                </th>
                <th>
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($documentos) > 0):
                foreach ($documentos as $key => $mod):
                    ?>
                    <tr class="tr-doc row-color-over">
                        <td column="idmod"><?= $mod->idmodulo ?></td>
                        <td column="nome"><?= $mod->nome ?></td>
                        <td column="desc"><?= $mod->descricao ?></td>
                        <td>
                            <img class='view' width="22" src="<?= base_url() ?>/assets/images/icon/search.png"/>
                            <img class="edit" width="22" src="<?= base_url() ?>/assets/images/icon/edit-icon.png"/>
                            <img class="del" width="22" src="<?= base_url() ?>/assets/images/icon/delete-icon.png"/>                            
                        </td>
                    </tr>
                    <?php
                endforeach;
            else:
                ?>
                <tr>
                    <td colspan="5">NÃO HÁ DOCUMENTOS AINDA</td>
                </tr>
            <?php
            endif;
            ?>
        </tbody>   
    </table>
</div>
<div class="row-fluid clearfix">
    <div class="col-md-12">
        <button class="btn btn-primary" id="btn-novo-doc"> + Inserir Documento</button>
    </div>
</div>
<div class="row-fluid clearfix" id="novo-doc" style="display: none; background-color: white">
</div>
<script>
    $(function() {
        /**
         * Variavel PATH DEFIFINDA EM competicoes.js
         */
        $("#btn-novo-doc").click(function() {
            $("#novo-mod").bPopup({
                loadUrl: PATH + "documentos/cadDocView"
            });
        });

//        $(".tr-mod").on("click", ".edit", editMod);
//        $(".tr-mod").on("click", ".del", delMod);

    });

/*
    var editDoc = function eD() {
        var idmod = $(this).parent().parent().children("td[column='idmod']").html();

        $("#novo-mod").bPopup({
            loadUrl: PATH + "modulos/editModuloView/" + idmod
        });
    };

    var delDoc = function dD() {
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
                })
            },
            success: function(data, textStatus, jqXHR) {
                $("#comp-mod").html(data);
            }
        });
    };
    */
</script>
