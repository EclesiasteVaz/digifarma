<?php
    require_once "../../api/config/sessao-admin.php";
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
    <link rel="stylesheet" href="../../style/body.css">
    <link rel="stylesheet" href="../../style/fonts.css">
    <link rel="stylesheet" href="../../style/div-up.css">
    <link rel="stylesheet" href="../../style/icons.css">
    <link rel="stylesheet" href="../../style/resposta-js.css">
    <link rel="stylesheet" href="../../style/side-bar-admin.css">
    <link rel="stylesheet" href="../../style/home-admin.css">
    <link rel="stylesheet" href="../../style/div-center-right.css">
    <link rel="stylesheet" href="../../style/messagebox.css">
    <link rel="stylesheet" href="../../style/funcionarios.css">
</head>
<body>
<div class="up">
        <nav class="side-bar-admin">
            <h1 class="icon-site"></h1>
            <ul>
                <?php
                if(isset($_SESSION["usuario"]))
                {
                    //exibindo o seu nome
                    $nome=explode("/",$_SESSION["usuario"]);
                        echo '<li>
                        <a  href=""><img src="../../images/icons/user.svg" alt="."><span>'.$nome[2].'</span></a>
                    </li>';
                }
                ?>
                <li>
                    <a href="index.php"><img src="../../images/icons/house-chimney-medical.svg" alt="."><span>Home</span></a>
                </li>
                <li>
                    <a href="ver-medicamentos.php"><img src="../../images/icons/suitcase-medical.svg" alt="."><span>Ver medicamentos</span></a>
                </li>
                <li>
                    <a  href="vender.php"><img src="../../images/icons/cart-flatbed-suitcase.svg" alt="."><span>Vender</span></a>
                </li>
                <li>
                    <a class="in" href="funcionarios.php"><img src="../../images/icons/users-line.svg" alt="."><span>Funcionarios</span></a>
                </li>
                <li>
                    <a href="financas.php"><img src="../../images/icons/money-check-dollar.svg" alt="."><span>Finanças</span></a>
                </li>
                <li>
                    <a href="configuracoes.php"><img src="../../images/icons/gear.svg" alt="."><span>Configurações</span></a>
                </li>
            </ul>
        </nav>
        <div class="center-right">
            <h2>Lista dos seus funcionários & adicionar novos</h2>
            <section class="flex-lista-add">
                <div class="lista-funcionario">
                    <h3>A sua lista de funcionários</h3>
                    <main id="list">
                        
                    </main>

                </div>
                <div class="add-new-funcionario">
                    <h3>Adicionar um novo funcionário</h3>
                    <main class="novo-funcionario">
                        <form id="formNovoFuncionario" enctype="multipart/form-data" action="../../api/funcionario.php" method="post">
                            <label for="nome_funcionario">O nome do funcionário</label>
                            <input type="text" name="nome_funcionario" id="nome">
                            <label for="senha">A senha para conta do mesmo</label>
                            <input type="password" name="senha" id="senha">
                            <label for="senha">O salário do funcionário</label>
                            <input type="number" name="salario" id="salario">
                            <div>
                                <button type="submit" class="submit" name="btn_enviar">Guardar</button>
                                <button type="reset">Cancelar</button>
                            </div>
                        </form>
                    </main>
                </div>
            </section>
        </div>
    </div>
    <script src="../../js/components/messagebox.js" ></script>
    <script src="../../js/mediador-api/main-funcionario.js" defer ></script>
    <script src="../../js/components/card-funcionario.js" defer ></script>
    <?php
        if(isset($_GET["sms"]))
        {
            if($_GET["sms"]=="yes")
            {
                echo '<script >MessageBox.Show("O novo funcionário foi adicionado com sucesso.")</script>';
            }
            else if($_GET["sms"]=="not") 
            {
                echo '<script >MessageBox.Show("Não possível fazer a requisição.");</script>';
            }
            else if($_GET["sms"]=="notnot")
            {
                echo '<script >MessageBox.Show("Por favor preencha todos os campos")</script>';
            }
            $_GET["sms"] = "";
        }
    ?>
</body>
</html>