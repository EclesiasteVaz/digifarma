<?php
    session_start();
    $informacoes;
    if(isset($_SESSION["usuario"]))
    {
        $informacoes=explode("/",$_SESSION["usuario"]);
        
        if($informacoes[1]==1)
        {
            header("location: localhost:8080/digifarma/login/admin/index.php");
        }
        else if($informacoes[1]==2)
        {
            header("location: localhost:8080/digifarma/login/vendedor/index.php");
        }
    }

?>