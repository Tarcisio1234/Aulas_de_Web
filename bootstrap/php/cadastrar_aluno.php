<?php
    session_start();
    include 'conexaoBanco.php';
    if(isset($_POST['Cadastrar'])){
        $nome=filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $cpf =filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
        $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
        $whatsapp =filter_input(INPUT_POST, 'whatsapp', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);

        if(strlen($_POST['nome'])===0){
            echo "<script> O campo nome esta vazio </script>";
        }
        else if(strlen($_POST['cpf'])===0){
        echo"<script> O campo cpf esta vazio </script>";
        }
        else if(strlen($_POST['celular'])===0){
            echo "<script> alert('O campo celular esta vazio') </script>";
        }
        else if(strlen($_POST['whatsapp'])===0){
            echo "<script> alert('Não foi informado se o usuario tem whatsapp') </script>";
        }
        else if(strlen($_POST['email'])===0){
            echo "<script> alert('O campo email esta vazio') </script>";
        }
        else if(strlen($_POST['categoria'])===0){
            echo "<script> alert('O campo categoria esta vazio') </script>";
        }
        else{
            $declaracao1 = $conexao->prepare("select cpf from cadaluno where cpf = ?");
            $declaracao1->bind_param("s",$cpf);
            $declaracao1-> execute();
            $declaracao1->store_result();
            if($declaracao1->num_rows>0){
                echo "<script> alert('CPF já cadastrado!!!');
                window.location.href = '../cadAluno.html';</script>";
             //   $declaracao1->close();
            }
            else{
                $declaracao1->close();
                $declaracao = $conexao->prepare("INSERT INTO `cadaluno`(`nome`,`cpf`,`celular`,`whatsapp`,`email`,`categoria`)VALUES(?,?,?,?,?,?)");
                $declaracao->bind_param("ssssss",$nome, $cpf,$celular,$whatsapp, $email, $categoria);
                $declaracao->execute();
                echo "<script> alert('Cadastado com sucesso');
                window.location.href = '../cadAluno.html';</script>";
                $declaracao->close();
            }
        }
        exit;
    }
?>