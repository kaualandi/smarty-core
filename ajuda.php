<header id="header">
    <div class="container">
        <h1>Ajuda</h1>
        <p>Olá, <?= olaname() ?></p>
    </div>
</header>
<main>
    <section id="avisos">
        <div class="container">
            <div class="header-section">
                <h2>Dúvidas frequentes</h2>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="box">
                        <h3>Sou pai, como entro?</h3>
                        <p>Basta entrar na mesma conta do seu filho, terá acesso a todas as informações necessárias.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="box">
                        <h3>Como me cadastro?</h3>
                        <p>Por se tratar de um cadastro restrito aos alunos, consigirá apenas se entrar em contato conosco, basta no assunto colocar "Cadastro" que saberemos do que se trata.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="box">
                        <h3>Esqueci minha senha ou email</h3>
                        <p>Por segurança, não foi adicionado um método de redefinição, para isso, entre em contato conosco logo abaixo, não se esqueça de informar seu número de telefone para entrar-mos em contato.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="box">
                        <h3>Erro: 404</h3>
                        <p>Pode ser que entrou em uma página que tenha sido movida ou até mesmo não exista mais, tente recomeçar a partir da <a href="/">Home</a>. Se tens certeza que há algum problema com o sistema, por favor, não exite em nos contatar.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="box">
                        <h3>Erro: 403</h3>
                        <p>Seu acesso foi negado, talvez não tenha autorização para entrar naquela página, retorne a <a href="/">Home</a> e recomece. Se tens certeza que há algum problema com o sistema, por favor, não exite em nos contatar.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container">
            <div class="header-section">
                <h2>Entrar em contato</h2>
            </div>
            <form action="">
                <div class="row md-4">
                    <div class="col-md-6 mb-4">
                        <label for="">Seu nome: *<input required type="text" name="name" id=""></label>
                        <label for="">Seu email:<input type="email" name="email" id=""></label>
                        <label for="">Seu Número: *<input type="tel" maxlength="11" name="tel" id=""></label>
                        <label for="">Assunto: <input type="text" name="_subject" id=""></label>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="">Mensagem: *<textarea name="menssage" id=""></textarea></label>
                    </div>
                    <div class="mg-auto">
                        <button type="submit">Pronto</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
        <p class="text-center" style="margin-bottom: -2em; margin-top: 2em;">Feito com ❤ por <a href="http://kaualf.netlify.app">Kauã Landi</a></p>
</main>