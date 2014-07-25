<style>
    .row-color-over:hover{
        background-color: #a1a5fe;
    }
    thead tr {background-color: #dbdcf4}
    thead tr th{ text-align: center }
    tbody tr td{ text-align: center  }
    tbody tr td img{cursor: pointer;}
</style>
<!--TABELAS COM LISTAS DE MODULOS DE UMA DETERMINADA COMPETICAO-->
<div class="col-md-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Tipo Grupo
                </th>
                <th>
                    Nº Classificados
                </th>
                <th>
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($grupos) > 0): foreach ($grupos as $key => $g): ?>
                    <tr class="tr-gru row-color-over">
                        <td column="idgrupo"><?= $g->idgrupo ?></td>
                        <td column="tg"><?= $g->nome ?></td>
                        <td column="n_cla>"><?= $g->n_classificados ?></td>
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
<div class="row-fluid clearfix">
    <div class="col-md-12">
        <button class="btn btn-primary" id="btn-novo-gru"> + Alocação de Clubes</button>
    </div>
    <div class="row-fluid clearfix" id="novo-grupo" style="display: none; background-color: white">

    </div>
</div>
<script>
    $(function() {
        /**
         * Variavel PATH DEFIFINDA em competicoes.js
         */
        $("#btn-novo-gru").click(function() {
            $("#novo-grupo").bPopup({
                loadUrl: PATH + "grupos/cadGrupoView"
            });
        });

        $(".tr-gru").on("click", ".edit", editGru);
        $(".tr-gru").on("click", ".del", delGru);

    });

    function editGru() {
        alert("OK");
    }
    ;

    function delGru() {
        alert("OK 2");
    }
    ;

</script>
