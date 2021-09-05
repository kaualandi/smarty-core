<?php
    $sql = 'select * from infors where id=1';$result = mysqli_query($conexao, $sql);$dadosescola = mysqli_fetch_array($result);
?>
<header class="container-fluid d-flex flex-column justify-content-center align-items-center" id="header-home-php">
    <h1 class="rotateTitle"><?=$dadosescola['name']?></h1>
    <p class="rotateTitle">Direção: <?=$dadosescola['diretor']?></p>
</header>

<section id="avisos">
    <div class="container">
        <div class="header-section">
            <h2>Avisos</h2>
        </div>
        <div class="row">
            <?php
                $sql = 'select * from avisos order by id desc';$result = mysqli_query($conexao, $sql);
                $row = mysqli_num_rows($result);
                if ($row == 0) {
                    echo '<div class="alert alert-info" role="alert"><i class="fas fa-info-circle"></i> Nenhum aviso disponível! 🙁</div>';
                } else {
                    while ($avisos = mysqli_fetch_array($result)) {
                        $titulo = $avisos['titulo'];
                        $msg = $avisos['msg'];
                        $nome = $avisos['nome'];
                        $id = $avisos['id'];
                        
                        echo '<div class="col-md-6 mb-4">';
                        echo '<div class="box">';
                        echo '<h3>'. $titulo .'</h3>';
                        echo '<p>'.$msg.'</p>';
                        echo '<p>'.$nome.'</p>';
                        echo '</div>';
                        echo '</div>';

                    }
                }
            ?>
        </div>
    </div>
</section>
        <?php
            $diaHoje = date('d');
            $mesHoje = date('m');
            $sql = "select * from users where day(nascimento) = '$diaHoje' and month(nascimento) = '$mesHoje';";$result = mysqli_query($conexao, $sql);
            $row = mysqli_num_rows($result);
            if ($row == 0) {
                // echo '<div class="alert alert-info" role="alert"><i class="fas fa-info-circle"></i> Nenhum aviso disponível! 🙁</div>';
            } elseif ($row == 1) {
                ?>
                    <section id="aniversariantes">
                        <div class="container">
                            <div class="header-section">
                                <h2>Aniversariante 🎉</h2>
                            </div>
                            <div id="ul-niver-day" class='row'>
                                <div class="li-niver-day text-center">
                <?php
                $aniversariante = mysqli_fetch_array($result)['nome'];
                 echo "<p>$aniversariante</p>";

                ?>
            
            </div>
        </div>
    </div>
</section>
                <?php
            } elseif ($row > 1) {
                ?>
                <section id="aniversariantes">
                        <div class="container">
                            <div class="header-section">
                                <h2>Aniversariantes 🎉</h2>
                            </div>
                            <div id="ul-niver-day" class='row'>
                <?php
                while ($aniversariantes = mysqli_fetch_array($result)) {
                    $nome = $aniversariantes['nome'];
                    echo '<div class="li-niver-day text-center">';
                    echo '<p>'.$nome.'</p>';
                    echo '</div>';
                }
                ?>
                
        </div>
    </div>
</section>
                <?php
            }
            ?>
<section id="portal">
    <div class="container">
        <div class="texto-sobre-imagem row">
            <div class="col-md-6 col-12">
                <div class="box-options">
                    <img class="img-fluid" src="./assets/img/alunos.png" alt="">
                    <div class="content">
                        <a href="/aluno" role="button" class="text-center mr-auto text-uppercase">Área do Aluno</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="box-options">
                    <img class="img-fluid" src="./assets/img/professores.png" alt="">
                    <div class="content">
                        <a href="/professor" role="button" class="text-center mr-auto text-uppercase">Área do Professor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact">
    <div class="container">
        <div class="header-section">
            <h2>Contato</h2>
        </div>
        <div class="row justify-content-around">
            <div>
                <p><i class="fas fa-envelope"></i> <a href="mailto:<?=$dadosescola['email']?>"><?=$dadosescola['email']?></a></p> 
            </div>
            <div>
                <p><i class="fas fa-phone"></i> <a href="tel:+55<?=$dadosescola['telefone']?>"><?= strlen($dadosescola['telefone']) == '11' ? Mask("(##)#####-####",$dadosescola['telefone']) : Mask("(##)####-####",$dadosescola['telefone']);?></a></p> 
            </div>
            <div>
                <p><i class="fab fa-whatsapp"></i> <a href="http://wa.me/55<?=$dadosescola['whatsapp']?>"><?= strlen($dadosescola['whatsapp']) == '11' ? Mask("(##)#####-####",$dadosescola['whatsapp']) : Mask("(##)####-####",$dadosescola['whatsapp']);?></a></p> 
            </div>
            <div>
                <p><i class="fab fa-facebook"></i> <a href="<?=$dadosescola['facebook']?>"><?=explode('facebook.com',$dadosescola['facebook'])[1]?></a></p> 
            </div>
        </div>
        <div class="row map">
            <iframe class="img-fluid w-100" src="<?=$dadosescola['maps']?>" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>