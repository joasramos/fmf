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
                    Tipo Fase
                </th>
<!--                <th>
                    Módulo
                </th>-->
                <th>
                    Nº Jogos
                </th>
                <th>
                    Ida e Volta
                </th>
                <th>
                    Extra
                </th>
                <th>
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($fases) > 0): foreach ($fases as $key => $f): ?>
                    <tr class="tr-fase row-color-over">
                        <td column="idfase"><?= $f->idfase ?></td>
                        <td column="id_tf"><?= $f->nome ?></td>
                        <td column="n_jogos>"><?= $f->n_jogos ?></td>
                        <td column="r_ida_volta"><?= $f->regra_ida_e_volta ? "Sim" : "Não" ?></td>
                        <td column="desc"><?= $f->descricao ?></td>
                        <td>
                            <img class='view' width="22" src="<?= base_url() ?>/assets/images/icon/c_blue.png"/>
                            <img class='rodada' width="22" src="<?= base_url() ?>/assets/images/icon/rodada-icon.png"/>                            
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
        <button class="btn btn-primary" id="btn-nova-fase"> + Novo Fase</button>
    </div>
</div>
<div class="row-fluid clearfix" id="nova-fase" style="display: none; background-color: white">

</div>

<script>
    $(function() {
        /**
         * Variavel PATH DEFIFINDA EM competicoes.js
         */
        $("#btn-nova-fase").click(function() {
            $("#nova-fase").bPopup({
                loadUrl: PATH + "fases/cadFaseView"
            });
        });

        // $(".tr-fase").on("click", ".edit", editFase);

    });



    /*
     $("img[class='edit']").click(function() {
     var idfase = $(this).parent().parent().children("td[column='idfase']").html();
     
     $("#nova-fase").bPopup({
     loadUrl: PATH + "fases/cadFaseView/" + idfase
     });
     });*/
</script>
