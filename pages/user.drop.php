<?php
    include('./page-config.php');
    if(empty($_POST['matricula'])) { 
        $_SESSION['user-drop'] = '403';
        header('Location: /usuarios');
        exit();
    }
    $delete = $_POST['matricula'];
    $sql = "delete from users where matricula = '$delete';";
    if ($conexao->query($sql) === TRUE) {
        $_SESSION['user-drop'] = 'success';
        backTo('/usuarios');
    } else {
        $_SESSION['user-drop'] = 'error';
        backTo('/usuarios');
    }
?>