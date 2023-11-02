
/*pegando o span de resposta para qualquer e nãon abusar da RAM, pois 
não é necessário pegar ele todas as vezes que o usuario clica
uma vez já chega
*/
var respostaTag=document.querySelector("span.resposta");

//função de login
const logar= async()=>{
    var inputNome=document.getElementById("nome").value;  
    var inputSenha=document.getElementById("senha").value;
    //verificando os campos
    if(inputNome!="" && inputSenha!="")
    {
        var formulario= document.getElementById("form-login");

        const objectoSend={
            method: 'POST',
            body: new FormData(formulario)
        }

        /*enviando os dados para api*/
        const request=await fetch("../api/login.php",objectoSend);
        /*pegando a resposta*/
        let resposta=await request.json();
        //verificando o tamanho do array
        if(resposta.length>1)
        {
            if(resposta[2]==1)
            {
                document.getElementById("login-sucesso-admin").click();
            }
            else if(resposta[2]==2)
            {
                document.getElementById("login-sucesso-vendedor").click();
            }
        }
        else
        {
            resposta.map(item=>{
                MessageBox.Show(item);
                console.log(item);
            })
        }

    }
    else
    {
        MessageBox.Show("Preencha todos os campos, por favor");
        
    }
}