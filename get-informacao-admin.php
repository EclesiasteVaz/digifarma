<?php
    //pegando os arquivos
    require_once "./config/ha-sessao.php";
    require_once "./config/conexao.php";
    
    //funcao de pegar e retornar os dados importantes

    //pegador de número de venda
    if(isset($_GET["venda"]))
    {
        $instrucao="SELECT id From venda";
        if($resultado=mysqli_query($conexao, $instrucao))
        {
            if($dados=mysqli_fetch_all($resultado))
            {
                echo json_encode("".count($dados));
            }
            else
            {
                echo json_encode("0");
            }
        }
        else
        {
            echo json_encode("Não possível, pegar o número de vendas");
        }
    }
    
    //pegando o número de devolução 
    if(isset($_GET["devolucao"]))
    {
        $instrucao="SELECT id From devolucao";
        if($resultado=mysqli_query($conexao, $instrucao))
        {
            if($dados=mysqli_fetch_all($resultado))
            {
                echo json_encode("".count($dados));
            }
            else
            {
                echo json_encode("0");
            }
        }
        else
        {
            echo json_encode("Não possível, pegar o número de devoluções");
        }
    }

    //pegando numero de meedicamentos
    if(isset($_GET["medicamento"]))
    {
        $instrucao="SELECT id FROM medicamento WHERE disponivel=true";
        if($resultado=mysqli_query($conexao, $instrucao))
        {
            if($dados=mysqli_fetch_all($resultado))
            {
                echo json_encode("".count($dados));
            }
            else
            {
                echo json_encode("0");
            }
        }
        else
        {
            echo json_encode("Não possível, pegar o número de medimentos");
        }
    }

    //pegando o numero de funcionarios
    if(isset($_GET["funcionario"]))
    {
        $instrucao="SELECT id From usuario";
        if($resultado=mysqli_query($conexao, $instrucao))
        {
            if($dados=mysqli_fetch_all($resultado))
            {
                echo json_encode("".count($dados));
            }
            else
            {
                echo json_encode("0");
            }
        }
        else
        {
            echo json_encode("Não possível, pegar o número de funcionários");
        }
    }

    //pegando o orçamento 
    if(isset($_GET["orcamento"]))
    {
        $instrucao="SELECT orcamento From financa";
        if($resultado=mysqli_query($conexao, $instrucao))
        {
            if($dados=mysqli_fetch_all($resultado))
            {
                echo json_encode($dados);
            }
            else
            {
                echo json_encode("0");
            }
        }
        else
        {
            echo json_encode("Não possível, pegar o orçamento.");
        }
    }

    //pegando os produtos expirados
    if(isset($_GET["sms_system"]))
    {
        $dataHoje=date("y-m-d");
        $instrucaoSql="SELECT nome, data_validade FROM medicamento WHERE data_validade <='".$dataHoje."' and disponivel=true";
        if($resultado= mysqli_query($conexao, $instrucaoSql))
        {
            if($dados= mysqli_fetch_all($resultado))
            {
                echo json_encode($dados);
            }
            else
            {
                echo json_encode('Não há nenhum produto expirado.');
            }
        }
        else
        {
            echo json_encode(mysqli_error($conexao));
        }
    }
?>