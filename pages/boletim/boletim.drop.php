<?php
    include('../page-config.php');
    if(empty($_POST['id'])) {
        $_SESSION['boletimDrop'] = '403';
        exit();
    }
    $delete = $_POST['id'];
    $sql = "delete from notas where id = '$delete';";
    if ($conexao->query($sql) === TRUE) {
        $_SESSION['boletimDrop'] = 'success';
        backTo('/boletim#lista-notas');
        exit;
    } else {
        $_SESSION['boletimDrop'] = 'error';
        backTo('/boletim#lista-notas');
        exit;
    }
?>