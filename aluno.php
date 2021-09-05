<?php
    $sql = 'select * from infors where id=1';$result = mysqli_query($conexao, $sql);$dadosescola = mysqli_fetch_array($result);
    switch ($dadosescola['divisao']) {
        case 'M':
            $divisao = 'Mês';
            break;
        case 'B':
            $divisao = 'Bimestre';
            break;
        case 'T':
            $divisao = 'Trimestre';
            break;
        case 'S':
            $divisao = 'Semestre';
            break;
        default:
            $divisao = 'Divisão';
            break;
    }
    
?>
<header id="header">
    <div class="container">
        <h1>Sala de Aula</h1>
        <p>Olá, <?= olaname() ?></p>
    </div>
</header>
<main>
    <section id="materias">
        <div class="container">
            <div class="header-section">
                <h2>Minha turma</h2>
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
    <section id="boletins">
        <div class="container">
            <div class="header-section">
                <h2>Meus boletins</h2>
            </div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Disciplina</th>
                            <th>Nota</th>
                            <th>Frequência</th>
                            <th><?=$divisao?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "select * from notas where matricula = '{$_SESSION['matricula']}';";
                            $result = mysqli_query($conexao, $sql);
                            // $notas = mysqli_fetch_array($result);
                            $row = mysqli_num_rows($result);
                            if ($row == 0) {
                                echo "<tr>";
                                echo "<th>Nenhuma nota atribuida a você</th>";
                                echo "<th> :( </th>";
                                echo "<th> :( </th>";
                                echo "<th> :( </th>";
                                echo "</tr>";
                            } else {
                                
                                while ($registro = mysqli_fetch_array($result)) {
                                    $disciplina = $registro['disciplina'];
                                    $nota = $registro['nota'];
                                    $freq = $registro['freq'];
                                    $divisao = $registro['divisao'];
                                    echo "<tr>";
                                    echo "<th>{$disciplina}</th>";
                                    if ($nota < 5) {
                                        echo "<th><span class='red-nota'>{$nota}</span></th>";
                                    } else {
                                        echo "<th>{$nota}</th>";
                                    }
                                    echo "<th>{$freq}</th>";
                                    echo "<th>{$divisao}</th>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>