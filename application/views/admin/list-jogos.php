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

<div class="row-fluid clearfix">
    <button class="btn btn-primary" id="btn-add-jogo"> + Adicionar Jogo</button>
</div>

<div class="col-md-12 pn">
    <h5 class="text-center text-warning" id="nomerodada">Rodada</h5> 
    <table class="table">
        <thead>
            <tr class="back-row-head">
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
                    <tr class="tr-fase">
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

<div class="row-fluid clearfix" id="novo-jogo" style="display: none; background-color: white">

</div>

<script>
    $(function() {
        $("#btn-add-jogo").click(function() {
            $("#novo-jogo").bPopup({
                loadUrl: PATH + "jogos/cadJogoView/" + idfase
            });
        });
    });
</script>
