let a = parseFloat(window.prompt("Digite um número para a variavel A: "))
let b = parseFloat(window.prompt("Digite um número para a variavel B: "))

function showAlert(message,callback){
    if(confirm(message)){
        callback()
    }
}
function addInfo(texto){
    let infoDiv = document.getElementById("addInfo")
    infoDiv.innerHTML =`<p>${texto}`
}

if(a>b){
    showAlert(`A variavel A: ${a} é maior que a variavel B: ${b}`, function(){
        addInfo("No exemplo dos numeros dados foi execultado a primeira condição. No caso A é maior que B")
    })
}
else if(a<b){
    showAlert(`A variavel B: ${b} é maior que a variavel A: ${a}`, function(){
        addInfo("No exemplo dos numeros dados foi execultado a segunda condição. No caso B é maior que A")
    })
}
else{
    showAlert('As variaveis A e B são iguais', function(){
        addInfo("No exemplo dos numeros dados foi execultado a terceira condição. No caso ambos são iguais")
    })
}