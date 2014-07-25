<style>
    .row-color-over:hover{
        background-color: #a1a5fe;
    }
    thead tr {background-color: #dbdcf4}
    thead tr th{ text-align: center }
    tbody tr td{ text-align: center  }
    tbody tr td img{cursor: pointer;}
</style>
<div class="col-md-12 col-md-offset-2">
    <div class="row-fluid clearfix">
        <div class="col-md-7">
            <select class="form-control">
                <?php foreach ($clubes as $cl): ?>
                    <option idclube="<?= $cl->idclube ?>"> <?= $cl->apelido ?></option>
                <?php endforeach; ?>
            </select>            
        </div>
        <button class="btn btn-primary"> + </button>
    </div>
    <div class="col-md-7" style="padding-top: 2em">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        Clube
                    </th>
                    <th>
                        Ação
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($conv) > 0): foreach ($conv as $key => $c): ?>
                        <tr class="tr-conv row-color-over">
                            <td column="clu_nome" idconv="<?= $c->idconvidado ?>"><?= $c->apelido ?></td>
                            <td>
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
</div>
