const Venda={

    main:()=>{
        document.body.innerHTML+=`
        <div class="up up-venda">
            <main>
                <h2>Estás efectuando uma venda</h2>
                <form action="" method="POST">
                    <input type="text" name="nome_cliente" id="nome" placeholder="O nome do Cliente">
                    <input type="text" name="valor_entrada" id="valorEntrada" placeholder="O dinheiro entregue é">
                    <button type="button" onclick="Venda.selecionarMedicamentos()" id="btn-add-items">Adicionar Medicamentos</button>
                    <div class="list-items">
                    
                    </div>
                </form> 
            <div class="relatorio venda">
                
            </div>
              <div class="btns-venda">
                <button type="button" onclick="cancelarVenda()" class="cancel">Cancelar</button>
                <button type="button" onclick="vender()">Vender</button>
            </div>
            </main>
        </div>
        `;
    },
    

    medicamentos: (dados, indice)=>{
        return `
        <div class="card-medicamento-venda">
            <div>
            <input id="nome${indice}" value="${dados[indice][1]}" type="hidden">
                <span >${dados[indice][1]}</span>
                <span>Quantidade Maxima: ${dados[indice][2]}</span>
            </div>
            <div class="add">
                <input type="hidden" id="id${indice}" value="${dados[indice][0]}"> 
                <input type"number" id="input${indice}" placeholder="quantidade de comprimidos a serem vendidos">
                <button type="button" id="btn${indice}" onclick="verificarQuantidade(${dados[indice][2]}, ${indice}, ${dados[indice][3]})">
                    Adicionar Este
                </button>
            </div>  
        </div>
        `;       
    },

    selecionarMedicamentos: async ()=>{
        localStorage.setItem("inputs", JSON.stringify({
            Nome: document.getElementById("nome").value,
            Entrada:document.getElementById("valorEntrada").value
        }));

        console.log( JSON.parse(localStorage.getItem("inputs")))
        const medicamento= await getMedicamentos();
        document.body.innerHTML+=`
        <div class="up up-venda up-select">
            <main class="list-items-select select-list">
            <h2>
                Selecione os medicamentos para a venda
                <button type="button" class="cancel" onclick="notSelect()">
                    Cancelar
                </button> 
                <button type="button" onclick="okSelect()">
                    Feito
                </button> 
            </h2>
            </main>
        </div>

        `;
        for(let indice=0; indice<medicamento.length; indice++)
        {
            document.querySelector("main.list-items-select").innerHTML+=Venda.medicamentos(medicamento, indice);
        }
    },

    medicamentoSelecionado: (nome, preco)=>{
        return `
            <div class="card-item-selecionado">
                <span>${nome}</span>
                <span>${preco}kz</span>
            </div>
        `;
    },

    devolucao:()=>{
        MessageBox.Show("Desculpa ainda não há possíbilidade de fazer devolução neste sistema, obrigado");
    }
    , 
    CardVenda: (id, nome, lucro, entrada, troco)=>{
        return`
        <div class="card-venda">
        <h5>Venda Nº ${id}</h5>
        <div class="mais-infor">
            <span>Nome: <span>${nome}</span></span>
            <span>Lucro: <span>${lucro}kz</span></span>
            <span>Entrada:<span>${entrada}kz</span></span>
            <span>Troco:<span>${troco}kz</span></span>
        </div>
        <button onclick="verMaisVenda(${id},'${nome}', ${lucro}, ${entrada})" type="button" class="ver-mais-venda">Ver Mais</button>
    </div>`;
    }
}