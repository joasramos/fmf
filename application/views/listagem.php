<style>
    .row-color-over:hover{
        background-color: #a1a5fe;
    }
    thead tr {background-color: #7c89af; color:white}
    thead tr th{ text-align: center }
    tbody tr td{ text-align: center  }
    tbody tr td img{cursor: pointer;}
</style>

<div class="col-md-11" style="padding-top: 2em">    
    <div class="row-fluid clearfix">
        <div class="col-md-10">
            <form class="navbar-form navbar-left" role="search" action="<?= site_url($controle) ?>/showAll" method="POST">
                <span>Filtro:</span>
                <div class="form-group">
                    <input class="form-control" type="text" name="input_nome"/>
                </div> 
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="btn-group btn-group">
                    <a href="<?= site_url($controle) ?>/newElement">
                        <button class="btn btn-primary form-control" type="button"> CADASTRO + </button>
                    </a>           
                </div>
            </div> 
        </div>
        <table class="table table-bordered" style="margin-left: 1em">
            <thead> 
                <tr>
                    <?php foreach ($colunas as $coluna): ?>
                        <th>
                            <?= $coluna ?>
                        </th>
                    <?php endforeach; ?>
                    <th>
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $k => $value): $objeto = (array) $value ?>
                    <tr class="row-color-over">
                        <?php
                        $id;
                        $x = 0;
                        foreach ($objeto as $key => $v):
                            if (!$x) {
                                $id = $v;
                            }
                            ?>
                            <td>
                                <?= $v ?> 
                            </td>
                            <?php
                            $x++;
                        endforeach;
                        ?>
                        <td>
                            <a href="<?= base_url() . $controle ?>/find/<?= $id ?>"> 
                                <img width="22" src="<?= base_url() ?>/assets/images/icon/config-icon.png"/> 
                            </a>
                            <a href="#" onclick="javascript:alert('Ainda não implementado')"> 
                                <img width="22" src="<?= base_url() ?>/assets/images/icon/delete-icon.png"/> 
                            </a>
                            <?php if (count($extra)): ?>
                                <a href="<?= base_url() . $extra[$k]['url'] ?>"> 
                                    <img width="22" src="<?= base_url() . $extra[$k]['url_icon'] ?>"/> 
                                </a>                            
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>