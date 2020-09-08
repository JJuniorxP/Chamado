<?php
    require "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylessheet" type="text/css" href="_css/estilo.css"/>
    <title>Chamado Técnico</title>
</head>
<body>

    <?php
        
        date_default_timezone_set('America/Sao_Paulo');

        $id = $_GET['id'];

        if(isset($_GET['visualizador'])){
            $visualizador = $_GET['visualizador'];
            $status = $_GET['status'];
            $data_view = date('d/m');
            $hora_view = date('H:i');
            
            $status = ($status == 2) ? '2' : '3'; 

            $query = mysqli_query($con, "UPDATE tb_chamadas SET responsavel='$visualizador', status='$status', data_view='$data_view', hora_view='$hora_view' WHERE Id='$id'");
        }

        if(@$_GET["go"] == 'finalizar'){

            $data_fechamento = date('d/m');
            $hora_fechamento = date('H:i');
            $query = mysqli_query($con, "UPDATE tb_chamadas SET status='1', data_fechamento='$data_fechamento', hora_fechamento='$hora_fechamento' WHERE Id='$id'");
        }

        $select = mysqli_query($con, "SELECT * FROM tb_chamadas WHERE Id='$id'");

        while($coluna = mysqli_fetch_array($select)){
            $status = $coluna['status'];
            $data_abertura = $coluna['data_abertura'];
            $hora_abertura = $coluna['hora_abertura'];
            $data_fechamento = $coluna['data_fechamento'];
            $hora_fechamento = $coluna['hora_fechamento'];
            $data_view = $coluna['data_view'];
            $hora_view = $coluna['hora_view'];
            $nome = $coluna['nome'];
            $cfc = $coluna['cfc'];
            $estado = $coluna['estado'];
            $contato = $coluna['contato'];
            $descricao = $coluna['descricao'];
            $responsavel = $coluna['responsavel'];
            $conteudo = $coluna['conteudo'];
            
            
            if($status == "1"){
                $cor = 'alert-success';
            }elseif($status == "2"){
                $cor = 'alert-warning ';
            }elseif($status == "3"){
                $cor = 'alert-info';
            }else{
                $cor = 'bg-light';
            }
        }

    ?>
    <div class="container">
        
        <div class="card mt-3">
            
            <div class="card-header  <?php echo $cor;?>">
                <div class="row p-0 align-items-center">

                    <div class="col-5 px-3 pt-2">
                        <h4 class=>Abertura de Chamado #<?php echo $id;?></h4>
                    </div>

                    <div class="col-7 p-0 ">
                        <?php if ($status != 1){ ?>

                        <a class="btn btn-success mt-1 mr-1 float-right" href="view.php?id=<?php echo $id?>&go=finalizar">Finalizar</a>
                 
                        <div class="dropdown float-right mt-1 mr-2">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Analisar
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="view.php?id=<?php echo $id?>&visualizador=Bruno&status=<?php echo $status?>">Bruno</a>
                                <a class="dropdown-item" href="view.php?id=<?php echo $id?>&visualizador=Wesley&status=<?php echo $status?>">Wesley</a>
                                <a class="dropdown-item" href="view.php?id=<?php echo $id?>&visualizador=Lucas&status=<?php echo $status?>">Lucas</a>
                                <a class="dropdown-item" href="view.php?id=<?php echo $id?>&visualizador=Vinicius&status=<?php echo $status?>">Vinicius</a>
                            </div>
                        </div>

                        <a href="index.php" class="btn btn-secondary mt-1 mr-2 float-right">Voltar</a>

                        <?php
                        }else{
                        ?>
                            <a href="index.php" class="btn btn-secondary mt-1 mr-3 float-right">Voltar</a>
                        
                        <?php } ?>

                    </div>

                </div>
            </div>


            <div class="card-body">

                <div class="row  m-3">
                    <div class="col-2 p-0">
                        <p class="p-0 m-0"><small>Acionador:</small></p>
                        <p class="h6 p-0 m-0"><?php echo $nome;?></p>
                    </div>
            
                    <div class="col-4 p-0">
                        <p class="p-0 m-0"><small>CFC:</small></p>
                        <p class="h6 p-0 m-0"><?php echo $cfc;?> <?php echo $estado;?></p>
                    </div>

                    <div class="col-2 p-0">
                        <p class="p-0 m-0"><small>Data de Abertura:</small></p>
                        <p class="h6 p-0 m-0"><?php echo $data_abertura;?> <?php echo $hora_abertura;?></p>
                    </div>

                    <div class="col-2 p-0">
                        <p class="p-0 m-0"><small>Data de Visualização:</small></p>
                        <p class="h6 p-0 m-0"><?php echo $data_view;?> <?php echo $hora_view;?></p>
                    </div>

                    <div class="col-2 p-0">
                        <p class="p-0 m-0"><small>Data de Fechamento:</small></p>
                        <p class="h6 p-0 m-0"><?php echo $data_fechamento;?> <?php echo $hora_fechamento;?></p>
                    </div>
                </div>

                <div class="row  m-3 mt-4">
                    <div class="col-2 p-0">
                        <p class="p-0 m-0"><small>Contato:</small></p>
                        <p class="h6 p-0 m-0"><?php echo $contato;?></p>
                    </div>
            
                    <div class="col-8 p-0">
                        <p class="p-0 m-0"><small>Descricão:</small></p>
                        <p class="h6 p-0 m-0"><?php echo $descricao;?></p>
                    </div>
                    <div class="col-2 p-0">
                        <p class="p-0 m-0"><small>Responsável:</small></p>
                        <p class="h6 p-0 m-0"><?php echo $responsavel;?></p>
                    </div>
                </div>

                <div class="text-center row m-3 mt-5">
                    <span class="text-center m-auto w-75 mt-5"><?php echo html_entity_decode($conteudo);?></span>
                </div>
           
            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>