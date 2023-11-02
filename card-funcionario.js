const CardFuncionario = (Card)=>{
    return `
    <div class="card-funcionario">
        <span class="nome">${Card[0]}</span>
        <span>Id:${Card[2]}</span>
        <span>Salário:${Card[3]}kz</span>
        ${BloqueioOuDesbloqueio(Card[1], Card[2])}
    </div>  
    `;
}

const BloqueioOuDesbloqueio = (bloqueio, id )=>{

    if(bloqueio==false)
    {
        return `<button type="button" onclick="bloquearFuncionario(${id})" class="bloquear ">Bloquear</button>`;
    }
    else
    {
        return `<button type="button" onclick="DesbloquearFuncionario(${id})" class="bloquear desbloquear">Desbloquear</button>`;
    }

}