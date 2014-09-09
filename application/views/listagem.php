<style>
    /*    .row-color-over:hover{
            background-color: #cccccc;
        }*/
    thead tr {background-color: #285e8e; color:white}
    thead tr th{ text-align: center }
    tbody tr td{ text-align: center  }
    tbody tr td img{cursor: pointer;}
</style>

<div class="row-fluid" style="margin-top: 2em">
    <!--BOTAO NOVO-->
    <div class="row-fluid">
        <div class="col-md-12" style="display: table">
            <div class="col-md-4" style="" >
                <a href="<?= site_url($controle) ?>/newElement">
                    <button class="btn btn-primary form-control" type="button"> CADASTRAR NOVO(A)+</button>
                </a>           
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <!--FILTRO-->
        <div class="col-md-12" style="display: table" >
            <form class="navbar-form navbar-left" role="search" action="<?= site_url($controle) ?>/showAll" method="POST">
                <span>Filtro:</span>
                <div class="form-group">
                    <input class="form-control" type="text" name="input_nome"/>
                </div> 
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>
        </div>  
    </div>

    <div class="row-fluid clearfix" style="max-height: 768px; overflow: auto">
        <!--TABELA-->
        <div class="col-md-12">
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
                    <?php
                    foreach ($list as $k => $value): $objeto = (array) $value
                        ?>
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

                                <?php if (count($extra)): ?>
                                    <a href="<?= base_url() . $extra[$k]['url'] ?>"> 
                                        <img width="22" src="<?= base_url() . $extra[$k]['url_icon'] ?>"/> 
                                    </a>                            
                                <?php endif; ?>

                                <a href="<?= base_url() . $controle ?>/drop/<?= $id ?>"> 
                                    <img width="22" src="<?= base_url() ?>/assets/images/icon/delete-icon.png"/> 
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php
                    if (count($list) < 1)
                        echo"<tr><td>Não há itens cadastrados</td></tr>";
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>