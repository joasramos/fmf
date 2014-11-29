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

<!--BOTAO NOVA RODADA-->
<div class="row-fluid clearfix" style="margin-top: 2em">
    <button class="btn btn-primary" id="btn-add-rod"> + Novo Rodada</button>
</div>

<!--TABELA COM LISTAS DE RODADAS DE UMA DETERMINADA FASE-->
<div class="col-md-12 pn" style="padding-top: 1em">
    <h5 class="text-center text-warning" id="nomegruporod"></h5>  
    <table class="table">
        <thead>
            <tr class="back-row-head">
                <th>
                    ID
                </th>
                <th>
                    Rodada
                </th>
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
                    <tr class="tr-rodada">
                        <td column="idrodada"><?= $r->idrodada ?></td>
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

<!--DIV QUE REPRESENTA O PAINEL PARA CADASTRO OU EDIÇÃO DE UMA RODADA-->
<div class="row-fluid clearfix" id="novo-rod" style="display: none; background-color: white">

</div>

<!--SCRIPT DESSA PÁGINA-->
<script>
    var idrodada;
    
    $(function() {
        $("#btn-add-rod").click(function() {
            $("#novo-rod").bPopup({
                loadUrl: PATH + "rodadas/cadRodView"
            });
        });
        
        
        $(".tr-rodada").on("click", ".edit", editRod);
        $(".tr-rodada").on("click", ".del", delRod);
        
    });
    
    function editRod(){
        idrodada = $(this).parent().parent().children("td[column='idrodada']").html();
        $("#novo-rod").bPopup({
            loadUrl: PATH + "rodadas/cadRodView/"+idrodada
        });
    }
    
    function delRod(){
        idrodada = $(this).parent().parent().children("td[column='idrodada']").html();
        
        $.ajax({
            url:PATH + "rodadas/drop",
            data:{
                idrodada: idrodada
            },
            type: "POST",
            success: function(){
                showRodadas();
            },
            error: function(){
                alert("Não foi possivel excluir rodadas");
            }
        })
    }
    
    
</script>

