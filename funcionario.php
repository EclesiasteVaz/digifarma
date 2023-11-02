<?php
    //pegando os arquivos
    require_once "./config/sessao-admin.php";
    require_once "./config/conexao.php";
    
    //pegando os funcionários cadastradps exceptos ele mesmo
    if(isset($_GET["get_funcionarios"]))
    { 
        $instrucaoSql = 'SELECT  nome, bloqueio,id, salario FROM  usuario WHERE id!='.$informacoes[0];
        if($resultado = mysqli_query($conexao,$instrucaoSql))
        {
            if($dados = mysqli_fetch_all($resultado))
            {
                mysqli_free_result($resultado);
                echo json_encode($dados);
            }
            else
            {
                echo json_encode("Não existe nenhum funcionário além de você");
            }
        }
        else
        {
            echo json_encode("Erro. Não possível fazer a requisição");
        }
    }

    //bloqueiando individuo
    if(isset($_GET['bloquear']))
    {
        $instrucaoSql = 'UPDATE usuario SET bloqueio=true WHERE id='.$_GET["bloquear"];
        if(mysqli_query($conexao, $instrucaoSql))
        {
            echo json_encode("Ok. feito");
        }
        else
        {
            echo json_encode(" Não foi bloquear o funcionário");
        }
    }

    //desbloqueiar o individuo
    if(isset($_GET['desbloquear']))
    {
        $instrucaoSql = 'UPDATE usuario SET bloqueio=false WHERE id='.$_GET["desbloquear"];
        if(mysqli_query($conexao, $instrucaoSql))
        {
            echo json_encode("Ok. feito");
        }
        else
        {
            echo json_encode(" Não foi desbloquear o funcionário");
        }
    }

    //gravamdo novo funcionario
    if(isset($_POST["btn_enviar"]))
    {
        if($_POST["nome_funcionario"]!="" && $_POST["senha"]!="" && $_POST["salario"]!="")
        {
            $instrucaoSql = "INSERT INTO usuario(
            nome,
            senha,
            cargo,
            salario,
            bloqueio) 
            VALUES('".$_POST['nome_funcionario']."',
            '".$_POST["senha"]."',
            2,
            ".$_POST["salario"].",
            false
            )";
            if(mysqli_query($conexao, $instrucaoSql))
            {
                header("location: ../login/admin/funcionarios.php?sms=yes");
            }
            else
            {
                header("location: ../login/admin/funcionarios.php?sms=not");
            }

        }
        else
        {
            
            header("location: ../login/admin/funcionarios.php?sms=notnot");
        }
    }

?>