let pacote = window.prompt("Escolha um pacote de viagem:\n litoral= 5 dias no litoral \n gramado = 5 dias de Gramado \n noronha = 5 dias em Fernando de Norinha").toLocaleLowerCase()

function showAlert(message, callback){
    if(confirm(message)){
        callback()
    }
}

function bodyInfo(hotel, checkout){
    let infoDiv = document.getElementById("info")
    infoDiv.innerHTML =`<p> Hotel ${hotel} </p><p>Horario do checkout: ${checkout} </p>`
}

switch(pacote){
    case "litoral":
        showAlert("O pacote para o litoral custa R$850,00", function(){
            bodyInfo("Hotel do Mar","12:00 ")
        })
        break
    case "gramado":
        showAlert("O pacote para o gramado custa R$7.850,00", function(){
            bodyInfo("Hotel do Grama","12:00 ")
        })
        break
    case "noronha":
        showAlert("O pacote para o Fernando de Noronha custa R$11.000,00", function(){
            bodyInfo("Hotel do Fernandinho","12:00 ")
        })
        break
    default:
        alert("Selecione uma opção valida")
}