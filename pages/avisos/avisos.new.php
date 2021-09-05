<?php
    include('../page-config.php');
    if(empty($_GET['title']) || empty($_GET['msg']) || empty($_GET['autor'])) {
        header('Location: /403');
        exit();
    }
    $titulo = $_GET['title'];
    $msg = $_GET['msg'];
    $nome = $_GET['autor'];

    $sql = "insert into avisos (titulo, msg, nome) values ('$titulo', '$msg', '$nome');";
    if ($conexao->query($sql) === TRUE) {
        backTo('/avisos#drop-avisos');
        $_SESSION['avisonew'] = 'success';
        exit;
    } else {
        $_SESSION['avisonew'] = 'error';
        backTo('/avisos#drop-avisos');
        exit;
    }
?>