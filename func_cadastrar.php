<?php
require "conexao.php";

date_default_timezone_set('America/Sao_Paulo');


$data_abertura = date('d/m');
$hora_abertura = date('H:i');
$nome = $_POST['nome'];
$cfc = $_POST['cfc'];
$estado = $_POST['estado'];
$contato = $_POST['contato'];
$descricao = $_POST['descricao'];
$conteudo = htmlentities($_POST['conteudo'], ENT_QUOTES);

$query = mysqli_query($con, "SELECT * FROM tb_chamadas WHERE descricao = '$descricao'");
$array = mysqli_fetch_array($query);
$consulta = $array['descricao'];
    
if($consulta == $descricao){
    echo"<script>alert('Este chamado já foi aberto!');history.back();</script>";
}else{
    mysqli_query($con, "INSERT INTO tb_chamadas (status, data_abertura, hora_abertura, nome, cfc, estado, contato, descricao, conteudo) VALUES ('0','$data_abertura','$hora_abertura','$nome','$cfc','$estado','$contato','$descricao','$conteudo')");
    echo"<script>alert('Chamado técnico aberto com sucesso!');window.location.href='index.php';</script>";
    }

?>