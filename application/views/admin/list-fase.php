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

<!--BOTAO QUE ABRE A DIV DA CADASTRO/EDIÇÃO DE UMA NOVA FASE-->
<div class="row-fluid clearfix">
    <button class="btn btn-primary" id="btn-nova-fase"> + Novo Fase</button>
</div>

<!--TABELAS COM LISTAS DE FASES DE UM DETERMINADO MÓDULO-->
<div class="col-md-12 pn">
    <!--O NOME DO MODULO É CARREGADO EM competicoes.js-->
    <h5 class="text-center text-warning" id="nomemod_fase"></h5>    
    <table class="table">
        <thead>
            <tr class="back-row-head">
                <th>
                    ID
                </th>
                <th>
                    Tipo Fase
                </th>
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
                    <tr class="tr-fase">
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

<!--NESSA DIV SERA CARREGADO O PAINEL DE CADASTRO/EDIÇÃO DE UMA NOVA FASE-->
<div class="row-fluid clearfix" id="nova-fase" style="display: none; background-color: white">

</div>

<!--SCRIPT DESSA PÁGINA-->
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
