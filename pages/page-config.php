<?php
    header('Content-type:text/html; charset=utf-8');
    date_default_timezone_set ('America/Sao_Paulo');
    // error_reporting(E_ALL);
    session_start();
    $url = isset($_GET['a']) ? $_GET['a'] : '';

    if(basename($_SERVER["PHP_SELF"]) == "page-config.php") {
        backTo('/403');
    }

    if ($_SERVER['SERVER_NAME'] == 'localhost') {
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DB', 'smarty');
    } else {
        define('HOST', 'localhost');
        define('USER', 'id17324367_root');
        define('PASS', '02102005Ka@@');
        define('DB', 'id17324367_smarty');
    }
    $conexao = mysqli_connect(HOST, USER, PASS, DB) or die ('<h1>Falha ao conectar com o banco de dados</h1><p>Entre em contato com o programador imadiatamente. <a href="https://wa.me/5521999222644">falar com o programador</a></p>');
    ini_set( 'display_errors', 0 );
    
    function Mask($mask,$str){
        $str = str_replace(" ","",$str);
        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }
        return $mask;
    }
    function olaname() {
        if ($_SESSION['logado']) {
            return $_SESSION['pnome'];
        } else {
            return "visitante";
        }
    }
    function backTo($url) {
        header('Location: '.$url);
    }
    function navbar() {
        $logado = false;
        if ($_SESSION['logado']) {
            $logado = true;
        }
    }

    switch ($url) {
        case 'login':
            login();
            break;
        case 'admin':
            admin();
            break;
        case 'aluno':
            aluno();
            break;
        case 'avisos':
            avisos();
            break;
        case 'boletim':
            boletim();
            break;
        case 'perfil':
            perfil();
            break;
        case 'professor':
            professor();
            break;
        case 'usuarios':
            usuarios();
            break;
        default:
            index();
            break;
    }
    
    function login() {
        if ($_SESSION['logado']) {
            backTo('/');
        }
    }
    function admin() {
        if (!$_SESSION['logado']) {
            backTo('/login');
        } elseif($_SESSION['nivel'] < 3) {
            backTo('/403');
        }
    }
    function aluno() {
        if (!$_SESSION['logado']) {
            backTo('/login');
        } elseif($_SESSION['nivel'] == 2) {
            backTo('/403');
        }
    }
    function avisos() {
        if (!$_SESSION['logado']) {
            backTo('/login');
        } elseif($_SESSION['nivel'] < 2) {
            backTo('/403');
        }
    }
    function boletim() {
        if (!$_SESSION['logado']) {
            backTo('/login');
        } elseif($_SESSION['nivel'] == 1) {
            backTo('/403');
        }
    }
    function perfil() {
        if (!$_SESSION['logado']) {
            backTo('/login');
        }
    }
    function professor() {
        if (!$_SESSION['logado']) {
            backTo('/login');
        } elseif($_SESSION['nivel'] == 1) {
            backTo('/403');
        }
    }
    function usuarios() {
        if (!$_SESSION['logado']) {
            backTo('/login');
        } elseif($_SESSION['nivel'] == 1) {
            backTo('/403');
        }
    }
    function index() {
        
    }

    //!LOG
    // include('log.register.php');
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $urlLog = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if ($_SESSION['logado']) {
        $nomeLog = $_SESSION['nome'];
        $matriculaLog = $_SESSION['matricula'];
    } else {
        $nomeLog = "visitante";
        $matriculaLog = "visitante";
    }
    $today = date("Y-m-d H:i:s");
    $log = '<b>IP:</b> '.$ipaddress.' - <b>Página:</b> '.$urlLog;
    $sql = "insert into log (user, matricula, log, datetime) VALUES ('$nomeLog', '$matriculaLog', '$log', '$today');";
    // var_dump($sql);exit();
    $result = mysqli_query($conexao, $sql);
    // $row = mysqli_fetch_assoc($result);
?>
