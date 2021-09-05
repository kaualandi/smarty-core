<?php
    if ($_POST['namefull-escola']) {
        $namefull_escola = $_POST['namefull-escola'];
        $abbr_escola = $_POST['abbr-escola'];
        $namefull_escola = $_POST['namefull-escola'];
        $escola_divisao = $_POST['escola-divisao'];
        $diretor = $_POST['diretor'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $whatsapp = $_POST['whatsapp'];
        $facebook = $_POST['facebook'];
        $gpprofs = $_POST['gpprofs'];
        $maps = $_POST['maps'];
        $sql = 'update infors set name="'.$namefull_escola.'", abbr="'.$abbr_escola.'", divisao="'.$escola_divisao.'", diretor="'.$diretor.'", email="'.$email.'", telefone="'.$telefone.'", whatsapp="'.$whatsapp.'", facebook="'.$facebook.'", grupoprofs="'.$gpprofs.'", maps="'.$maps.'"  WHERE id=1';
        $result = mysqli_query($conexao, $sql);
    }
    $sql = 'select * from infors where id=1';$result = mysqli_query($conexao, $sql);$dadosescola = mysqli_fetch_array($result);
    $sql = 'select count(*) from users where nivel=1';$result = mysqli_query($conexao, $sql);$countalunos = mysqli_fetch_array($result);
    $sql = 'select count(*) from users where nivel=2';$result = mysqli_query($conexao, $sql);$countprofs = mysqli_fetch_array($result);
    $sql = 'select count(*) from users where nivel=3';$result = mysqli_query($conexao, $sql);$countmodera = mysqli_fetch_array($result);
    $sql = 'select count(*) from users where nivel=4';$result = mysqli_query($conexao, $sql);$countadmin = mysqli_fetch_array($result);

?>

<header id="header">
    <div class="container">
        <h1>Administração</h1>
        <p>Olá, <?= olaname() ?></p>
    </div>
</header>
<main>
    <section id="dados-rapidos">
        <div class="container">
            <div class="row">
<div class="col text-uppercase text-center"><p><div class="circle d-flex justify-content-center align-items-center"><?=$countalunos['count(*)']?></div>alunos</p></div>
<div class="col text-uppercase text-center"><p><div class="circle d-flex justify-content-center align-items-center"><?=$countprofs['count(*)']?></div>professores</p></div>
<div class="col text-uppercase text-center"><p><div class="circle d-flex justify-content-center align-items-center"><?=$countmodera['count(*)']?></div>moderadores</p></div>
<div class="col text-uppercase text-center"><p><div class="circle d-flex justify-content-center align-items-center"><?=$countadmin['count(*)']?></div>administradores</p></div>
            </div>
        </div>
    </section>
    <section id="escola-info">
        <div class="container">
            <div class="header-section">
                <h2>Informações da Escola</h2>
            </div>
            <form action="" autocomplete="off" method="POST">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Nome completo<input required type="text" maxlength="200" value="<?=$dadosescola['name']?>" name="namefull-escola" placeholder="Nome completo da escola"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Abreviação<input required type="text" name="abbr-escola" value="<?=$dadosescola['abbr']?>" placeholder="Abreviação do nome da escola"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Diretor(a)<input required type="text" name="diretor" value="<?=$dadosescola['diretor']?>" placeholder="Nome do diretor"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Grupo dos Professores<input required type="url" name="gpprofs" value="<?=$dadosescola['grupoprofs']?>" placeholder="link do grupo"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Divisão <select name="escola-divisao">
                            <option value="M" <?php if ($dadosescola['divisao'] == "M") {echo "selected";}?>>Mês</option>
                            <option value="B" <?php if ($dadosescola['divisao'] == "B") {echo "selected";}?>>Bimestre</option>
                            <option value="T" <?php if ($dadosescola['divisao'] == "T") {echo "selected";}?>>Trimestre</option>
                            <option value="S" <?php if ($dadosescola['divisao'] == "S") {echo "selected";}?>>Semestre</option>
                        </select></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Email<input required type="email" maxlength="50" value="<?=$dadosescola['email']?>" name="email"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Telefone<input required type="tel" maxlength="11" placeholder="21999998888" value="<?=$dadosescola['telefone']?>" name="telefone"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Whatsapp<input required type="tel" value="<?=$dadosescola['whatsapp']?>" maxlength="11" placeholder="21999998888" name="whatsapp"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Facebook<input required type="url" value="<?=$dadosescola['facebook']?>" placeholder="Link do facebook" name="facebook"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Local<input required type="url" value="<?=$dadosescola['maps']?>" placeholder="Link do GoogleMaps" name="maps"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 mg-auto">
                            <button class="a" type="submit">Pronto</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section id="add-pessoa">
        <div class="container">
            <div class="header-section">
                <h2>Adicionar usuários</h2>
                <p>Alunos, professores, moderadores ou administradores</p>
            </div>
            <?php
                if (isset($_SESSION['registrado'])) {
                    switch ($_SESSION['registrado']) {
                        case 'falha-matricula':
                            echo '<div class="alert alert-warning" role="alert">A matrícula fornecida já pertence a uma pessoa, verifique em <a href="/usuarios">usuários</a>.</div>';
                            unset($_SESSION['registrado']);
                            break;
                        case 'falha-email':
                            echo '<div class="alert alert-warning" role="alert">O email fornecido já pertence a uma pessoa, verifique em <a href="/usuarios">usuários</a>.</div>';
                            unset($_SESSION['registrado']);
                            break;
                        case 'falha-desconhecida':
                            echo '<div class="alert alert-warning" role="alert">Um erro desconhecido aconteceu, tente novamente.</div>';
                            unset($_SESSION['registrado']);
                            break;
                        case 'sucesso':
                            echo '<div class="alert alert-success" role="alert">O novo usuário foi registrado com êxito, ele já pode acessar com email e senha dele.</div>';
                            unset($_SESSION['registrado']);
                            break;
                        default:
                            break;
                    }
                }
            ?>
            <form method="POST" autocomplete="off" action="./pages/cadastro.php">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Matrícula<input required type="text" maxlength="50" name="matricula"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Nome Completo<input required type="text" maxlength="50" name="fullname"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Nascimento<input required type="date" maxlength="50" name="nasc"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Email<input required type="email" maxlength="50" name="add-email"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Telefone<input required type="tel" maxlength="11" placeholder="21999998888" name="telefone"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>CPF<input required type="tel" maxlength="11" placeholder="99999988888" name="cpf"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Senha<input required type="password" onfocus='this.type="text"' onblur='this.type="password"' placeholder="********" maxlength="64" name="add-pass"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Nível
                            <select id="vocacion" name="vocacion">
                                <option value="1">Aluno</option>
                                <option value="2">Professor</option>
                                <option value="3">Moderador</option>
                                <?php
                                    if ($_SESSION['nivel'] <= 3) {
                                        echo '<option disabled value="4">Administrador</option>';
                                    } else {
                                        echo '<option value="4">Administrador</option>';
                                    }
                                    ?>
                            </select>
                        </label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <label>Turma<input required type="text" onfocus="confereNivel();" placeholder="Somente alunos" maxlength="15" id="turma" name="turma"></label>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <button class="a" type="submit">Pronto</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section id="materias">
        <div class="container">
            <div class="header-section">
                <h2>Ferramentas</h2>
            </div>
            <div class="texto-sobre-imagem row">
                <div class="col-md-6 col-12">
                    <div class="box-options">
                        <img class="img-fluid" src="./assets/img/users.png" alt="">
                        <div class="content">
                            <a href="/usuarios" role="button" class="text-center mr-auto text-uppercase">
                                Gerenciar usuários
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
            </div>
        </div>
    </section>
    <!-- <section id="log-entries">
        <div class="container">
            <div class="header-section">
                <h2>Registro de entradas</h2>
            </div>
            <div class="table" style="overflow: auto;max-height: 40em;">
                <table style="min-width: 1000px;overflow: auto;">
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Matrícula</th>
                            <th>Log</th>
                            <th>Data/Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // $sql = "select * from log order by id desc;";
                            // $result = mysqli_query($conexao, $sql);
                            // // $notas = mysqli_fetch_array($result);
                            // $row = mysqli_num_rows($result);
                            // if ($row == 0) {
                            //     echo "<tr>";
                            //     echo "<th> :( </th>";
                            //     echo "<th> :( </th>";
                            //     echo "<th>Nenhum Log, isso é estranho, deve haver alguma falha</th>";
                            //     echo "<th> :( </th>";
                            //     echo "</tr>";
                            // } else {
                            //     while ($registro = mysqli_fetch_array($result)) {
                            //         $RegUserLog = $registro['user'];
                            //         $RegMatriculaLog = $registro['matricula'];
                            //         $RegLog = $registro['log'];
                            //         $RegDataLog = new DateTime($registro['datetime']);
                            //         $RegDataLog = date_format($RegDataLog, 'd-m-Y H:i:s');
                            //         echo "<tr>";
                            //         echo "<th>{$RegUserLog}</th>";
                            //         echo "<th>{$RegMatriculaLog}</th>";
                            //         echo "<th>{$RegLog}</th>";
                            //         echo "<th>{$RegDataLog}</th>";
                            //         echo "</tr>";
                            //     }
                            // }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section> -->
</main>
<script>
    function confereNivel() {
        if (document.getElementById('vocacion').value != '1') {
            $('#turma').attr('readonly','true');
        } else {
            $('#turma').removeAttr('readonly');
        }
    }
</script>