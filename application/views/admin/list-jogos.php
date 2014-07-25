<style>
    .row-color-over:hover{
        background-color: #a1a5fe;
    }
    thead tr {background-color: #dbdcf4}
    thead tr th{ text-align: center }
    tbody tr td{ text-align: center  }
    tbody tr td img{cursor: pointer;}
</style>
<div class="col-md-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="6">
                    Jogos da Rodada
                </th>   
                <th>
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($jogos) > 0): foreach ($jogos as $key => $j): ?>
                    <tr class="tr-fase row-color-over">
                        <td column="c1"><?= $j->c1_nome ?></td>
                        <td column="c1_band"><img width="20" src="<?= base_url() ?>/assets/images/escudos/<?= $j->c1_band ?>"/></td>
                        <td column="c1_gols>"><?= $j->gols_casa ?></td>
                        <td column="c1_gols>"><?= $j->gols_visitante ?></td>
                        <td column="c2_band"><img width="20" src="<?= base_url() ?>/assets/images/escudos/<?= $j->c2_band ?>"/></td>
                        <td column="c2"><?= $j->c2_nome ?></td>
                        <td>                                                       
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
        <button class="btn btn-primary" id="btn-add-jogo"> + Adicionar Jogo</button>
    </div>
</div>

<div class="row-fluid clearfix" id="novo-jogo" style="display: none; background-color: white">

</div>

<script>
    $(function() {
        $("#btn-add-jogo").click(function() {
            $("#novo-jogo").bPopup({
                loadUrl: PATH + "jogos/cadJogoView"
            });
        });
    });
</script>
