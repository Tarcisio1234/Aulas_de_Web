<?php
 include 'conexao.php';
 $sql = "SELECT* FROM aula";

 if(isset($_POST['instrutor']||isset($_POS['nome_aluno']))){
    $instrutor = $_POST['instrutor'];
    $instrutor = $_POST['aluno'];
 }
?>