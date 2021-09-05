<?php
$sql = 'select * from infors where id=1';
$result = mysqli_query($conexao, $sql);
$dadosescola = mysqli_fetch_array($result);
switch ($dadosescola['divisao']) {
    case 'M':
        $divisaoEscola = 'Mês';
        break;
    case 'B':
        $divisaoEscola = 'Bimestre';
        break;
    case 'T':
        $divisaoEscola = 'Trimestre';
        break;
    case 'S':
        $divisaoEscola = 'Semestre';
        break;
    default:
        $divisaoEscola = 'Divisão';
        break;
}
?>
<header id="header">
    <div class="container">
        <h1>Editar notas</h1>
        <p>Olá, <?= olaname() ?></p>
    </div>
</header>
<main id="boletim-php">
    <section id="escolher-aluno">
        <div class="container table">
            <div class="header-section">
                <h2>Escolher aluno</h2>
            </div>
            <div class="box">
                <button type="button" id="alterarAlunoButton" class="button" data-toggle="modal" data-target="#alterarAluno">
                    Alterar aluno
                </button>
            </div>
            <?php
            $permissao = false;
            $aluno;
            if (isset($_POST['matricula'])) {
                $sql = "select * from users where matricula = '{$_POST['matricula']}';";
                $result = mysqli_query($conexao, $sql);
                $aluno = mysqli_fetch_array($result);
                $row = mysqli_num_rows($result);
                if ($row == 1) {
                    if ($aluno['nivel'] == 1) {
                        echo "<table><thead><tr><th>Matricula</th><th>Nome</th></tr></thead><tbody><tr>";
                        echo "<th>" . $aluno['matricula'] . "</th>";
                        echo "<th>" . $aluno['nome'] . "</th>";
                        echo "</tr></tbody></table>";
                        $permissao = true;
                    } else {
                        echo '<div class="alert alert-danger" role="alert">
                        Notas podem ser atribuidas somente a alunos.
                      </div>';
                    }
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                        A matricula informada não existe.
                  </div>';
                }
            } else {
                echo '<div class="alert alert-warning" role="alert">
                Aluno não selecionado.
              </div>';
            }
            ?>
        </div>
    </section>
    <section id="lista-notas">
        <div class="container table">
            <div class="header-section">
                <h2>Alterar notas</h2>
            </div>
            <?php
                if(isset($_SESSION['boletimAdd'])) {
                    if ($_SESSION['boletimAdd'] == 'success') {
                        echo '<div class="alert alert-success" role="alert">Nota adicionada com êxito.</div>';
                        unset($_SESSION['boletimAdd']);
                    } else if ($_SESSION['boletimAdd'] == '403') {
                        echo '<div class="alert alert-warning" role="alert">Acesso negado, estranho, né? 🤔.</div>';
                        unset($_SESSION['boletimAdd']);
                    } else {
                        echo '<div class="alert alert-warning" role="alert">Uma falha aconteceu, tente novamente.</div>';
                        unset($_SESSION['boletimAdd']);
                    }
                }
                if(isset($_SESSION['boletimDrop'])) {
                    if ($_SESSION['boletimDrop'] == 'success') {
                        echo '<div class="alert alert-success" role="alert">Nota apagada com êxito.</div>';
                        unset($_SESSION['boletimDrop']);
                    } else if ($_SESSION['boletimDrop'] == '403') {
                        echo '<div class="alert alert-warning" role="alert">Acesso negado, estranho, né? 🤔.</div>';
                        unset($_SESSION['boletimDrop']);
                    } else {
                        echo '<div class="alert alert-warning" role="alert">Uma falha aconteceu, tente novamente.</div>';
                        unset($_SESSION['boletimDrop']);
                    }
                }
                
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Disciplina</th>
                        <th>Nota</th>
                        <th>Frequência</th>
                        <th><?= $divisaoEscola ?></th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($permissao) {
                        $sql = "select * from notas where matricula = '{$_POST['matricula']}';";
                        $result = mysqli_query($conexao, $sql);
                        // $notas = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);
                        if ($row == 0) {
                            echo "<tr>";
                            echo "<th>Nenhuma nota atribuida</th>";
                            echo "<th> :( </th>";
                            echo "<th> :( </th>";
                            echo "<th> :( </th>";
                            echo "<th> :( </th>";
                            echo "</tr>";
                        } else {
                            while ($registro = mysqli_fetch_array($result)) {
                                $id = $registro['id'];
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
                                echo "<th class='text-center'>";
                                echo '<form action="./pages/boletim/boletim.drop.php" method="POST"><input style="display:none;" value="'.$id.'" type="number" name="id"><button type="submit" class="alt-table"><i class="fas fa-trash scale-plus"></i></button></form>';
                                echo "</th>";
                                
                                echo "</tr>";
                            }
                        }
                        echo '<tr>
                            <form action="./pages/boletim/boletim.add.php" method="POST">
                                <input style="display: none;" required type="text" maxlength="50" value="'.$aluno['matricula'].'" name="matricula" readonly></label>
                                <th><input placeholder="Ex: Português" class="alt-table" required name="disciplina" type="text"></th>
                                <th><input placeholder="Max: 10.00" class="alt-table" style="min-width: 150px;" required min="0" max="10" step=".1" name="nota" type="number"></th>
                                <th><input placeholder="Max: 100.00" class="alt-table" style="min-width: 150px;" required min="0" max="100" step=".1" name="freq" type="number"></th>
                                <th><input placeholder="Ex: 1° '.$divisaoEscola.'" class="alt-table" required name="divisao" type="text"></th>
                                <th class="text-center"><button type="submit" class="alt-table"><i id="check-nota" class="fas fa-check scale-plus"></i></button></th>
                            </form>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</main>