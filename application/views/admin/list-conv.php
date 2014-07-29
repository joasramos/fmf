<style>
    .row-color-over:hover{
        background-color: #a1a5fe;
    }
    thead tr {background-color: #dbdcf4}
    thead tr th{ text-align: center }
    tbody tr td{ text-align: center  }
    tbody tr td img{cursor: pointer;}
</style>

<!--VIEW DE CONVIDADOS DE UM DETERMINADO GRUPO-->
<div class="col-md-12 col-md-offset-2">
    <div class="row-fluid clearfix">
        <div class="col-md-7">

            <!--LOAD COMBO COM OS CLUBES-->
            <select class="form-control" id="sel-clube">
                <?php foreach ($clubes as $cl): ?>
                    <option value="<?= $cl->idclube ?>"> <?= $cl->apelido ?></option>
                <?php endforeach; ?>
            </select>            
            <!--END LOAD-->

        </div>
        <button class="btn btn-primary" id="add-grupo"> + </button>
    </div>

    <!-- LOAD TABELA COM OS CONVIDADOS DE UM GRUPO-->
    <div class="col-md-7" style="padding-top: 2em" id="list-conv-grupo">
        <?php include 'list-conv-add.php'; ?>
    </div>
    <!--END LOAD-->

</div>

<!--END VIEW-->

<script>
    $(function() {
        $("#add-grupo").click(function() {
            var idclube = $("#sel-clube option:selected").val();
            $.ajax({
                url: PATH + "clubes/insertConv",
                type: "POST",
                data: {
                    idclube: idclube,
                    idfase: idfase,
                    idgrupo: idgrupo
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Erro ao inserir convidado");
                },
                success: function(data, textStatus, jqXHR) {
                    console.log("Convidado inserido com sucesso!");
                    $("#list-conv-grupo").html(data);
                }
            });
        });

    });
</script>
