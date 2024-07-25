<?php
include 'conexaoBanco.php';
if(isset($_POST['logar'])){
    $email = filter_input(INPUT_POST,'cpEmail', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST,'cpSenha', FILTER_SANITIZE_STRING);
    if(strlen($_POST['cpEmail'])===0){
        echo"<script>
    window.location.href = '../login.html?status=success';
    </script>";
    }
    else if(strlen($_POST['cpSenha']) === 0){
    echo "
    <script>
    window.location.href = '../login.html?status=error';
    </script>";

}
}


?>