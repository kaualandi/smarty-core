<?php
    include('page-config.php');
    if(empty($_POST['matricula']) || empty($_POST['fullname'])) {
        header('Location: /403');
        exit();
    }
    $old_matricula = mysqli_real_escape_string($conexao, trim($_POST['old-matricula']));
    $matricula = mysqli_real_escape_string($conexao, trim($_POST['matricula']));
    $fullname = mysqli_real_escape_string($conexao, trim($_POST['fullname']));
    $nascimento = mysqli_real_escape_string($conexao, trim($_POST['nasc']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['pass']));
    $nivel = mysqli_real_escape_string($conexao, trim($_POST['vocacion']));
    $turma = mysqli_real_escape_string($conexao, trim($_POST['turma']));
    $sql = "update users set matricula = '$matricula', email = '$email', senha = '$senha', nome = '$fullname', nascimento = '$nascimento', telefone = '$telefone', CPF = '$cpf', nivel = '$nivel', turma = '$turma' WHERE (matricula = '$old_matricula');";
    if ($conexao->query($sql) === TRUE) {
        $_SESSION['user-alter'] = 'success';
        backTo('/usuarios#alter-user');
        exit;
    } else {
        $_SESSION['user-alter'] = 'error';
        backTo('/usuarios#alter-user');
        exit;
    }
?>