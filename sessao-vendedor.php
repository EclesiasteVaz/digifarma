<?php
    session_start();
    if(isset($_SESSION["usuario"]))
    {
        $informacoes=explode("/",$_SESSION["usuario"]);
        
        if($informacoes[1]==1)
        {
           echo http_response_code(404);            
        }
        else if($informacoes[1]==2)
        {

        }
        else{
            echo http_response_code(404);
        }
    }
    else{
        header("location: ../../index.php");
    }
?>