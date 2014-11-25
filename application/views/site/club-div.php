<div class="col-md-8 col-sm-8 col-xs-8">
    <ul class="list-times">
        <li> <?php if (count($clubes) == 0) echo "<h5 style='color:white'>Não há clubes</h5>"; ?></li>
        <?php foreach ($clubes as $clube): ?>
            <li>
                <a href="javascript:void(0)" idclube="<?= $clube->idclube ?>" class="dados-clube-home">
                    <img width="25" height="25" src="<?= base_url() ?>assets/images/escudos/<?= $clube->bandeira ?>">
                </a>
            </li>
        <?php endforeach; ?>
        <span style="color:white">&nbsp;&raquo;</span>   
    </ul>
</div>   