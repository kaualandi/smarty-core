<main>
    <section class="d-flex justify-content-center align-items-center" id="login">
        <div class="container-sm">
            <div class="">
                <?php
                    if (isset($_SESSION['login-falha'])) {
                        echo '<div class="alert alert-warning" role="alert">As informações fornecidas não coincidem com nenhum usuário cadastrado<br>
                        Você pode tentar novamente ou procurar <a href="/ajuda">ajuda</a>.</div>';
                        unset($_SESSION['login-falha']);
                    }
                ?>
                <form action="./pages/login.php" method="POST">
                    <label for="email-login">Seu email:<input type="email" name="email" id="email-login"></label>
                    <label for="pass-login">Sua senha:<input type="password" onfocus='this.type="text"' onblur='this.type="password"' name="pass" id="pass-login"></label>
                    <button type="submit"><i class="fas fa-sign-in-alt"></i> Entrar</button>
                </form>
                <div class="cadastro text-center d-flex  justify-content-center">
                    <p class="text-center"><a href="/ajuda">Não tenho conta?</a> | <a href="/ajuda">Esqueci a senha?</a></p>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    document.querySelector("html").style.background = "var(--bg-login)";
    document.querySelector("html").style.backgroundSize = "cover";
    document.querySelector("body").style.background = "none";
</script>