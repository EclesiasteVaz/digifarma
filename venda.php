<?php
    //pegando os arquivos
    require_once "./config/ha-sessao.php";
    require_once "./config/conexao.php";
    
    //pegando os medicamentos
    if(isset($_GET["getMedicamentos"]))
    {
        if($_GET["getMedicamentos"]==1)
        {
            $instrucaoSql="SELECT id,nome, quantidade, preco FROM medicamento WHERE disponivel=TRUE ORDER BY nome ASC ";
            if($resultado=mysqli_query($conexao, $instrucaoSql))
            {
                if($dados=mysqli_fetch_all($resultado))
                {
                    mysqli_free_result($resultado);
                    echo json_encode($dados);
                }
                else {
                    echo json_encode("Não há medicamentos");
                }
            }
            else
            {
                echo json_encode("Não foi possível fazer a requisação");
            }
        }
    }
    
    //efectuando venda
    if(isset($_GET["nome_cliente"]))
    {
 
        $dataVenda = date("y-m-d");
        $instrucaoSql="INSERT INTO venda(id_usuario,
        nome_cliente ,
        data_da_venda,
        valor_de_entrada,
        valor_de_saida,
        lucro)
        VALUES(
            ".$informacoes[0].",
            '".$_GET["nome_cliente"]."',
            '".$dataVenda."',
            ".$_GET["valor_entrada"].",
            ".$_GET["troco"].",
            ".$_GET["lucro"]."
            )
        ";
        if(mysqli_query($conexao, $instrucaoSql))
        {
            
            $instrucaoSql='UPDATE financa SET orcamento='.$_GET['orcamento'];
            mysqli_query($conexao, $instrucaoSql);
            echo json_encode("ok");
            
        }
        else{
            echo json_encode("not");
        }
    }



    //vendendon os comprimidos
    if(isset($_GET["vender_m"]))
    {
        //pegando a ultima venda 
        $instrucaoSql="SELECT id FROM venda ORDER BY id DESC LIMIT 1";   
        if($resultado=mysqli_query($conexao,$instrucaoSql))
        {
            if($dados=mysqli_fetch_all($resultado))
            {   
                mysqli_free_result($resultado);

                $instrucaoSql="INSERT INTO venda_produto(
                id_venda,
                id_medicamento,
                quantidade_medicamento)
                VALUES(
                    ".$dados[0][0].",
                    ".$_GET["idMedicamento"].",
                    ".$_GET["quantidade"]."
                )";
                mysqli_query($conexao,  $instrucaoSql);

                //agora reitrando a quantidade vendida do banco para ter o verdadeiro numero
                $instrucaoSql="UPDATE medicamento  SET quantidade=".$_GET["resultado_subtracao"]." WHERE id=".$_GET["idMedicamento"];
                if(mysqli_query($conexao, $instrucaoSql))
                {
                    echo json_encode("Venda Efectuada com sucesso");

                }
            }
            else
            {
                 echo json_encode("Não foi  encontrada nenhuma venda");
            }
        }   
        else{
            echo json_encode("Não foi possível verficar na base de dados venda.php 63");
        }  
    }

    //exibindo as vendas
    if(isset($_GET["vendas"]))
    {
        if($_GET["ultimoPost"]==0)
        {
            $instrucaoSql="select venda.id, 
            venda.nome_cliente,
            venda.valor_de_entrada,
            venda.valor_de_saida, 
            venda.lucro from venda  ORDER BY venda.id DESC LIMIT 6";
        }
        else{
        $instrucaoSql="select venda.id, 
        venda.nome_cliente,
        venda.valor_de_entrada,
        venda.valor_de_saida, 
        venda.lucro from venda  where venda.id<".$_GET["ultimoPost"]." ORDER BY venda.id DESC LIMIT 6";
        }
        if($resultado=mysqli_query($conexao,$instrucaoSql))
        {
            if($dados=mysqli_fetch_all($resultado))
            {
                mysqli_free_result($resultado);
                echo json_encode($dados);
            }
            else{
               if($_GET["ultimoPost"]>0)
               {
                    echo json_encode("Não existe mais alguma venda");
               }
               else{
                echo json_encode("Não existe o regristo de alguma venda. Obrigado");
               }
            }
        }
    }   



    //pegando os comprimidos de uma venda já efectuada
    if(isset($_GET["venda"]))
    {
        $instrucaoSql="SELECT  medicamento.nome, venda_produto.quantidade_medicamento  from venda_produto join medicamento on medicamento.id=venda_produto.id_medicamento where venda_produto.id_venda=".$_GET["venda"];
        if($resultado=mysqli_query($conexao, $instrucaoSql))
        {
            if($dados=mysqli_fetch_all($resultado))
            {
                mysqli_free_result($resultado);
                echo json_encode($dados);
            }
            else
            {
                echo json_encode("Não ha medicamentos");
            }
        }
        else
        {
            echo json_encode("Erro");
        }

    }

    if(isset($_GET["ver_vendedor_da_venda"]))
    {
        $instrucaoSql="SELECT usuario.nome FROM usuario join venda on usuario.id=venda.id_usuario WHERE venda.id=".$_GET["ver_vendedor_da_venda"];
        if($resultado=mysqli_query($conexao, $instrucaoSql))
        {
            if($dados=mysqli_fetch_all($resultado))
            {   
                echo json_encode($dados);
            }
            else
            {
                echo json_encode("A venda selecionada não existe");
            }
        }
        else
        {
            echo json_encode(mysqli_error($conexao));
        }
    }

    /*$va= new DateTime("2023-07-04");
    $ve= new DateTime(date('y-m-d'));
   if( $va>$ve)
   {
    echo "mairo";
   }
   else{
    echo "menor";
   }
   $intervalo= date_diff($va,$ve);
   echo"  a diferença entre<br>2023-07-4 e 2023-09-04 <br>
   dias: ".$intervalo->d."<br>
   meses: ".$intervalo->m ."<br>
   anos: ".$intervalo->y;*/
?>