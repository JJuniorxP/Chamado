<?php
    require "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Chamado Técnico</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylessheet" type="text/css" href="_css/estilo.css"/>
    <script src="https://kit.fontawesome.com/b828da3adb.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid mt-3">

        <div class="row mb-3 m-100 align-items-center">

            <div class="col-6 text-right text-info">
                <!--<h3>Formulário de abertura de chamado técnico</h3>-->

            </div>

            <div class="col-6">
                <a href="cadastrar.php" class="btn btn-info float-right"><i class="fas fa-plus"></i> Adicionar</a>
            </div>

        </div>

        <table class="table table-hover">
            <thead class="">
                <tr class="bg-info text-white">
                    <th scope="col">Data</th>
                    <th scope="col">Acionador</th>
                    <th scope="col">CFC</th>
                    <th scope="col">Descrição</th>
                    <th scope="col"><i class="far fa-calendar-check"></i></th>
                    <th scope="col"><i class="fas fa-user-check"></th>
                    <th scope="col"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $select = mysqli_query($con, "SELECT * FROM tb_chamadas ORDER BY data_abertura ASC");
        
                    while($coluna = mysqli_fetch_array($select)){
                        $id = $coluna['Id'];
                        $status = $coluna['status'];
                        $data_abertura = $coluna['data_abertura'];
                        $nome = $coluna['nome'];
                        $cfc = $coluna['cfc'];
                        $estado = $coluna['estado'];
                        $descricao = $coluna['descricao'];
                        $data_fechamento = $coluna['data_fechamento'];
                        $responsavel = $coluna['responsavel'];
                            
                        if($status == "1"){
                            $cor = 'alert-success';
                        }elseif($status == "2"){
                            $cor = 'alert-warning';
                        }elseif($status == "3"){
                            $cor = 'alert-info';
                        }else{
                            $cor = 'table-light';
                        }
                    
                ?>

                <tr class="<?php echo $cor;?>">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <th scope="row"><?php echo $data_abertura;?></th>
                    <td><?php echo $nome;?></td>
                    <td><?php echo $cfc;?> <?php echo $estado;?></td>
                    <td><?php echo $descricao;?></td>
                    <td><?php echo $data_fechamento;?></td>
                    <td><?php echo $responsavel;?></td>
                    <td><a href="view.php?id=<?php echo $id?>"><i class="fas fa-eye"></i></a></td>               
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
        </table>
                <span><i class="far fa-square mt-0"></i> Aberto</span>
                <span><i class="fas fa-square" style="color: #D4EDDA;"></i> Finalizado</span>
                <span><i class="fas fa-square" style="color: #D1ECF1;"></i> Em Análise</span>
                <span><i class="fas fa-square" style="color: #FFF3CD;"></i> Aguardando retorno</span>

    </div>
    
</body>
</html>
