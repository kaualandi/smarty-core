<?php
    include './pages/page-config.php'
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php if ($url) {echo ucfirst($url) . ' | ';}?>Smarty</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/img/smarty-logo.svg">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/img/smarty-logo.svg">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/img/smarty-logo.svg">
    <link rel="apple-touch-icon-precomposed" href="/assets/img/smarty-logo.svg">
    <link rel="shortcut icon" href="/assets/img/smarty-logo.svg">

    <!-- <script defer src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script> -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
    <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <style>img[alt="www.000webhost.com"] {display:none;}</style>

</head>

<body>
<div class="pride"></div>
    <?php
        include './pages/bits/header.php';
        include (!empty($url) && file_exists($url . '.php') && is_file($url . '.php')) ? $url . '.php' : './home.php';
        include './pages/bits/footer.php';
    ?>
    <script src="../../vendor/font.js"></script>
    <script>
        document.querySelector(".containe").addEventListener("click", () => {
            document.querySelector(".sun-logo").classList.toggle("on");
            document.querySelector(".moon-logo").classList.toggle("on");
            if (document.querySelector(".dark")) {
                document.querySelector("html").classList.toggle("dark");
                salvarTema("light");
            } else {
                document.querySelector("html").classList.toggle("dark");
                salvarTema("dark");
            }
        })
        if (localStorage.theme == "dark") {
            document.querySelector('html').classList.add('dark');
            document.querySelector(".sun-logo").classList.toggle("on");
            document.querySelector(".moon-logo").classList.toggle("on");
        }
        function salvarTema(theme) {
            localStorage.setItem('theme', theme);
        }
    </script>
</body>
</html>