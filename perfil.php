<header id="header">
    <div class="container">
        <h1>Meu Perfil</h1>
        <p>Olá, <?= olaname() ?></p>
    </div>
</header>
<main>
    <section id="dados-profile">
        <div class="container">
            <div class="row">
                <div class="col text-center"><p><?= $_SESSION['matricula']; ?></p></div>
                <div class="col text-center"><p><?=$_SESSION['nome'];?></p></div>
                <div class="col text-center"><p <?= $_SESSION['email-new'] == 'success' ? 'class="scaleAni"' : '' ?> ><?=$_SESSION['email'];?></p></div>
                <div class="col text-center"><p><?=$_SESSION['nascimento'];?></p></div>
                <div class="col text-center"><p><?=$_SESSION['telefone']?></p></div>
            </div>
        </div>
    </section>
    <section id="alterar-dados">
        <div class="container">
            <div class="header-section">
                <h2>Alterar dados</h2>
            </div>
            <div class="row">
                <div class="col alterar-email">
                    <h3>Alterar email</h3>
                    <?php
                        if (isset($_SESSION['email-new'])) {
                            switch ($_SESSION['email-new']) {
                                case '403':
                                    echo '<div class="alert alert-warning" role="alert">Acesso negado! Estranho, né? 🤔</div>';
                                    unset($_SESSION['email-new']);
                                    break;
                                case '0':
                                    echo '<div class="alert alert-warning" role="alert">Falha! Erro desconhecido.</div>';
                                    unset($_SESSION['email-new']);
                                    break;
                                case '1':
                                    echo '<div class="alert alert-warning" role="alert">Os novos emails fornecidos não coincidem. 🙁</div>';
                                    unset($_SESSION['email-new']);
                                    break;
                                case '2':
                                    echo '<div class="alert alert-warning" role="alert">O email atual fornecido não é o seu. 🙁</div>';
                                    unset($_SESSION['email-new']);
                                    break;
                                case 'success':
                                    echo '<div class="alert alert-success" role="alert">Email alterado com sucesso!</div>';
                                    unset($_SESSION['email-new']);
                                    break;
                                default:
                                    break;
                            }
                        }
                    ?>
                    <form method="POST" action="./pages/email.new.php">
                        <div class="container">
                            <input readonly style="display: none;" type="text" value="<?=$_SESSION['matricula']?>" name="matricula">
                                <div>
                                    <label for="mail-atual">Seu email atual:<input type="email" name="mail-atual" value="<?=$_SESSION['email']?>" id="mail-atual"></label>
                                </div>
                                <div>
                                    <label for="mail-new">Seu novo email: <input type="email" name="mail-new" id="mail-new"></label>
                                </div>
                                <div>
                                    <label for="mail-new-again">Novo email novamente: <input type="email" name="mail-new-again" id="mail-new-again"></label>
                                </div>
                                <div class="mg-auto">
                                    <button type="submit"><i class="fas fa-check"></i></button>
                                </div>
                        </div>
                    </form>
                </div>
                <div class="col alterar-senha">
                    <h3>Alterar senha</h3>
                    <?php
                        if (isset($_SESSION['pass-new'])) {
                            switch ($_SESSION['pass-new']) {
                                case '403':
                                    echo '<div class="alert alert-warning" role="alert">Acesso negado! Estranho, né? 🤔</div>';
                                    unset($_SESSION['pass-new']);
                                    break;
                                case '0':
                                    echo '<div class="alert alert-warning" role="alert">Falha! Erro desconhecido.</div>';
                                    unset($_SESSION['pass-new']);
                                    break;
                                case '1':
                                    echo '<div class="alert alert-warning" role="alert">As novas senhas fornecidas não coincidem. 🙁</div>';
                                    unset($_SESSION['pass-new']);
                                    break;
                                case '2':
                                    echo '<div class="alert alert-warning" role="alert">A senha atual fornecida não é a sua. 🙁</div>';
                                    unset($_SESSION['pass-new']);
                                    break;
                                case 'success':
                                    echo '<div class="alert alert-success" role="alert">Senha alterada com sucesso!</div>';
                                    unset($_SESSION['pass-new']);
                                    break;
                                default:
                                    break;
                            }
                        }
                    ?>
                    <form method="POST" action="./pages/pass.new.php">
                        <div class="container">
                            <input readonly style="display: none;" type="text" value="<?=$_SESSION['matricula']?>" name="matricula">
                            <div>
                            <label for="pass-atual">Sua senha atual:<input type="password" onfocus='this.type="text"' onblur='this.type="password"' value="<?=$_SESSION['pass']?>" name="pass-atual" id="pass-atual"></label>
                            </div>
                            <div>
                                <label for="pass-new">Sua nova senha:<input type="password" onfocus='this.type="text"' onblur='this.type="password"' name="pass-new" id="pass-new"></label>
                            </div>
                            <div>
                                <label for="pass-new-again">Nova senha novamente: <input type="password" onfocus='this.type="text"' onblur='this.type="password"' name="pass-new-again" id="pass-new-again"></label>
                            </div>
                            <div class="mg-auto">
                                    <button type="submit"><i class="fas fa-check"></i></button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="ajude-smarty">
        <div class="container">
            <div class="header-section">
                <h2>Ajude a melhorar o <span class="logo-smarty">Smarty</span></h2>
            </div>
            <p>O <span class="logo-smarty">Smarty</span> é um app construido por apenas um desenvolvedor, sendo assim, é muito mais difícil achar falhas. Peço a ti, se quiser contribuir, ajude-me, se encontrar falhas, reporte para mim atravez do meu <a href="https://wa.me/5521999222644">Whatsapp</a> 😊</p>
        </div>
    </section>
</main>