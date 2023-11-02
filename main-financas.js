var Orcamento=0;
const getOrcamentoActual = async ()=>{
    let request= await fetch("../../api/financas.php?fin=sim");
    const response= await request.json();

    if(response == "Erro na requisição, sintaxe")
    {
        MessageBox.Show(response);
    }
    else
    {
        Orcamento=response;
        document.querySelector(".orcamento").innerHTML=`${response}kz`;
    }
}

const getSaidas = async() =>{
    let request = await fetch("../../api/financas.php?saidas=sim");
    const response= await request.json();

    if(response=='Erro na requisição, sintaxe' || response=='Não existe registro de alguma saida')
    {
        MessageBox.Show(response);
    }
    else
    {
        document.querySelector(".list").innerHTML="";
      response.map(item=>{
        document.querySelector(".list").innerHTML+=`
        <div class="card-dispesas">
            <h4>${item[0]}</h4>
            <span>${item[1]}kz</span> 
            <span>A sua data: ${item[2]}</span> 
        </div>`;
      })  
    }
}


const  efectuarSaida = async()=>{
    let motivo= document.getElementById("motivo").value;
    let valor= document.getElementById("valor").value;
    let senha= document.getElementById("senha").value;
    
    if(motivo!="" && valor!="" && senha!="")
    {
        if(Orcamento>=valor)
        {
            let request = await fetch(`../../api/financas.php?motivo=${motivo}&valor=${valor}&senha=${senha}&orcamento=${Orcamento}`);
            const response= await request.json();

            MessageBox.Show(response);
    
        }
        else{
            MessageBox.Show("Insere uma saida equivalente ou inferior ao seu Orçamento")
        }
    }
    else{
        MessageBox.Show("Por favor, preencha todos os campos");
    }
}

getOrcamentoActual();
getSaidas();