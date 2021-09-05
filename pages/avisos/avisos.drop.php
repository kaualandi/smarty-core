<?php
    include('../page-config.php');
    if(empty($_POST['delete'])) {
        header('Location: /403');
        exit();
    }
    $delete = $_POST['delete'];
    $sql = "delete from avisos where id = '$delete';";
    if ($conexao->query($sql) === TRUE) {
        $_SESSION['avisodrop'] = "success";
        backTo('/avisos#drop-avisos');
        exit;
    } else {
        $_SESSION['avisodrop'] = "error";
        backTo('/avisos#drop-avisos');
        exit;
    }