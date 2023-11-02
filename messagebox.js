const MessageBox={
    Show:(conteudo)=>{
        document.body.innerHTML+=`
        <div class="up" id="up-sms">
            <div class="sms">
                <span>${conteudo}</span>
                <button type="button" onclick="MessageBox.Close()">Ok</button>
            </div>
        </div>`;
    },
    Close: ()=>{
        document.getElementById("up-sms").remove();
    }
}
