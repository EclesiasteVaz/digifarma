<?php
    //pegando os arquivos
    require_once "./config/sessao-admin.php";
    require_once "./config/conexao.php";
    
    //Pegando o orçamento actual
    if(isset($_GET["fin"]))
    {
        $instrucaoSql='SELECT orcamento FROM financa LIMIT 1';

        if($resultado= mysqli_query($conexao, $instrucaoSql))
        {
            if($dados=mysqli_fetch_all($resultado))
            {
                echo json_encode($dados);
            }
            else{
                echo json_encode(0);
            }
        }
        else
        {
            echo json_encode('Erro na requisição, sintaxe');
        }
    }

    //pegando as saidas efectuadas
    if(isset($_GET['saidas']))
    {
        $instrucaoSql='SELECT motivo, valor, data_saida FROM saidas ORDER BY id DESC';
        if($resultado=mysqli_query($conexao, $instrucaoSql))
        {
            if($dados= mysqli_fetch_all($resultado))
            {
                mysqli_free_result($resultado);
                echo json_encode($dados);
            }
            else
            {
                echo json_encode('Não existe registro de alguma saida');
            }
        }
        else
        {
            echo json_encode('Erro na requisição, sintaxe');
        }
    }

    //EFECTUAR SAIDA
    if(isset($_GET["senha"]))
    {
        $instrucaoSql="SELECT nome FROM usuario WHERE senha='".$_GET["senha"]."' and id=".$informacoes[0];
    
        if($resultado=mysqli_query($conexao,$instrucaoSql))
        {
            if($dados=mysqli_fetch_all($resultado))
            {
                mysqli_free_result($resultado);
                $dataHoje= date('y-m-d');
                $instrucaoSql="INSERT INTO saidas(motivo, data_saida, valor) VALUES('".$_GET["motivo"]."', '".$dataHoje."', ".$_GET["valor"].")";
                if(mysqli_query($conexao, $instrucaoSql))
                {   
                    $novoOrcamento=$_GET["orcamento"]-$_GET["valor"];
                    $instrucaoSql="UPDATE financa SET orcamento=".$novoOrcamento;
                    if(mysqli_query($conexao, $instrucaoSql))
                    {
                        echo json_encode("Saida efectuada a 100% de sucesso");
                    }
                    else
                    {
                        echo json_encode("Erro na atualização do orçamento");
                    }
                }
                else{
                    echo json_encode(mysqli_error($conexao));
                }
            }
            else
            {
                echo json_encode("Palavra passe errada");
            }
        }
        else{
            echo json_encode('Erro na requisição linha 54');
        }
    }
?>