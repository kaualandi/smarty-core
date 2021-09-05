<header id="header">
    <div class="container">
        <h1>Gerenciar Usuários</h1>
        <p>Olá, <?= olaname() ?></p>
    </div>
</header>
<main id="usuarios-php">
    <section id="users-list">
        <div class="container table">
            <?php
            if ($_SESSION['matricula'] === '001') {
                echo '<div class="alert alert-danger" role="alert">TOME MUITO CUIDADO AO EXCLUIR UM USUÁRIO, ESSA AÇÃO NÃO É REVERCÍVEL E NÃO PEDIMOS CONFIRMAÇÃO!</div>';
            }
            if (isset($_SESSION['user-drop'])) {
                if ($_SESSION['user-drop'] == 'success') {
                    echo '<div class="alert alert-success" role="alert">Usuário apagado com sucesso.</div>';
                    unset($_SESSION['user-drop']);
                } else if ($_SESSION['user-drop'] == '403') {
                    echo '<div class="alert alert-warning" role="alert">Acesso negado! Estranho, não acha? 🤔</div>';
                    unset($_SESSION['user-drop']);
                } else {
                    echo '<div class="alert alert-warning" role="alert">Ocorreu um erro ao apagar o usuário🙁. Ele realmente existe?🤷‍♂️</div>';
                    unset($_SESSION['user-drop']);
                }
            }
            ?>
            <table id="list-user-table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Matricula</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nascimento</th>
                        <th>Telefone</th>
                        <th>CPF</th>
                        <th>Nível</th>
                        <th>Turma</th>
                        <?php
                        if ($_SESSION['nivel'] > '3') {
                            echo '<th>Senha</th>';
                        }
                        if ($_SESSION['matricula'] === '001') {
                            echo '<th>Apagar</th>';
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from users;";
                    $result = mysqli_query($conexao, $sql);
                    $row = mysqli_num_rows($result);
                    while ($users = mysqli_fetch_array($result)) {
                        $matricula = $users['matricula'];
                        $email = $users['email'];
                        $senha = $users['senha'];
                        $nome = $users['nome'];
                        $nascimento = $users['nascimento'];
                        $nascimento = new DateTime($nascimento);
                        $telefone = $users['telefone'];
                        $cpf = $users['CPF'];
                        $nivel = $users['nivel'];
                        $turma = $users['turma'];
                        switch ($nivel) {
                            case '1':
                                $nivel = 'Aluno';
                                break;
                            case '2':
                                $nivel = 'Professor';
                                break;
                            case '3':
                                $nivel = 'Moderador';
                                break;
                            case '4':
                                $nivel = 'Administrador';
                                break;
                            default:
                                break;
                        }
                        echo "<tr>";
                        echo '<th>' . $matricula . '</th>';
                        echo '<th>' . $nome . '</th>';
                        if ($matricula === '001') {
                            echo '<th>******</th>';
                        } else {
                            echo '<th>' . $email . '</th>';
                        }
                        echo '<th>' . $nascimento->format('d/m/Y') . '</th>';
                        echo '<th>' . $telefone . '</th>';
                        echo '<th>' . $cpf . '</th>';

                        echo '<th>' . $nivel . '</th>';
                        echo '<th>' . $turma . '</th>';

                        if ($_SESSION['nivel'] > '3') {
                            if ($matricula === '001') {
                                echo '<th>******</th>';
                            } else {
                                echo '<th>' . $senha . '</th>';
                            }
                        }
                        if ($_SESSION['matricula'] === '001') {
                            if ($matricula !== '001') {
                                echo '<td><form action="./pages/user.drop.php" method="POST"><input style="display:none;" value="' . $matricula . '" type="number" name="matricula"><button type="submit" class="alt-table"><i class="fas fa-trash scale-plus"></i></button></form></td>';
                            } else {
                                echo '<td></td>';
                            }
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Matricula</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nascimento</th>
                        <th>Telefone</th>
                        <th>CPF</th>
                        <th>Nível</th>
                        <th>Turma</th>
                        <?php
                        if ($_SESSION['nivel'] > '3') {
                            echo '<th>Senha</th>';
                        }
                        if ($_SESSION['matricula'] === '001') {
                            echo '<th>Apagar</th>';
                        }
                        ?>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

    <?php
    if ($_SESSION['nivel'] == '4') {
    ?>
        <section id="alter-user">
            <div class="container">
                <div class="header-section">
                    <h2>Editar usuário</h2>
                </div>
                <div class="">
                    <h3>Escolher</h3>
                    <form action="/usuarios#alter-user" method="post">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-12">
                                <label><input placeholder="Matricula" required type="text" maxlength="50" name="matricula"></label>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <label><button type="submit">Pronto</button></label>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                if (isset($_SESSION['user-alter'])) {
                    if ($_SESSION['user-alter'] == 'success') {
                        echo '<div class="alert alert-success" role="alert">Ususário alterado com sucesso!</div>';
                        unset($_SESSION['user-alter']);
                    } else {
                        echo '<div class="alert alert-warning" role="alert">Ocorreu um erro ao modificar o usuário🙁.</div>';
                        unset($_SESSION['user-alter']);
                    }
                }

                if ($_POST['matricula']) {
                    $matricula = $_POST['matricula'];
                    $sql = "select * from users where matricula = '$matricula';";
                    $result = mysqli_query($conexao, $sql);
                    $row = mysqli_num_rows($result);
                    if ($row == '1') {
                        if ($matricula != '001') {
                            $user_edit = mysqli_fetch_array($result);
                            $matricula = $user_edit['matricula'];
                            $fullname = $user_edit['nome'];
                            $nasc = $user_edit['nascimento'];
                            // $nasc = new DateTime($nasc);
                            // $nasc->format('d-m-Y');
                            $email = $user_edit['email'];
                            $telefone = $user_edit['telefone'];
                            $cpf = $user_edit['CPF'];
                            $senha = $user_edit['senha'];
                            $nivel = $user_edit['nivel'];
                            $turma = $user_edit['turma'];
                ?>
                            <h3>Editar</h3>
                            <form method="POST" autocomplete="off" action="./pages/user.alter.php">
                                <div class="row">
                                    <input style="display: none;" required type="text" maxlength="50" value="<?=$matricula?>" name="old-matricula">
                                    <div class="col-md-4 col-sm-6 col-12">
                                    <label>Matrícula<input required type="text" maxlength="50" value="<?=$matricula?>" name="matricula"></label>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <label>Nome Completo<input required type="text" maxlength="50" value="<?=$fullname?>" name="fullname"></label>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <label>Nascimento<input required type="date" maxlength="50" value="<?=$nasc?>" name="nasc"></label>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <label>Email<input required type="email" maxlength="50" value="<?=$email?>" name="email"></label>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <label>Telefone<input required type="tel" maxlength="11" value="<?=$telefone?>" placeholder="21999998888" name="telefone"></label>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <label>CPF<input required type="tel" maxlength="11" value="<?=$cpf?>" placeholder="99999988888" name="cpf"></label>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <label>Senha<input required type="password" readonly value="<?=$senha?>" onfocus='this.type="text"' onblur='this.type="password"' placeholder="********" maxlength="64" name="pass"></label>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <label>Nível
                                            <select name="vocacion">
                                                <option <?=$nivel == '1' ? 'selected' : '' ;?> value="1">Aluno</option>
                                                <option <?=$nivel == '2' ? 'selected' : '' ;?> value="2">Professor</option>
                                                <option <?=$nivel == '3' ? 'selected' : '' ;?> value="3">Moderador</option>
                                                <option <?=$nivel == '4' ? 'selected' : '' ;?> value="4">Administrador</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <label>Turma<input type="text" placeholder="Somente alunos" maxlength="15" id="turma" value="<?=$turma?>" name="turma"></label>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <button style="margin-top: 1.5em;" type="submit">Pronto</button>
                                    </div>
                                </div>
                            </form>
                    <?php
                        } else {
                            echo '<div class="alert alert-danger" role="alert">É impossível alterar os dados do usuário mestre</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger" role="alert">A matrícula informa não corresponde a ninguém!</div>';
                    }
                    ?>
                <?php
                }
                ?>
            </div>
        </section>
    <?php
    }
    ?>

    <script>
        $(document).ready(function() {
            $('#list-user-table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
</main>