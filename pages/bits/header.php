<?php
    $sql = 'select * from infors where id=1';$result = mysqli_query($conexao, $sql);$dadosescola = mysqli_fetch_array($result);
?>
<nav class="navbar sticky-top navbar-expand-sm">
    <a class="navbar-brand" href="/" id="navbar-logo"><?=$dadosescola['abbr']?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <!-- <span><i class="fas fa-align-right"></i></span> -->
        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="align-right" class="svg-inline--fa fa-align-right fa-w-14" role="img" viewBox="0 0 448 512"><path fill="currentColor" d="M16 224h416a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16H16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16zm416 192H16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm3.17-384H172.83A12.82 12.82 0 0 0 160 44.83v38.34A12.82 12.82 0 0 0 172.83 96h262.34A12.82 12.82 0 0 0 448 83.17V44.83A12.82 12.82 0 0 0 435.17 32zm0 256H172.83A12.82 12.82 0 0 0 160 300.83v38.34A12.82 12.82 0 0 0 172.83 352h262.34A12.82 12.82 0 0 0 448 339.17v-38.34A12.82 12.82 0 0 0 435.17 288z"/></svg>

    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php
                if ($_SESSION['logado']) {
                    echo '<li class="nav-item active"><a class="nav-link" href="/perfil">'. $_SESSION['pnome'].'</a></li>';
                    echo '<li class="nav-item active"><a class="nav-link" href="/pages/logout.php">Sair</a></li>';
                } else {
                    echo '<li class="nav-item active"><a class="nav-link" href="/login">Entrar</a></li>';
                }
                if ($_SESSION['nivel'] >= 3) {
                    echo '<li class="nav-item active"><a class="nav-link" href="/admin">Admin</a></li>';
                }
                if ($_SESSION['nivel'] == 1) {
                    echo '<li class="nav-item active"><a class="nav-link" href="/aluno">Sala</a></li>';
                }
                if ($_SESSION['nivel'] == 2) {
                    echo '<li class="nav-item active"><a class="nav-link" href="/professor">Sala</a></li>';
                }
            ?>
            <li class="nav-item active">
                <a class="nav-link">
                    <div class="containe">
                        <div class="sun sun-logo on">
                            <!-- <i class="fas fa-cloud-sun"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#16161a" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="12" r="4" />
                                <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                            </svg>
                        </div>
                        <div class="moon moon-logo">
                            <!-- <i class="fas fa-cloud-moon"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-moon" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fffffe" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                            </svg>
                        </div>
                    </div>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/ajuda">Ajuda</a>
            </li>
        </ul>
    </div>
</nav>