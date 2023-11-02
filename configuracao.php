<?php
    //pegando os arquivos
    require_once "./config/ha-sessao.php";
    require_once "./config/conexao.php";

    //alterando a senha
    if(isset($_GET["senha_antiga"]))
    {
        $instrucaoSql="SELECT nome FROM usuario WHERE senha='".$_GET["senha_antiga"]."' and id=".$informacoes[0];

        if($resultado= mysqli_query($conexao, $instrucaoSql))
        {
            if($dados= mysqli_fetch_all($resultado))
            {
                $instrucaoSql="UPDATE usuario SET senha='".$_GET["senha_nova"]."' WHERE id=".$informacoes[0];
                
                if(mysqli_query($conexao, $instrucaoSql))
                {
                    echo json_encode("A sua senha foi alterada com sucesso. Obrigado");
                }
                else
                {
                    echo json_encode(mysqli_error($conexao));
                }
            }
            else
            {
                echo json_encode("Erro, a senha antiga está incorreta");
            }
        }
        else
        {
            echo json_encode(mysqli_error($conexao));
        }
    }

    //alterando o nome
    if(isset($_GET["nome"]))
    {
        $instrucaoSql="SELECT nome FROM usuario WHERE senha='".$_GET["senha"]."' and id=".$informacoes[0];

        if($resultado = mysqli_query($conexao, $instrucaoSql))
        {
            if($dados= mysqli_fetch_all($resultado))
            {
                $instrucaoSql="UPDATE usuario SET nome='".$_GET["nome"]."' WHERE id=".$informacoes[0];
                if(mysqli_query($conexao, $instrucaoSql))
                {
                    echo json_encode("O seu novo nome no sistema foi alterado com sucesso");
                }
                else
                {
                    echo json_encode(mysqli_error($conexao));
                }
            }
            else
            {
                echo json_encode("Erro, a sua senha está incorreta");
            }
        }
        else
        {
            echo json_encode(mysqli_error($conexao));
        }
    }
?>