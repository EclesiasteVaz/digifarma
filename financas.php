<?php
    require_once "../../api/config/sessao-admin.php";
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finanças</title>
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
    <link rel="stylesheet" href="../../style/financas.css">
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
                    <a  href="funcionarios.php"><img src="../../images/icons/users-line.svg" alt="."><span>Funcionarios</span></a>
                </li>
                <li>
                    <a class="in" href="financas.php"><img src="../../images/icons/money-check-dollar.svg" alt="."><span>Finanças</span></a>
                </li>
                <li>
                    <a href="configuracoes.php"><img src="../../images/icons/gear.svg" alt="."><span>Configurações</span></a>
                </li>
            </ul>
        </nav>
        <div class="center-right">
            <h2>A sua Finança & as dispesas</h2>
            <section class="flex-lista-add">
                <div class="left">
                    <div class="informacao">
                        <h3>O orçamento é:</h3>
                        <span class="orcamento">3.000.000kz</span>
                    </div>
                    <h3>A sua lista de dispesas</h3>
                    <main class="list">

                    </main>
                </div>
                <div class="right">
                	<form action="" method="post">
                        <h3>Efectuar uma retirada de dinheiro</h3>
                        <div>
                            <label for="motivo">Insere o motivo da saída dos valores</label>
                            <input type="text" name="" id="motivo">
                        </div>
                        <div>
                            <label for="valor">Insere o valor a ser retirado</label>
                            <input type="number" name="" id="valor" placeholder="exemplo: 30000, sem virgula ou ponto">
                        </div>
                        <div>
                            <label for="senha">Insere a sua palavra passe</label>
                            <input type="password" name="" id="senha">
                        </div>
                        <div class="btns">
                            <button type="reset">Cancelar</button>
                            <button type="button" class="submit" onclick="efectuarSaida()">Retirar</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <script src="../../js/components/messagebox.js" ></script>
    <script src="../../js/mediador-api/main-financas.js" defer> </script>

</body>
</html>