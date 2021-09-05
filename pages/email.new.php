<?php
    include('./page-config.php');
    if(empty($_POST['matricula']) || empty($_POST['mail-atual']) || empty($_POST['mail-new']) || empty($_POST['mail-new-again'])) {
        // var_dump($_POST['matricula'].' - '.$_POST['mail-atual'].' - '.$_POST['mail-new'].' - '.$_POST['mail-new-again']);exit();
        $_SESSION['email-new'] = '403';
        header('Location: /perfil#alterar-dados');
        exit();
    }
    $matricula = mysqli_real_escape_string($conexao, trim($_POST['matricula']));
    $mail_atual = mysqli_real_escape_string($conexao, trim($_POST['mail-atual']));
    $mail_new = mysqli_real_escape_string($conexao, trim($_POST['mail-new']));
    $mail_new_again = mysqli_real_escape_string($conexao, trim($_POST['mail-new-again']));

    //virifica se os novos emails estão certos
    if ($mail_new != $mail_new_again) {
        $_SESSION['email-new'] = '1';
        backTo('/perfil#alterar-dados');
        exit();
    }

    //virifica se o email antigo está certo.
    $sql = "select * from users where matricula = '{$matricula}' and email = '{$mail_atual}';";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_num_rows($result);
    if ($row == 0) {
        $_SESSION['email-new'] = '2';
        backTo('/perfil#alterar-dados');
        exit();
    } else {
        $sql = "update users set email = '$mail_new' WHERE (matricula = '$matricula');";
        if ($conexao->query($sql) === TRUE) {
            $_SESSION['email'] = $mail_new;
            $_SESSION['email-new'] = 'success';
            backTo('/perfil#alterar-dados');
        } else {
            $_SESSION['email-new'] = '0';
            backTo('/perfil#alterar-dados');
        }
        exit();
    }

?>