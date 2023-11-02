var Foto;
const Medicamento = {

    geraCard: (componentPai, foto, nome, preco, quantidade, validade, id) => {
        if (foto == "" || foto==" " || foto==null) {
            foto = "/icons/suitcase-medical.svg";
        }
        Foto=foto;
        componentPai.innerHTML += `
        <div onclick="Medicamento.maisInfor('${foto}','${nome}','${preco}','${quantidade}', '${validade}', ${id})" class="card-item-resumo-home">
        <img  src="../../images/${foto}" alt="">
        <div class="inf-item-resumo-home">
            <h4>${nome}</h4>
            <div class="inf-flex">
                <div>
                    Preço <span id="numero-venda">${preco}kz</span>
                </div>
                <div>
                    Quantidade <span id="numero-devolucao">${quantidade}</span>
                </div>
            </div>
        </div>
    </div>
        `;
    },

    maisInfor: (foto, nome, preco, quantidade, validade, id) => {
        document.body.innerHTML += `
        <div class="up mais-infor">
        <div class="card-mais-infor">
            <img src="../../images/${foto}" alt="">
            <div>
                <span>Nome: <span class="destaque">${nome}</span></span>
                <span>Preço: <span class="destaque">${preco}kz</span></span>
                <span>Expiração: <span class="destaque">${validade}</span></span>
                <span>Quantidade: <span class="destaque">${quantidade}</span></span>
                <span>Identidade do produto: <span class="destaque">${id}</span></span>
                <button onclick="Medicamento.fecharMaisInfor()">Fechar</button>
            </div>
            <div class="btns"> 
                <button class="Eliminar" onclick="QuestaoDeleteMedicamento(${id})">Eliminar</button>
                <button onclick="Medicamento.editarMedicamento('${nome}',${id}, ${preco}, ${quantidade}, '${validade}', '${foto}')">Editar</button>
            </div>
        </div>
        </div>
        `;
    }, 

    fecharMaisInfor:()=>{
        document.querySelector("div.mais-infor").remove();
    },

    editarMedicamento: (nome, id, preco, quantidade, validade, foto)=>{
        Medicamento.fecharMaisInfor();
        document.body.innerHTML+=`
        <div class="mais-infor up-editar">
            <div class="editar">
            <form action="" method="POST" id="form-editar">
                <h3>Estas editando as informações de "${nome}"</h3>
                <main id="main-editar">
                    <div id="foto">
                        <input type="hidden" name="id" value="${id}" >
                        <img src="../../images/${foto}" id="imgTag" alt=".">
                        <input type="file" class="input-file" name="ficheiroEditar" onchange="SetFotoEditar()" id="inputFotoEditar">
                        <button type="button" onclick="abrirGetFotoEditar()">Selecionar Foto</button>                       
                    </div>
                    <div id="infor">
                        <input type="text" placeholder="Nome do medicamento" value="${nome}" name="nomeEditar" id="nomeEditar">
                        <input type="text" name="precoEditar" id="precoEditar" placeholder="Preço do Medicamento" value="${preco}">
                        <input type="number" placeholder="Quantidade" name="quantidadeEditar" id="quantidadeEditar" value="${quantidade}">
                        <input type="date" name="validadeEditar" id="validadeEditar" value="${validade}">
                    </div>
                </main>
                <div class="btns">
                    <button type="button" onclick="Medicamento.fecharMaisInfor()">Cancelar</button>
                    <button type="button" onclick="Editar()">Alterar Agora</button>
                </div>
            </form>
            </div>
        </div>
        `;
    }

}