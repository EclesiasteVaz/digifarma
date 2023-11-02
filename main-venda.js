const venda = {
    comprimidosNome: [],
    preco: [],
    ids:[],
    quantidadeCada: [],
    quantidadeRestante: []
}
var itemIndex = 0;
var lastPostView=0;
var NomeInput, EntradaInput;
const getMedicamentos = async () => {
    const request = await fetch("../../api/venda.php?getMedicamentos=1");
    let response = await request.json();
    if (response == "Não há medicamentos") {
        MessageBox.Show(response)
    }
    else {
        return response;
    }
}

const verificarQuantidade = (quantidadeActual, id_do_input_number, preco) => {
    if (document.getElementById("input" + id_do_input_number).value == 0 || document.getElementById("input" + id_do_input_number) == "" || document.getElementById("input" + id_do_input_number).value < 0) {
        MessageBox.Show("Por favor insira a quantidade de comprimidos");
    }
    else {
        if (quantidadeActual < document.getElementById("input" + id_do_input_number).value) {
            MessageBox.Show("Desculpe, mas não há comprimidos suficientes para esta venda");
        }
        else {
            venda.comprimidosNome[itemIndex] = document.getElementById("nome" + id_do_input_number).value;
            venda.preco[itemIndex] = (preco * document.getElementById("input" + id_do_input_number).value);
            venda.ids[itemIndex]=document.getElementById("id"+id_do_input_number).value;
            venda.quantidadeCada[itemIndex]=document.getElementById("input" + id_do_input_number).value;
            venda.quantidadeRestante[itemIndex]=quantidadeActual-document.getElementById("input" + id_do_input_number).value;
            document.getElementById("btn" + id_do_input_number).remove();
            document.getElementById("input" + id_do_input_number).remove();
            itemIndex++;
        }
    }

}

const okSelect = () => {


    if (venda.comprimidosNome.length <= 0) {
        MessageBox.Show("Não selecionaste nenhum medicamento");
    }
    else {
        document.querySelector("div.up-select").remove();
        document.getElementById("btn-add-items").remove();
        for (let indice = 0; indice < venda.comprimidosNome.length; indice++) {
            document.querySelector("div.list-items").innerHTML += Venda.medicamentoSelecionado(venda.comprimidosNome[indice], venda.preco[indice]);
        }
        let PrecoVendaTotal=0;
        for (const preco of venda.preco) {
            PrecoVendaTotal+=preco
        }
        document.querySelector(".relatorio").innerHTML+=`
        <div class="card-relatorio"><span>Quantidades de comprimidos :</span>${venda.comprimidosNome.length}</div>
        <div class="card-relatorio"><span>Preço Total a ser pago :</span>${PrecoVendaTotal}kz</div>
        `;
        const objectInputs=JSON.parse(localStorage.getItem("inputs"));
        document.getElementById("nome").value=objectInputs.Nome;
        document.getElementById("valorEntrada").value=objectInputs.Entrada;
    }
}

const notSelect = () => {
    document.querySelector("div.up-select").remove();
    document.getElementById("btn-add-items").remove();
    document.querySelector("div.up-venda").remove();
    venda.comprimidosNome = new Array();
    venda.preco = new Array();
}

const vender=()=>{
    var Nome= document.getElementById("nome");
    var Entrada=document.getElementById("valorEntrada");

    if(Nome.value!="" && Entrada.value!="" && Nome.value!=" " && Entrada.value!=" ")
    {
        if(venda.comprimidosNome.length<=0)
        {
            MessageBox.Show("Selecione  o medicamento. Obrigado");
        }
        else{
            let PrecoVendaTotal=0;
            for (const preco of venda.preco) {
                PrecoVendaTotal+=preco;
            }
            if(Entrada.value<PrecoVendaTotal)
            {
                MessageBox.Show("O dinheiro entregue não é suficiente para a compra");
            }
            else
            {
                let troco=PrecoVendaTotal-Entrada.value;
                console.log("Na funcçao vender "+venda.ids)
                efectuarVendaNaApi(Nome.value, Entrada.value, troco, PrecoVendaTotal, venda.comprimidosNome.length);
            }
        }
    }
    else
    {
        MessageBox.Show("Preencha todos os campos. Obrigado");
    }
}

const efectuarVendaNaApi= async(nomeCliente, valorEntrada, troco, lucro, quantidade_medicamentos)=>{

    let request= await fetch("../../api/get-informacao-admin.php?orcamento=sim");
    let response = await request.json();
    let novoOrcamento = Number(response) +Number(lucro);
    request = await fetch(`../../api/venda.php?nome_cliente=${nomeCliente}&valor_entrada=${valorEntrada}&troco=${troco}&lucro=${lucro}&orcamento=${novoOrcamento}`);
    response= await request.json(request);
    if(response=="ok")
    {
        console.log(venda.ids)
        for (let indice=0; indice<quantidade_medicamentos; indice++)
        {
            let request= await fetch("../../api/venda.php?vender_m=sim&idMedicamento="+venda.ids[indice]+"&quantidade="+venda.quantidadeCada[indice]+"&resultado_subtracao="+venda.quantidadeRestante[indice])
            let response= await request.json();
            console.log(response)
        }
        MessageBox.Show("Vendido com sucesso");
        verVenda();
    }
    else{
        MessageBox.Show("Não foi possível efectuar a venda 1/2");
    }
    cancelarVenda();
}

const cancelarVenda=()=>{
    venda.comprimidosNome=new Array();
    venda.ids=new Array();
    venda.preco= new Array();
    venda.quantidadeCada=new Array();
    venda.quantidadeRestante=new Array();
    document.querySelector(".up-venda").remove();
}

const verVenda=async ()=>{
    let request=await fetch("../../api/venda.php?vendas=sim&ultimoPost="+lastPostView);
    let response=await request.json();
    if(response=="Não existe o regristo de alguma venda. Obrigado" || response=="Não existe mais alguma venda")
    {
        MessageBox.Show(response);
    }
    else{
        document.getElementById("main-cards-venda").innerHTML="";
        for(let vendas=0; vendas<response.length; vendas++)
        {
            document.getElementById("main-cards-venda").innerHTML+=Venda.CardVenda(response[vendas][0],
                response[vendas][1],
                response[vendas][4],
                response[vendas][2],
                response[vendas][2]-response[vendas][4]);
            lastPostView=response[vendas][0];
        }
        
    }
}
    
const verMaisVenda= async(id, nome, lucro, entrada)=>{
    document.body.innerHTML+=`
    <div class="up up-venda" onclick="cancelarVenda()">
        <div class="relatorio-venda card-venda">
            <h5>Venda Nº ${id}</h5>
            <div class="mais-infor">
                <span>Nome: <span>${nome}</span></span>
                <span>Lucro: <span>${lucro}kz</span></span>
                <span>Entrada:<span>${entrada}kz</span></span>
                <span>Troco:<span>${entrada-lucro}kz</span></span>
                <span>Vendido por:  <span id="vendedor"></span></span>
            </div>
            <main class="list-medicamentos">
            </main>
        </div>
    </div>
    `;
    const request = await fetch("../../api/venda.php?venda="+id);
    let response = await request.json();
    for (let indice=0; indice<response.length; indice++)
    {
        document.querySelector(".list-medicamentos").innerHTML+=`
        <div class="item-list">${response[indice][0]} : ${response[indice][1]} </div>
        `;    
    }
    const  REQUEST= await fetch("../../api/venda.php?ver_vendedor_da_venda="+id);
    const RESPONSE= await REQUEST.json();
    document.getElementById("vendedor").innerText=RESPONSE;
}

verVenda();