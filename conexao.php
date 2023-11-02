<?php
    //criando o arquivo de conexão para ser usado em qualquer outro ficheiro
    $conexao=mysqli_connect("localhost","root","");
    mysqli_select_db($conexao, "digifarma_db");
?>