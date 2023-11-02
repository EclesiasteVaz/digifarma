const alterarSenha = async ()=>{
    let senhaAntiga= document.getElementById("antigaSenha").value;
    let senhaNova = document.getElementById("novaSenha").value;
    let senhaConfirmacao= document.getElementById("confirmacao").value;

    if(senhaAntiga!="" && senhaNova!="" && senhaConfirmacao!="")
    {
        if(senhaNova==senhaConfirmacao)
        {
            let request = await fetch(`../../api/configuracao.php?senha_antiga=${senhaAntiga}&senha_nova=${senhaNova}`);
            let response = await request.json();
            MessageBox.Show(response);
            if(response == "A sua senha foi alterada com sucesso. Obrigado")
            {
                reset(0);
            }
        }
        else
        {
            MessageBox.Show("Erro, a senha nova e a confirmação são totalmente diferentes");
        }
    }
    else
    {
        MessageBox.Show("Por favor, preencha todos os campos");
    }
}


const alterarNome = async () =>{

    let nome= document.getElementById("nome").value;
    let senha = document.getElementById("senha").value;

    if(nome!="" && senha!="")
    {
        let request = await fetch(`../../api/configuracao.php?nome=${nome}&senha=${senha}`);
        let response = await request.json();
        MessageBox.Show(response);
    }
    else{
        MessageBox.Show("Por favor, preencha todos os campos");
    }
}

const reset = (formNumber)=>{

    if(formNumber==0)
    {
        document.getElementById("antigaSenha").value="";
        document.getElementById("novaSenha").value="";
        document.getElementById("confirmacao").value="";
    }
    else if(formNumber==1)
    {

    }
    else
    {
        MessageBox.Show("Desculpe o formulário não existe");
    }
}