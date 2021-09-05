<?php
    $sql = 'select * from infors where id=1';$result = mysqli_query($conexao, $sql);$dadosescola = mysqli_fetch_array($result);
?>
<header id="header">
    <div class="container">
        <h1>Sala dos Professores</h1>
        <p>Olá, <?= olaname() ?></p>
    </div>
</header>
<main>
    <section id="materias">
        <div class="container">
            <div class="header-section">
                <h2>Minhas turmas</h2>
            </div>
            <div class="texto-sobre-imagem row">
                <div class="col-md-6 col-12">
                    <div class="box-options">
                        <img class="img-fluid" src="./assets/img/googleclassroom.png" alt="">
                        <div class="content">
                            <a href="https://classroom.google.com/" role="button" class="text-center mr-auto text-uppercase">Google Sala de Aula</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="box-options">
                        <img class="img-fluid" src="./assets/img/chat.png" alt="">
                        <div class="content">
                            <a href="<?=$dadosescola['grupoprofs']?>" role="button" class="text-center mr-auto text-uppercase">Grupo dos Professores</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="box-options">
                        <img class="img-fluid" src="./assets/img/users.png" alt="">
                        <div class="content">
                            <a href="/usuarios" role="button" class="text-center mr-auto text-uppercase">
                                Ver usuários
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="box-options">
                        <img class="img-fluid" src="./assets/img/notas.png" alt="">
                        <div class="content">
                            <a href="/boletim" role="button" class="text-center mr-auto text-uppercase">
                                Gerenciar notas de alunos
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="box-options">
                        <img class="img-fluid" src="./assets/img/avisos.png" alt="">
                        <div class="content">
                            <a href="/avisos" role="button" class="text-center mr-auto text-uppercase">
                                Adicionar/apagar avisos
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="box-options">
                        <img class="img-fluid" src="./assets/img/profile.png" alt="">
                        <div class="content">
                            <a href="/avisos" role="button" class="text-center mr-auto text-uppercase">
                                Meu Perfil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>