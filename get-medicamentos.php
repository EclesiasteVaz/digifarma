<?php
    //pegando os arquivos
    require_once "./config/ha-sessao.php";
    require_once "./config/conexao.php";
    
    //pegando os medicamentos
    if(isset($_GET["parouEm"]))
    {
        $instrucaoSql="SELECT * FROM medicamento WHERE disponivel=true ORDER BY nome ASC";
        if($resultado=mysqli_query($conexao, $instrucaoSql))
        {
            if($dados=mysqli_fetch_all($resultado))
            {
                mysqli_free_result($resultado);
                echo json_encode($dados);
            }
            else{
                echo json_encode("Não há medicamentos");
            }
        }
        else{
            echo json_encode("Não há medicamentos");
        }
    }

    //eliminando medicamento
    if(isset($_GET["delete"]))
    {
        if($informacoes[1]==1)
        {
            $instrucaoSql="UPDATE medicamento set disponivel=FALSE WHERE id=".$_GET["delete"];
            if($resultado=mysqli_query($conexao, $instrucaoSql))
            {
                echo json_encode("Eliminado com sucesso");
            }
            else{
                echo json_encode("Não foi possóível eliminar");
            }
        }
        else
        {
            echo json_encode('Não tens permissão necessária para eliminar algum produto');
        }
    }

    //gravando dados
    if(isset($_POST["nome"]))
    {
        $foto="";
        if(is_uploaded_file($_FILES["ficheiro"]["tmp_name"]))
        {
            $foto=$_FILES["ficheiro"]["name"];
        }
        $instrucaoSql="INSERT INTO medicamento(nome, quantidade , data_validade, preco, disponivel, endereco_foto) 
        VALUES('".$_POST["nome"]."', ".$_POST["quantidade"].", '".$_POST["validade"]."', ".$_POST["preco"].", true, '".$foto."')";
        
        if($resultado=mysqli_query($conexao, $instrucaoSql))
        {
            if(!file_exists("../images/".$_FILES["ficheiro"]["name"]))
            {
                if(move_uploaded_file($_FILES["ficheiro"]["tmp_name"],"../images/".$_FILES["ficheiro"]["name"]))
                {
                    echo json_encode("Novo medicamento adicionado com sucesso, a foto também.");
                }   
                else
                {
                    echo json_encode("Não foi possível fazer o upload da foto");
                }
            }
            else
            {
                echo json_encode("Novo medicamento adicionado com sucesso.");
            }
        }
        else
        {
            echo json_encode(mysqli_error($conexao));
        }
    }

    //editando o medicamento
    if(isset($_POST["nomeEditar"]))
    {
        if($informacoes[1]==1)
        {
            $foto="";
            if(is_uploaded_file($_FILES["ficheiroEditar"]["tmp_name"]))
            {
                $foto=$_FILES["ficheiroEditar"]["name"];        
                if(!file_exists("../images/".$foto))
                {
                    if(move_uploaded_file($_FILES["ficheiroEditar"]["tmp_name"], "../images/".$foto))
                    {

                    }
                    else
                    {
                        echo json_encode("Não possível carregar imagem");
                    }

                }
            }
            $instrucaoSql="";
            if($foto!="")
            {
                $instrucaoSql="UPDATE medicamento SET nome='".$_POST["nomeEditar"]."', preco=".$_POST["precoEditar"].", quantidade=".$_POST["quantidadeEditar"].", data_validade='".$_POST["validadeEditar"]."', endereco_foto='".$foto."' WHERE id=".$_POST["id"];
            }
            else
            {   
                $instrucaoSql="UPDATE medicamento SET nome='".$_POST["nomeEditar"]."', preco=".$_POST["precoEditar"].", quantidade=".$_POST["quantidadeEditar"].", data_validade='".$_POST["validadeEditar"]."' WHERE id=".$_POST["id"];
            }

            if($resultado=mysqli_query($conexao, $instrucaoSql))
            {
                echo json_encode ("Informações alteradas com sucesso");
            }
            else
            {
                echo json_encode("Não foi possível fazer a gravação dos novos dados");
            }
        }
        else
        {
            echo json_encode("Não tens permissão necessária para editar algum produto");
        }
    }
?>