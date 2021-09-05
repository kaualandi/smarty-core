<?php
    // session_start();
    include('page-config.php');
    if(empty($_POST['email']) || empty($_POST['pass'])) {
        header('Location: /403');
        exit();
    }
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $pass = mysqli_real_escape_string($conexao, trim($_POST['pass']));
    $sql = "select * from users where email = '{$email}' and senha = '{$pass}';";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_num_rows($result);
    if($row == 1) {
        $dados = mysqli_fetch_array($result);
        $_SESSION['email'] = $email;
        $_SESSION['matricula'] = $dados['matricula'];
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['pnome'] = explode(" ", $dados['nome'])[0];
        $nascimento = new DateTime($dados['nascimento']);
        $_SESSION['nascimento'] = $nascimento->format('d/m/Y');
        // $telefone = $dados['telefone'];
        $_SESSION['telefone'] = Mask("(##)#####-####",$dados['telefone']);
        $_SESSION['cpf'] = Mask("###.###.###-##", $dados['CPF']);
        $_SESSION['nivel'] = $dados['nivel'];
        $_SESSION['pass'] = $dados['senha'];
        $_SESSION['logado'] = true;
        header('Location: /');
        exit();
    } else {
        $_SESSION['login-falha'] = '';
        header('Location: /login');
    }