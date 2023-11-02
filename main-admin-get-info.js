async function getNumeroVenda(){
    const request=await fetch("../../api/get-informacao-admin.php?venda=2");
    if(request.ok)
    {
        let response=await request.json();
        if(response=="Não possível, pegar o número de vendas")
        {
            MessageBox.Show(response);
        }
        else
        {
            console.log(response);
            document.getElementById("numero-venda").innerText=response;
        }

    }
    else
    {
        console.log("Erro, no request, line 9");
    }
}

async function getNumeroDevolucao()
{
    const request=await fetch("../../api/get-informacao-admin.php?devolucao=2");
    if(request.ok)
    {
        let response=await request.json();
        if(response=="Não possível, pegar o número de devolucões")
        {
            MessageBox.Show(response);
        }
        else
        {
            console.log(response);
            document.getElementById("numero-devolucao").innerText=response;
        }

    }
    else
    {
        console.log("Erro, no request, line 9");
    }
}

async function getNumeroMedicamento()
{
    const request=await fetch("../../api/get-informacao-admin.php?medicamento=2");
    if(request.ok)
    {
        let response=await request.json();
        if(response=="Não possível, pegar o número de devolucões")
        {
            MessageBox.Show(response);
        }
        else
        {
            console.log(response);
            document.getElementById("numero-medicamentos").innerText=response;
        }

    }
    else
    {
        console.log("Erro, no request, line 9");
    }  
}

async function getNumeroFuncionario()
{
    const request=await fetch("../../api/get-informacao-admin.php?funcionario=2");
    if(request.ok)
    {
        let response=await request.json();
        if(response=="Não possível, pegar o número de funcionários")
        {
            MessageBox.Show(response);
        }
        else
        {
            console.log(response);
            document.getElementById("numero-funcionario").innerText=response;
        }

    }
    else
    {
        console.log("Erro, no request, line 88");
    }  
} 

async function getOrcamento()
{
    const request=await fetch("../../api/get-informacao-admin.php?orcamento=2");
    if(request.ok)
    {
        let response=await request.json();
        if(response=="Não possível, pegar o orçamento.")
        {
            MessageBox.Show(response);
        }
        else
        {
            console.log(response);
            document.getElementById("orcamento").innerText=response+"kz";
        }

    }
    else
    {
        console.log("Erro, no request, line 88");
    }  
} 

const getSMS= async ()=>{
    let request= await fetch("../../api/get-informacao-admin.php?sms_system=sim");
    let response = await request.json();
    if(response.length>0)
    {
        document.querySelector(".body-sms-notificacao").innerHTML='<div class="comeco"></div>';
        response.map(item=>{
            document.querySelector(".body-sms-notificacao").innerHTML+=`
            <div class="card-sms">
                <span>${item[0]}</span>
                Expirou em ${item[1]}
            </div>
            `;
        })
    }
    else
    {
        MessageBox.Show(response);
    }

}

getNumeroVenda();
getNumeroDevolucao();
getNumeroMedicamento();
getNumeroFuncionario();
getOrcamento();
getSMS();