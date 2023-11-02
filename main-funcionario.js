
const GetFuncionarios = async () =>{
    let request = await fetch("../../api/funcionario.php?get_funcionarios=sim");
    const response = await request.json();
    
    if(response == "Não existe nenhum funcionário além de você" || response == "Erro. Não possível fazer a requisição")
    {
        MessageBox.Show(response);
    }
    else
    {
        response.map(item =>  document.getElementById("list").innerHTML+=CardFuncionario(item));
    }
}


const bloquearFuncionario = async (id)=>{
    let request = await fetch("../../api/funcionario.php?bloquear="+id);
    const response = await request.json();

    if(response ==" Não foi bloquear o funcionário")
    {
        MessageBox.Show(response);
    }
    else
    {
        document.querySelector("a.in").click();
    }
}


const DesbloquearFuncionario = async (id) =>{
    let request = await fetch("../../api/funcionario.php?desbloquear="+id);
    const response = await request.json();
    if(response ==" Não foi desbloquear o funcionário")
    {
        MessageBox.Show(response);
    }
    else
    {
        document.querySelector("a.in").click();
    }
}

GetFuncionarios();