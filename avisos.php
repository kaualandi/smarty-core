<?php

?>
<header id="header">
    <div class="container">
        <h1>Gerenciar avisos</h1>
        <p>Olá, <?= olaname() ?></p>
    </div>
</header>
<main>
    <section id="set-avisos">
        <div class="container">
            <div class="header-section">
                <h2>Adicionar avisos</h2>
            </div>
            <form class="" action="./pages/avisos/avisos.new.php" method="GET">
                <div class="">
                    <div class="box">
                        <h3><input placeholder="Título" class="alt-table" type="text" required name="title" id="title" maxlength="40"></h3>
                        <p><textarea placeholder="Escreva aqui a mensagem" class="alt-table" required name="msg" id="msg" maxlength="400"></textarea></p>
                        <p><input style="width: fit-content;" readonly class="alt-table" type="text" required name="autor" value="<?= $_SESSION['nome'] ?>"></p>
                        <button class="button a" type="submit">Pronto</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section id="drop-avisos">
        <div class="container">
            <div class="header-section">
                <h2>Ver avisos</h2>
            </div>
            <?php
                if(isset($_SESSION['avisodrop'])) {
                    if ($_SESSION['avisodrop'] == 'success') {
                        echo '<div class="alert alert-success" role="alert">Aviso apagado com êxito.</div>';
                        unset($_SESSION['avisodrop']);
                    } else {
                        echo '<div class="alert alert-warning" role="alert">Uma falha aconteceu aconteceu, talvez ele já não existia antes 🤷‍♂️.</div>';
                        unset($_SESSION['avisodrop']);
                    }
                }
                if(isset($_SESSION['avisonew'])) {
                    if ($_SESSION['avisonew'] == 'success') {
                        echo '<div class="alert alert-success" role="alert">Aviso criado com êxito.</div>';
                        unset($_SESSION['avisonew']);
                    } else {
                        echo '<div class="alert alert-warning" role="alert">Uma falha aconteceu, tente novamente.</div>';
                        unset($_SESSION['avisonew']);
                    }
                }
            ?>
            <div class="row">
                <?php
                $sql = 'select * from avisos order by id desc';
                $result = mysqli_query($conexao, $sql);
                $row = mysqli_num_rows($result);
                if ($row == 0) {
                    echo "<p>Vazio :(</p>";
                } else {
                    while ($avisos = mysqli_fetch_array($result)) {
                        $titulo = $avisos['titulo'];
                        $msg = $avisos['msg'];
                        $nome = $avisos['nome'];
                        $id = $avisos['id'];

                        echo '<div class="col-md-6 mb-4">';
                        echo '<div class="box">';
                        echo '<h3>' . $titulo . '</h3>';
                        echo '<p>' . $msg . '</p>';
                        echo '<p>' . $nome . '</p>';
                        echo '<form method="POST" action="./pages/avisos/avisos.drop.php">';
                        echo '<input type="number" name="delete" style="display: none;" value="' . $id . '">';
                        if ($_SESSION['nivel'] == 2) {
                            if ($nome == $_SESSION['nome']) {
                                echo '<button class="button">Excluir</button>';
                            }
                        } else {
                            echo '<button class="button">Excluir</button>';
                        }
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <section id="tricks-html">
        <div class="container">
            <div class="header-section">
                <h2>Truques para edição do seu aviso</h2>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="box">
                        <h3>Adicionando um link</h3>
                        <p>Em seu texto escreva<br><code>&lt;a href="<span class="green">link</span>"&gt;<span class="blue">text</span>&lt;/a&gt;</code><br>
                        Onde está em verde substituia pelo link (com o https:// incluso) e onde está em azul substitua pelo texto que será exibido.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="box">
                        <h3>Texto em negrito</h3>
                        <p>Em seu texto escreva<br><code>&lt;b&gt;<span class="blue">text</span>&lt;/b&gt;</code><br>
                        Onde está em azul substitua pelo texto que será exibido em negrito.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="box">
                        <h3>Texto em itálico</h3>
                        <p>Em seu texto escreva<br><code>&lt;i&gt;<span class="blue">text</span>&lt;/i&gt;</code><br>
                        Onde está em azul substitua pelo texto que será exibido em itálico.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="box">
                        <h3>Texto monoespaçado</h3>
                        <p>Em seu texto escreva<br><code>&lt;tt&gt;<span class="blue">text</span>&lt;/tt&gt;</code><br>
                        Onde está em azul substitua pelo texto que será exibido monoespaçado.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="box">
                        <h3>Queda de linha</h3>
                        <p>Se pode reparar, não importa quandos Enter's dê, nunca vai pra linha de baixo, para isso em seu texto escreva
                        <br><code>&lt;br&gt;</code></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>