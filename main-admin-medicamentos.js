async function GetMedicamentos(parouEm)
{
    const request=await fetch("../../api/get-medicamentos.php?parouEm="+parouEm);
    let response=await request.json();
    if(response=="Não há medicamentos")
    {
        if(parouEm==0)
        {
            MessageBox.Show(response);
        }
    }
    else {
        if(parouEm==1)
        {
            document.querySelector("main#main-get-medicamentos").innerHTML=`
            <h2>A lista dos seus medicamentos</h2>`;
        }
        response.map(item=>{
            Medicamento.geraCard(document.getElementById("main-get-medicamentos"),
            item[5],
            item[1],
            item[4],
            item[2],
            item[3],
            item[0]);
        })
    }
}

async function DeleteMedicamento(id)
{
    const request=await fetch("../../api/get-medicamentos.php?delete="+id)
    let response=await request.json();
    fecharQuestao();
    MessageBox.Show(response);
    document.body.innerHTML+=`<a href="" id="reload"></a>`;
    document.querySelector("a#reload").click();
}

function  QuestaoDeleteMedicamento(id)
{
    Medicamento.fecharMaisInfor();
    document.body.innerHTML+=`
    <div class="up mais-infor">
        <div class="sms">
        <span>Tens certeza que pretendes eliminar?</span>
        <div>
            <button onclick="fecharQuestao()">Cancelar</button>
            <button onclick="DeleteMedicamento(${id})" class="red-button">Eliminar</button>
        </div>
        </div>
    </div> `
}

function fecharQuestao()
{
    document.querySelector("div.mais-infor").remove();
}

function abrirGetFoto()
{
    document.getElementById("inputFoto").click();
}
function abrirGetFotoEditar()
{
    document.getElementById("inputFotoEditar").click();
}
function SetFoto()
{
    var imgTag=document.getElementById("img-tag");
    imgTag.src=URL.createObjectURL(document.getElementById("inputFoto").files[0]);
}

function SetFotoEditar()
{
    var imgTag=document.getElementById("imgTag");
    imgTag.src=URL.createObjectURL(document.getElementById("inputFotoEditar").files[0]);
}

function Postar()
{
    var formulario=document.getElementById("form-adicionar");
    if(document.getElementById("nome").value!="" 
    && document.getElementById("preco").value!=""&&
    document.getElementById("validade").value!=""&&
    document.getElementById("quantidade").value!="")
    {
        var data= new Date();
        if(document.getElementById("validade").value>data.getFullYear()+"-"+data.getMonth()+"-"+data.getDay())
        {
            
            console.log(document.getElementById("preco").value)
            const ObjectoSend={
                method: 'POST',
                body: new FormData(formulario)
            }
            EnviandoFormulario(ObjectoSend);
        }
        else
        {
            MessageBox.Show("Por favor. Insere uma data valida, no minimo um ano de diferença do actual");
        }
    }
    else
    {
        MessageBox.Show("Por favor. Preencha todos os campos");
    }
}

async function EnviandoFormulario(objeto)
{   
    const request=await fetch("../../api/get-medicamentos.php", objeto);
    let response= await request.json();
    
    MessageBox.Show(response);
    GetMedicamentos(1);
}

function Editar()
{
    var formulario=document.getElementById("form-editar");
    if(document.getElementById("nomeEditar").value!="" 
    && document.getElementById("precoEditar").value!=""&&
    document.getElementById("validadeEditar").value!=""&&
    document.getElementById("quantidadeEditar").value!="")
    {
        var data= new Date();
        if(document.getElementById("validadeEditar").value>data.getFullYear()+"-"+data.getMonth()+"-"+data.getDay())
        {
            
           
            const ObjectoSend={
                method: 'POST',
                body: new FormData(formulario)
            }
            EnviandoFormulario(ObjectoSend);
            Medicamento.fecharMaisInfor();
        }
        else
        {
            MessageBox.Show("Por favor. Insere uma data valida, no minimo um ano de diferença do actual");
        }
    }
    else
    {
        MessageBox.Show("Por favor. Preencha todos os campos");
    }

}
GetMedicamentos(0);
