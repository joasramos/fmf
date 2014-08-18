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

<!--BOTAO QUE EXIBE A VIEW PARA CADASTRO OU EDIÇÃO DE GRUPO-->
<div class="row-fluid clearfix">
    <button class="btn btn-primary" id="btn-novo-gru"> + Alocação de Clubes</button>
</div>

<!--TABELA COM LISTA DE GRUPOS DE UMA DETERMINADA FASE-->
<div class="col-md-12 pn">
    <h5 class="text-center text-warning" id="nomefasegru"></h5>  
    <table class="table">
        <thead>
            <tr class="back-row-head">
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
                    <tr class="tr-gru">
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

<!--DIV QUE ONDE SERA CARREGADA A VIEW PARA CADASTRO OU EDIÇÃO DE UM GRUPO-->
<div class="row-fluid clearfix" id="novo-grupo" style="display: none; background-color: white">

</div>

<!--SCRIPT DA PAGINA-->
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
