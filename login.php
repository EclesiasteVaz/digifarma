<?php
    if(isset($_POST["login"]))
    {
        session_start();
        require_once "./config/conexao.php";
        Login($_POST["nome"], $_POST["senha"], $conexao);
    }
    else
    {
        echo json_encode("Login não pode ser iniciado, falta chaves.");
    }

    function Login($nome, $senha, $conexao) {
        $instrucaoSql="SELECT id,cargo,nome, bloqueio FROM usuario WHERE nome='".$nome."' and senha='".$senha."'";
        if($resultado=mysqli_query($conexao, $instrucaoSql))
        {
            if($dados=mysqli_fetch_all($resultado))
            {
                if($dados[0][3]==false)
                {                
                    //gravei desta maneira de modo quando eu usar o explode
                    //terei um array repartido em dois, id e cargo
                    $_SESSION["usuario"]=$dados[0][0]."/".$dados[0][1]."/".$dados[0][2];
                    echo json_encode(["Usuario encontrado",$dados[0][0], $dados[0][1]]);
                }
                else
                {
                    echo json_encode(["A tua conta está bloqueiada"]);
                }
            }
            else
            {
                echo json_encode(["Dados incorrectos"]);
            }
        }
        else
        { 
            echo json_encode(["Não foi possível comunicar com o banco de dados"]);
        }
        
    }
?>