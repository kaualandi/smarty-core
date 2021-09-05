<?php
include('page-config.php');
if(empty($_POST['matricula']) || empty($_POST['fullname'])) {
    header('Location: /403');
    exit();
}
$matricula = mysqli_real_escape_string($conexao, trim($_POST['matricula']));
$fullname = mysqli_real_escape_string($conexao, trim($_POST['fullname']));
$nascimento = mysqli_real_escape_string($conexao, trim($_POST['nasc']));
$email = mysqli_real_escape_string($conexao, trim($_POST['add-email']));
$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['add-pass']));
$nivel = mysqli_real_escape_string($conexao, trim($_POST['vocacion']));
$turma = mysqli_real_escape_string($conexao, trim($_POST['turma']));

$sql = "select count(*) as total from users where matricula = '{$matricula}';";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['total'] == 1) {
    $_SESSION['registrado'] = 'falha-matricula';
    backTo('/admin#add-pessoa');
    exit;
}
$sql = "select count(*) as total from users where email = '{$email}';";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['total'] == 1) {
    $_SESSION['registrado'] = 'falha-email';
    backTo('/admin#add-pessoa');
    exit;
}

$sql = "INSERT INTO users (matricula, email, senha, nome, nascimento, telefone, CPF, nivel, turma) VALUES ('$matricula','$email','$senha','$fullname','$nascimento','$telefone','$cpf','$nivel','$turma');";

if ($conexao->query($sql) === TRUE) {
    $_SESSION['registrado'] = 'sucesso';
    backTo('/admin#add-pessoa');
} else {
    $_SESSION['registrado'] = 'falha-desconhecida';
    backTo('/admin#add-pessoa');
}
$conexao->close();
?>