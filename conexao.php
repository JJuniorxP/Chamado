<?php
	$con = mysqli_connect("localhost","root","") or die ("A conexão com o banco não foi estabelecida!");
	$db = mysqli_select_db($con,"db_chamado") or die ("Base de dados não encontrado!");
?>