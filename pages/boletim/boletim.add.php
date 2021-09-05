<?php
    include('../page-config.php');
    if(empty($_POST['matricula']) || empty($_POST['disciplina']) || empty($_POST['nota']) || empty($_POST['freq']) || empty($_POST['divisao'])) {
        $_SESSION['boletimAdd'] = '403';
        exit();
    }
    $matricula = $_POST['matricula'];
    $disciplina = $_POST['disciplina'];
    $nota = $_POST['nota'];
    $freq = $_POST['freq'];
    $divisao = $_POST['divisao'];
    $sql = "insert into notas (matricula, disciplina, nota, freq, divisao) VALUES ('$matricula', '$disciplina', '$nota', '$freq', '$divisao')";
    // var_dump($sql);exit();
    if ($conexao->query($sql) === TRUE) {
        $_SESSION['boletimAdd'] = 'success';
        backTo('/boletim#lista-notas');
        exit;
    } else {
        $_SESSION['boletimAdd'] = 'error';
        backTo('/boletim#lista-notas');
        exit;
    }
?>