<?php

    function Expirou($area)
    {
        $limiteUso= new DateTime("2023-10-01");
        $dataActual= new DateTime(date('y-m-d'));
        if($dataActual >= $limiteUso)
        {
            header("location: ".$area."api/config/prazou-expirou.php");
        }
        else{
            
        }
       /* $intervalo= date_diff($va,$ve);
        echo"  a diferença entre<br>2023-07-4 e 2023-09-04 <br>
        dias: ".$intervalo->d."<br>
        meses: ".$intervalo->m ."<br>
        anos: ".$intervalo->y;**/


    }


?>