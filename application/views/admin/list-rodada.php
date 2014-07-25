<style>
    .row-color-over:hover{
        background-color: #a1a5fe;
    }
    thead tr {background-color: #dbdcf4}
    thead tr th{ text-align: center }
    tbody tr td{ text-align: center  }
    tbody tr td img{cursor: pointer;}
</style>
<!--TABELAS COM LISTAS DE RODADAS DE UMA DETERMINADA FASE-->
<div class="col-md-12" style="padding-top: 1em">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
                    Rodada
                </th>
<!--                <th>
                    Módulo
                </th>-->
                <th>
                    Nº Jogos
                </th>           
                <th>
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rodadas) > 0): foreach ($rodadas as $key => $r): ?>
                    <tr class="tr-rodada row-color-over">
                        <td column="aprod"><?= $r->apelido ?></td>
                        <td column="n_jogos>"><?= $r->n_jogos ?></td>
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
        <button class="btn btn-primary" id="btn-add-rod"> + Novo Rodada</button>
    </div>
</div>

<div class="row-fluid clearfix" id="novo-rod" style="display: none; background-color: white">

</div>

<script>
    $(function() {
        $("#btn-add-rod").click(function() {
            $("#novo-rod").bPopup({
                loadUrl: PATH + "rodadas/cadRodView"
            });
        });
    });
</script>

