<!--TABELA DE CONVIDADOS DE UM DETERMINADO GRUPO-->
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
                    <td column="clu_nome"><?= $c->apelido ?></td>
                    <td>
                        <img idconv="<?= $c->idconvidado ?>" class="del-grupo" width="22" src="<?= base_url() ?>/assets/images/icon/delete-icon.png"/>                            
                    </td>
                </tr>
                <?php
            endforeach;
        endif;
        ?>
    </tbody>   
</table>

<script>
    $(function() {
        $(".del-grupo").click(function() {
            var idconvidado = $(this).attr("idconv");
            $.ajax({
                url: PATH + "clubes/removeConv",
                type: "POST",
                data: {
                    idconvidado: idconvidado,
                    idgrupo: idgrupo
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Erro ao deletar convidado");
                },
                success: function(data, textStatus, jqXHR) {
                    console.log("Convidado deletado com sucesso!");
                    $("#list-conv-grupo").html(data);
                }
            });
        });

    });
</script>
