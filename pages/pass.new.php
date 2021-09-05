<?php
    include('./page-config.php');
    if(empty($_POST['matricula']) || empty($_POST['pass-atual']) || empty($_POST['pass-new']) || empty($_POST['pass-new-again'])) {
        // var_dump($_POST['matricula'].' - '.$_POST['pass-atual'].' - '.$_POST['pass-new'].' - '.$_POST['pass-new-again']);exit();
        $_SESSION['pass-new'] = '403';
        header('Location: /perfil#alterar-dados');
        exit();
    }
    $matricula = mysqli_real_escape_string($conexao, trim($_POST['matricula']));
    $pass_atual = mysqli_real_escape_string($conexao, trim($_POST['pass-atual']));
    $pass_new = mysqli_real_escape_string($conexao, trim($_POST['pass-new']));
    $pass_new_again = mysqli_real_escape_string($conexao, trim($_POST['pass-new-again']));

    //virifica se as novas senhas estão certas
    if ($pass_new != $pass_new_again) {
        $_SESSION['pass-new'] = '1';
        backTo('/perfil#alterar-dados');
        exit();
    }

    //virifica se a senha antiga está certa.
    $sql = "select * from users where matricula = '{$matricula}' and senha = '{$pass_atual}';";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_num_rows($result);
    if ($row == 0) {
        $_SESSION['pass-new'] = '2';
        backTo('/perfil#alterar-dados');
        exit();
    } else {
        $sql = "update users set senha = '$pass_new' WHERE (matricula = '$matricula');";
        if ($conexao->query($sql) === TRUE) {
            $_SESSION['pass'] = $pass_new;
            $_SESSION['pass-new'] = 'success';
            backTo('/perfil#alterar-dados');
            exit;
        } else {
            $_SESSION['pass-new'] = '0';
            backTo('/perfil#alterar-dados');
            exit;
        }
        exit();
    }

?>