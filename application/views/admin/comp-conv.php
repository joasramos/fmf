<fieldset>
    <legend> Convidados</legend>
    <div class="row-fluid clearfix">
        <div class="col-md-10">
            <form id="form-club-<?= $i . $j ?>" action="javascript:void(0)">                                
                <select id="sel-club-<?= $i . $j ?>">
                    <option>Clube</option>
                </select>
                <button sel="sel-club-<?= $i . $j ?>" class="btn-ad-conv">Add</button>                                    
            </form>
        </div>
    </div>
    <div class="row-fluid clearfix">
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead> 
                    <tr>
                        <th>
                            Clube Incluidos
                        </th>
                        <th>
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!--VERIFICAR VIA AJAX SE A MONTAGEM DA TABELA OCORRE VIA AJAX-->
                    <?php if (isset($convidados)): ?>
                    
                        <!--END MONTAGEM TABELA VIA AJAX-->                   
                    <?php else: ?>
                        <?php foreach ($grupos[$i][$j]->conv as $c): ?>
                            <tr>
                                <td><?= $c->apelido ?></td>
                                <td><button class="btn-re-conv" id-conv="<?= $c->idconvidado ?>" data-fase="f<?= $i ?>" data-grupo="g<?= $i . $j ?>">Remove</button></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div> 
    </div>
</fieldset>