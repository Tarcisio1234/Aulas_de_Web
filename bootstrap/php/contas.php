<?php 
include 'conexao.php';
session_start();


if($server['REQUEST_METHOD'] === 'POST'){
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING)
    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING)
    $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING)
    $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING)
}

?>